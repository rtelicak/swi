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

		$query = $this->db->query("SELECT id, username FROM users");
		$userQuery = $query->result();

		$query_tasks = $this->db->query("SELECT tasks.id_assigned_user AS id_user, tasks.id, state.state FROM tasks LEFT JOIN users ON tasks.id_assigned_user = users.id LEFT JOIN state ON tasks.id_state = state.id");
		$tasksQuery = $query_tasks->result();

		foreach ($userQuery as $user) {
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
		$this->load->view('user_detail', $data);
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

}
?>