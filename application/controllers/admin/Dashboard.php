<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!is_logged()){
			redirect('admin/login','refresh');
		}
	}

	public function index()
	{
		 $this->page_data['statics'] = $this->dashboard_model->get_statics();
		 $t = $this->dashboard_model->get_district_statics();
		 //print '<pre>'; print_r($t);die;
		 $result = $this->dashboard_model->get_district_statics();
       	 $this->page_data['districts'] = $result;
		 $this->load->view('admin/dashboard', $this->page_data);
	}
}
