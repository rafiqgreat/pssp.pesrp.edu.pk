<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Tracking';
		$this->page_data['page']->menu = 'tracking';
	}

	public function index()
	{
	   ifPermissions('tracking_list');
		$this->page_data['page']->title = 'Tracking List';
		$this->page_data['tracking'] = $this->tracking_model->get_list();
		$this->load->view('tracking/list', $this->page_data);
	}
	
	public function view($id)
	{
		ifPermissions('tracking_view');
		$this->page_data['page']->title = 'Tracking Detail';
		//$d = $this->tracking_model->get_by_id($id);
		//print '<pre>';print_r($d); die;
		$this->page_data['tra_dtl'] = $this->tracking_model->get_by_id($id);
		$this->load->view('tracking/view', $this->page_data);
	}

	/*public function add(){
		ifPermissions('tracking_add');
		$this->load->view('tracking/add', $this->page_data);
	}

	public function edit($id){
		ifPermissions('tracking_edit');
		$this->page_data['permission'] = $this->tracking_model->getById($id);
		$this->load->view('tracking/edit', $this->page_data);
	}

	public function save(){
		postAllowed();
		ifPermissions('tracking_add');
		$permission = $this->tracking_model->create([
			'title' => $this->input->post('name'),
			'code' => $this->input->post('code'),
		]);
		$this->activity_model->add("New Permission #$permission Created by User: #".logged('id'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New Permission Created Successfully');
		redirect('tracking');
	}

	public function update($id){
		postAllowed();
		ifPermissions('tracking_edit');
		$data = [
			'title' => $this->input->post('name'),
			'code' => $this->input->post('code'),
		];
		$permission = $this->tracking_model->update($id, $data);
		$this->activity_model->add("Permission #$id Updated by User: #".logged('id'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Permission has been Updated Successfully');
		redirect('tracking');
	}

	public function delete($id){
		ifPermissions('tracking_delete');
		$this->tracking_model->delete($id);
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Permission has been Deleted Successfully');
		$this->activity_model->add("Permission #$permission Deleted by User: #".logged('id'));
		redirect('tracking');
	}

	public function checkIfUnique(){
		$code = get('code');
		if(!$code)
			die('Invalid Request');
		$arg = [ 'code' => $code ];
		if(!empty(get('notId')))
			$arg['id !='] = get('notId');
		$query = $this->tracking_model->getByWhere($arg);
		if(!empty($query))
			die('false');
		else
			die('true');
	}*/
}

/* End of file Tracking.php */
/* Location: ./application/controllers/Tracking.php */