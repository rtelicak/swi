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

		$query_tasks = $this->db->query("SELECT tasks.id_user, tasks.id, tasks.id_priority FROM tasks LEFT JOIN users ON tasks.id_user = users.id");
		$tasksQuery = $query_tasks->result();

		foreach ($userQuery as $user) {
			$user->tasks = array();
			foreach ($tasksQuery as $task) {
				if ($task->id_user == $user->id){
					$user->tasks[] = $task;
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