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

		$query = $this->db->query("SELECT users.username, tasks.title, tasks.id AS id, tasks.deadline, priority.priority, state.state FROM tasks LEFT JOIN users ON tasks.id_user = users.id LEFT JOIN state ON tasks.id_state = state.id LEFT JOIN priority ON tasks.id_priority = priority.id");
		$tasks = array();
		foreach ($query->result() as $row){
			// $result[$row->id] = $row->username;
			// print_r($row);
			$tasks[] = $row;
		}
		$data = array();
		$data['tasks'] = $tasks;
		// print_r($data);
		$this->load->view('task_list', $data);
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