<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Task extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	function index(){
        // echo "aaa";
	}
	
	function task_list(){              
		$this->load->view('task_list');
	}
	
	function add_task(){
		$data['users'] = $this->get_users();
		$data['priorities'] = $this->get_priorities();
		$this->load->view('task_form', $data);
	} 
	
	function save(){ 
		$date = date("Y-m-d");
		$data = array(
			'title' => $_POST['title'],
			'desc' => $_POST['desc'],
			'created' => $date,
			'deadline' => $_POST['deadline'],
			'id_user' => $_POST['user'],
			'id_priority' => $_POST['priority'],
			'id_state' => 1
		);
		
		$this->db->insert('tasks', $data);
	}
	
	function get_users(){
		$query = $this->db->query("SELECT DISTINCT username, id FROM users");
		$result = array();
				
		foreach ($query->result() as $row){
			$result[$row->id] = $row->username;
		}
		
		return $result;
	}
	
	function get_priorities(){
		$query = $this->db->query("SELECT DISTINCT priority, id FROM priority");
		$result = array();
				
		foreach ($query->result() as $row){
			$result[$row->id] = $row->priority;
		}
		
		return $result;
	}
	
}
?>