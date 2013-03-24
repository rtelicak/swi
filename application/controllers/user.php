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
		var_dump($tasksQuery);             
		
		$users = array();
		foreach ($userQuery as $rowUser){
			$users[ $rowUser->id ] = $rowUser;
				foreach ($tasksQuery as $rowTasks){
					if ( ($rowUser->id == $rowTasks->id_user) ) {
						$users[ $rowUser->id ][ $rowTasks->id ] = $rowTasks;	
					}
				}
		}      
		
		$data = array();
		$session_data = $this->session->userdata('logged_in');  
		$data['username'] = $session_data['username']; 
		$this->load->view('user_list', $data);
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