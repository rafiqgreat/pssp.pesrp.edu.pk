<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!is_logged()){
			redirect('user/login','refresh');
		}
	}
	public function index()
	{	
		$user_id = $this->session->userdata('logged')['id'];
		$this->load->model('Users_model');		
	// Get user details
		$user = $this->Users_model->get($user_id);
		$this->page_data['indivisual'] = $this->user_applicationformind_model->get_app_preview_userid($user_id);
		$this->page_data['youngent'] = $this->user_applicationform_model->get_app_preview_userid($user_id);
	
	// You may add custom method in Users_model if needed
	$this->page_data['user'] = $user;
		
		
		 $this->load->view('user/dashboard', $this->page_data);
	}
}
