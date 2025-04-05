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
		 $this->load->view('user/dashboard', $this->page_data);
	}
}
