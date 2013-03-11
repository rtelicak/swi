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
}
?>