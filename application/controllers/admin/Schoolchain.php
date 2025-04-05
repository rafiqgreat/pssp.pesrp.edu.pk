<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolchain extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'SchoolChain';
		$this->page_data['page']->menu = 'schoolchain';
	}

	public function index()
	{
		ifPermissions('schoolchain_list');
		$this->page_data['schoolchain'] = $this->schoolchain_model->get();
		$this->load->view('admin/schoolchain/list', $this->page_data);
	}

	public function add()
	{
		ifPermissions('schoolchain_add');
		$this->page_data['page']->submenu = 'add';
		$this->load->view('admin/schoolchain/add', $this->page_data);
	}
	
	public function save_schoolchain()
	{
		ifPermissions('schoolchain_add');
		postAllowed();
	
		$id = $this->schoolchain_model->create(array(
			'schoolchain_code' => post('schoolchain_code'),
			'schoolchain_name_en' => post('schoolchain_name_en'),
			'schoolchain_sort' => post('schoolchain_sort'),
			'schoolchain_status' => post('schoolchain_status'),
			'schoolchain_createdby' => logged('id'),
			'schoolchain_status' => 1,
		), 'school_chain');

		$this->activity_model->add('New Schoolchain $' . $id . ' Created by User:' . logged('name'), logged('id'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New Schoolchain Created Successfully');
		
		redirect('schoolchain');
	}


	public function edit_schoolchain($id)
	{
		ifPermissions('schoolchain_edit');
		$this->page_data['schoolchain'] = $this->schoolchain_model->get_schoolchain_edit($id);
		$this->load->view('admin/schoolchain/edit', $this->page_data);
	}


	public function update($id)
	{
		ifPermissions('schoolchain_edit');
		postAllowed();

		$data = [
			'schoolchain_code' => post('schoolchain_code'),
			'schoolchain_name_en' => post('schoolchain_name_en'),
			'schoolchain_sort' => post('schoolchain_sort'),
		];

		$uid = $this->schoolchain_model->update_schoolchain($id, $data);
		$this->activity_model->add("Schoolchain #$id Updated by User:".logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Schoolchain has been Updated Successfully');
		redirect('schoolchain');
	}

	public function delete($id)
	{
		ifPermissions('schoolchain_delete');
		$id = $this->schoolchain_model->delete($id, 'school_chain', 'schoolchain_id');
		$this->activity_model->add("Schoolchain #$id Deleted by User:".logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Schoolchain has been Deleted Successfully');
		redirect('schoolchain');
	}

	public function change_status($id)
	{
		$this->schoolchain_model->update_schoolchain($id, ['schoolchain_status' => get('schoolchain_status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}
	
	
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */