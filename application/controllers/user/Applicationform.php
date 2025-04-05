<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationform extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!is_logged()){
			redirect('user/login','refresh');
		}
	}
	public function index()
	{		
		 if($this->session->logged['role']==2){
		 	$this->load->view('user/applicationform/young_entrepreneur_application', $this->page_data);
		 }elseif($this->session->logged['role']==3){
		 	$this->load->view('user/applicationform/individual', $this->page_data);
		 }elseif($this->session->logged['role']==4){
		 	$this->load->view('user/applicationform/ed_tech_firm', $this->page_data);
		 }elseif($this->session->logged['role']==5){
		 	$this->load->view('user/applicationform/education_chain', $this->page_data);
		 }elseif($this->session->logged['role']==6){
		 	$this->load->view('user/applicationform/ngos', $this->page_data);
		 }elseif($this->session->logged['role']==7){
		 	$this->load->view('user/applicationform/pef_peima_partner', $this->page_data);
		 }elseif($this->session->logged['role']==8){
		 	$this->load->view('user/applicationform/private_school', $this->page_data);
		 }
	}
}
