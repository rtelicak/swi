<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->model('user','',TRUE);
	}

	function index(){
		$this->load->helper('form');
		
		if($this->session->userdata('logged_in')){ 
			$session_data = $this->session->userdata('logged_in');  
			$data['username'] = $session_data['username']; 
			$result = $this->user->getLastLogin($session_data['id']); 
			$data['lastLogin'] = $result->lastLogin;
			$data = $this->get_dashboard_tasks($data);
			// echo '<pre>';print_r($data);echo'</pre>';exit;
			$this->load->view('home_view', $data);
		}
		else{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	
	function displayTaskForm(){
		$this->load->view('task_form');
	}
	
	function get_dashboard_tasks($data){
		$query = $this->db->query("SELECT id, title, deadline, id_state FROM tasks ORDER BY created DESC LIMIT 6");
		$result = $query->result();
		$tasks = array();

		foreach ($result as $task => $value) { 
			$tasks[] = (array) $value;
		}
		
		$data['tasks'] = $tasks;
		return $data;
	}       
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>