<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	function index(){
        // echo "aaa";
	}
	
	function user_list(){              

		$query = $this->db->query("SELECT id, username, blocked FROM users");
		$userQuery = $query->result();

		$query_tasks = $this->db->query("SELECT tasks.id_assigned_user AS id_user, tasks.id, state.state FROM tasks LEFT JOIN users ON tasks.id_assigned_user = users.id LEFT JOIN state ON tasks.id_state = state.id");
		$tasksQuery = $query_tasks->result();

		foreach ($userQuery as $user) {
			$user->action = array();
			if($user->blocked==0) {
				$user->action['operation'] = 1;
				$user->action['btnTitle'] = "Zakázať";
				$user->action['btnClass'] = "warning";
			}
			else {
				$user->action['operation'] = 0;
				$user->action['btnTitle'] = "Povoliť";
				$user->action['btnClass'] = "success";
			}
			$user->tasks = array();
			$user->tasks['resolved']=0;
			$user->tasks['unresolved']=0;
			$user->tasks['total']=0;
			foreach ($tasksQuery as $task) {
				if ($task->id_user == $user->id){
					if($task->state == "Resolved") {
						$user->tasks['resolved']++;
					}
					else {
						$user->tasks['unresolved']++;
					}
					$user->tasks['total']++;
				}
			}
		}
		
		//$this->debug($userQuery);
		
		$data = array();
		$data['users'] = $userQuery;
		$session_data = $this->session->userdata('logged_in');  
		$data['username'] = $session_data['username']; 
		
		$this->load->view('user_list', $data);
	}
	
	function detail($id_user){ 
		$data = array();
		$session_data = $this->session->userdata('logged_in');  
		$data['username'] = $session_data['username'];
		$data['user'] = $this->get_user($id_user);
		$data['role'] = $this->get_role_list($id_user);
		$this->load->view('user_detail', $data);
	} 
	
	function get_role_list($id){
		$query = $this->db->query("SELECT role FROM users WHERE id=".$id."");
		$role = $query->row('role');
		
		$out = '<select name="user_role" name="user_role">';
		if($role == 1) {
			$out .= '<option value="1" selected="selected">Administrátor</option>';
			$out .= '<option value="2">Používateľ</option>';
		}
		else {
			$out .= '<option value="1">Administrátor</option>';
			$out .= '<option value="2" selected="selected">Používateľ</option>';
		}
		$out .= "</select>";

		//$this->debug($out);
				
		return $out;
	}
	
	function deleteUser() {
		$id = $this->uri->segment(3);
		
		$session_data = $this->session->userdata('logged_in');  
		if($session_data['id']==$id) {
			$this->session->set_flashdata('error', '<strong>Tento používateľ je prihlásený!</strong> Nemôžete zmazať samého seba, keď ste prihlásený!');
            redirect("user/user_list", "refresh");
		}
		
		$query = $this->db->query("SELECT username FROM users WHERE id=".$id." ");
		$userData = $query->result();
		
		//$this->db->delete('users', array('id' => $id));
		
		$msg = "Používateľ <strong>".$userData[0]->username."</strong> bol úspešne zmazaný! 
		<br /> Treba však odkomentovať operáciu zmazania v kóde [controller=user line=84].";

		$this->session->set_flashdata('message', $msg);
		redirect("user/user_list", "refresh");
	}
	
	function changeUserStatus() {
		$id = $this->uri->segment(3);
		$val = $this->uri->segment(4);
		
		$session_data = $this->session->userdata('logged_in');  
		if($session_data['id']==$id) {
			$this->session->set_flashdata('error', '<strong>Tento používateľ je prihlásený!</strong> Nemôžete zablokovať samého seba, keď ste prihlásený!');
            redirect("user/user_list", "refresh");
		}
						
		$data = array('blocked' => $val);
		
		$this->db->where('id', $id);
		$result = $this->db->update('users', $data);
		
		if(!$result) {
			$this->session->set_flashdata('error', '<strong>ERROR pri ukladaní dát do databázy</strong>');
            redirect("user/user_list", "refresh");
		}
		
		$query = $this->db->query("SELECT username FROM users WHERE id=".$id." ");
		$userData = $query->result();
		
		$result = "Blokovaný";
		if($val==0) { $result = "Povolený"; }
				
		$msg = "Prístup používateľa <strong>".$userData[0]->username."</strong> do task manažéra bol úspešne zmenený
		na: <strong>".$result."</strong>";

		$this->session->set_flashdata('message', $msg);
		redirect("user/user_list", "refresh");
	}
	
	function debug($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	
	function get_users(){
		$query = $this->db->query("SELECT DISTINCT username, id FROM users");
		$result = array();
				
		foreach ($query->result() as $row){
			$result[$row->id] = $row->username;
		}
		
		return $result;
	}
	
	function get_user($id) {
		try {
			$user = $this->db->query("SELECT * FROM users WHERE id=".$id."");
		} catch (Exception $e) {
			  print_r($e);
		}
		
		return $user->row();
	}

}
?>