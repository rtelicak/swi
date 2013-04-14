<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Task extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->library('form_validation');   
	    $this->form_validation->set_rules('title', 'Nazov', 'required');
		$this->form_validation->set_rules('desc', 'Popis ulohy', 'required');
		$this->form_validation->set_rules('deadline', 'Deadline', 'required');
	}

	function index(){
		$this->task_list();
		// $this->load->view('task_list');
	}
	
	function task_list($id = null){
		if ($id != null){
			$query = $this->db->query("SELECT users.username, tasks.title, tasks.id AS id, tasks.deadline, priority.priority, state.state FROM tasks LEFT JOIN users ON tasks.id_assigned_user = users.id LEFT JOIN state ON tasks.id_state = state.id LEFT JOIN priority ON tasks.id_priority = priority.id WHERE users.id = ".$id."");
		} else{
			$query = $this->db->query("SELECT users.username, tasks.title, tasks.id AS id, tasks.deadline, priority.priority, state.state FROM tasks LEFT JOIN users ON tasks.id_assigned_user = users.id LEFT JOIN state ON tasks.id_state = state.id LEFT JOIN priority ON tasks.id_priority = priority.id ORDER BY tasks.created DESC");
		}

		$tasks = array();
		foreach ($query->result() as $row){
			$tasks[] = $row;
		}                   
		
		$data = array();
		$data['tasks'] = $tasks;
		$session_data = $this->session->userdata('logged_in');
		// print_r($session_data);exit;  
		$data['username'] = $session_data['username']; 
		$data['user_id'] = $session_data['id'];
		$this->load->view('task_list', $data);
	}
	
	function add_task(){                  
		$data = $this->populate_data_array();
		$this->load->view('task_form', $data);
	}
		
	function save(){
		$data = $_POST;
		
		if ($this->form_validation->run() == FALSE){ 
				// save failed, fill form with posted data
				$data = $this->populate_other_data($data);
				$this->load->view('task_form', $data);
		}else{
			if ($data['id_task']){
				// update task  
				$id_task = $data['id_task'];
				unset($data['id_task']);  
				
				// perform update database
				$this->db->where('id', $id_task);
				$this->db->update('tasks', $data);
				
				// redirect to task detail we just updated
				redirect("task/detail/".$id_task."", 'refresh');
			} else{
				// create task 
				unset($data['id_task']);
				
				// default properties when creating task
				$data['created'] = date("Y-m-d"); 
				$data['id_state'] = 1;
				
				$this->db->insert('tasks', $data);
				redirect('task', 'refresh');
			}
		}
	}
	
	function detail($id_task){
		$task = $this->get_task($id_task);
		$data = array();
		
		foreach($task as $key => $value) {
			$data[$key] = $value;
		} 
		
		$data = $this->populate_other_data($data); 
		$data = $this->get_comments($id_task, $data);
		// print_r($data);exit;
		$this->load->view('task_detail', $data);
	}
	
	function edit_task($id){
		$data = $this->populate_data_array($id);
		$this->load->view('task_form', $data);
	}
	
	function add_comment(){
		$_POST['dateTime'] = date("Y-m-d H:i:s");
		$this->db->insert('comments', $_POST); 
		redirect("task/detail/".$_POST['id_task']."", 'refresh');
	}
	
	/****** private functions ******/
	
	function populate_data_array($task_id = null){
		// one master array, returned at the end
		$data = array();
		// property of task
		$task_properties = array("id_task", "title", "desc", "deadline", "id_priority", "assigned_user", "id_assigned_user");
		// get task or null
		$task = $task_id ? $this->get_task($task_id) : null;
		
		// fill master array with task properties or empty string
		foreach ($task_properties as $key) {
			$data[$key] = $task ? $task->$key : "";
		}
		
		$data = $this->populate_other_data($data);
		
		return $data;
	}
	
	function populate_other_data($data){
		// other data required for view (fill selectboxes, send session data ...)
		$data['users'] = $this->get_users();
		$data['priorities'] = $this->get_priorities();
		$session_data = $this->session->userdata('logged_in');
		// print_r($session_data);exit;
		$data['username'] = $session_data['username'];
		$data['id_logged_user'] = $session_data['id'];
		
		return $data;
	}
	
	function get_comments($id_task, $data){
		$comments = $this->db->query("SELECT comments.id, comments.body, comments.dateTime, users.username as user FROM comments LEFT JOIN users ON comments.id_user = users.id WHERE id_task = ".$id_task." ORDER BY comments.dateTime DESC");
		$comments = $comments->result();
		// print_r($comments); 
		$data['comments'] = $comments;

		return $data;
	}
	 
	function get_task($id){
		try {
			$task = $this->db->query("SELECT users.username as assigned_user, users.id as id_assigned_user, tasks.id as id_task, tasks.title, tasks.desc, tasks.created, tasks.deadline, priority.id as id_priority, priority.priority, state.state FROM tasks LEFT JOIN users ON tasks.id_assigned_user = users.id LEFT JOIN state ON tasks.id_state = state.id LEFT JOIN priority ON tasks.id_priority = priority.id WHERE tasks.id = ".$id."");
		} catch (Exception $e) {
			  print_r($e);
		}
		
		return $task->row();
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
	
	function debug($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	
}
?>