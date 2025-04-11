<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App_management extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Application Management';
		$this->page_data['page']->menu = 'app_management';
	}

	public function young_ent_list()
	{
		//ifPermissions('state_list');
		$this->page_data['page']->title = 'Young Entrepreneur List';
		$this->page_data['page']->submenu = 'young_ent_list';
		$this->page_data['young_ent'] = $this->app_management_model->get_young_ent_list();
		$this->load->view('admin/app_management/young_ent_list', $this->page_data);
	}
	
	public function indiv_list()
	{
		//ifPermissions('state_list');
		$this->page_data['page']->title = 'Individual List';
		$this->page_data['page']->submenu = 'indiv_list';
		$this->page_data['individual'] = $this->app_management_model->get_indiv_list();
		$this->load->view('admin/app_management/individual_list', $this->page_data);
	}
	//edu_tech_list
	
	public function edu_tech_list()
	{
		//ifPermissions('state_list');
		$this->page_data['page']->title = 'Edu Tech List';
		$this->page_data['page']->submenu = 'edu_tech_list';
		$this->page_data['edu_tech'] = $this->app_management_model->get_edu_tech_list();
		$this->load->view('admin/app_management/edu_tech_list', $this->page_data);
	}
	
	public function edu_chain_list()
	{
		//ifPermissions('state_list');
		$this->page_data['page']->title = 'Education Chain List';
		$this->page_data['page']->submenu = 'edu_chain_list';
		$this->page_data['edu_chain'] = $this->app_management_model->get_edu_chain_list();
		$this->load->view('admin/app_management/edu_chain_list', $this->page_data);
	}
	
	public function ngos_list()
	{
		//ifPermissions('state_list');
		$this->page_data['page']->title = 'NGOs List';
		$this->page_data['page']->submenu = 'ngos_list';
		$this->page_data['ngos'] = $this->app_management_model->get_ngos_list();
		$this->load->view('admin/app_management/edu_ngos_list', $this->page_data);
	}
	
	public function applicationpreview_yep($id)
	{	
		 $this->page_data['page']->title = 'Application Preview';		
		 $this->page_data['page']->menu = 'applicationpreview';
		 
		 $this->page_data['data_yep'] = $this->app_management_model->get_app_preview_userid($id);
		 $this->page_data['qulaifications'] = $this->app_management_model->get_qualification_userid($id);
		 $this->page_data['experiences'] = $this->app_management_model->get_experience_userid($id);

		 $this->load->view('admin/app_management/application_preview_ad_yep', $this->page_data);
	}
	
//=======================================================================================
	
	/*public function district()
	{
		ifPermissions('district_list');
		$this->page_data['page']->title = 'District List';
		$this->page_data['page']->submenu = 'district';
		$this->page_data['districts'] = $this->location_model->get_districts();
		$this->load->view('admin/location/district_list', $this->page_data);
	}
	
	public function tehsil()
	{
		ifPermissions('tehsil_list');
		$this->page_data['page']->title = 'Tehsil List';
		$this->page_data['page']->submenu = 'tehsil';
		$this->page_data['tehsils'] = $this->location_model->get_tehsils();
		$this->load->view('admin/location/tehsil_list', $this->page_data);
	}

	public function state_add()
	{
		ifPermissions('state_add');
		$this->load->view('admin/location/state_add', $this->page_data);
	}

	public function save_state()
	{
		ifPermissions('state_add'); // Change permission check to state-related
		postAllowed();
		$id = $this->location_model->create(array(
			'state_code'       => post('state_code'),
			'state_name_en'    => post('state_name_en'),
			'state_status'     => post('state_status') ? post('state_status') : 1, // Default status is 1 (active)
			'state_order'      => post('state_order'),
			'state_created'    => date('Y-m-d H:i:s'),
			'state_createdby'  => logged('id'),
			'state_updated'    => date('Y-m-d H:i:s'),
			'state_updatedby'  => logged('id')
		), 'states');
	
		$this->activity_model->add('New State #' . $id . ' Created by User:' . logged('name'), logged('id'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New State Created Successfully');
		redirect('location'); // Redirect to the state listing page
	}

	public function state_edit($id)
	{
		ifPermissions('state_edit');
		$this->page_data['state'] = $this->location_model->getById($id, 'states', 'state_id');
		$this->load->view('admin/location/state_edit', $this->page_data);
	}


	public function state_update($id)
	{
		ifPermissions('state_edit');
		postAllowed();

		$data = [
			'state_code'       => post('state_code'),
			'state_name_en'    => post('state_name_en'),
			'state_order'      => post('state_order'),
			'state_updated'    => date('Y-m-d H:i:s'),
			'state_updatedby'  => logged('id')
		];

		$uid = $this->location_model->update_state($id, $data);

		$this->activity_model->add("State #$id Updated by User:".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'State has been Updated Successfully');
		
		redirect('location');
	}

	public function state_delete($id)
	{
		ifPermissions('state_delete');
		if($id!==1 && $id!=logged($id)){ }else{
			redirect('/','refresh');
			return;
		}
		
		$table = $this->input->get('table') ?? 'states'; // Default table 'states'
    	$primaryKey = $this->input->get('key') ?? 'state_id'; // Default primary key 'state_id'
		
		$id = $this->location_model->delete($id, $table, $primaryKey);
		$this->activity_model->add("State #$id Deleted by User:".logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'State has been Deleted Successfully');
		redirect('location');
	}
	
	public function district_add()
	{
		ifPermissions('district_add');
		$this->page_data['states'] = $this->location_model->get_states();
		$this->load->view('admin/location/district_add', $this->page_data);
	}
	
	public function save_district()
	{
		ifPermissions('district_add'); // Change permission check to district-related
		postAllowed();
	
		$id = $this->location_model->create(array(
			'district_code'      => post('district_code'),
			'district_name_en'   => post('district_name_en'),
			'district_sort'      => post('district_sort'), // Default sort order is 0
			'district_status'    => post('district_status') ? post('district_status') : 1, // Default status is 1 (active)
			'district_created'   => date('Y-m-d H:i:s'),
			'district_createdby' => logged('id'),
			'district_updated'   => date('Y-m-d H:i:s'),
			'district_updatedby' => logged('id'),
			'district_state_id'  => post('district_state_id') // Foreign key reference to states
		), 'districts'); // Pass 'district' as table name
	
		$this->activity_model->add('New District #' . $id . ' Created by User:' . logged('name'), logged('id'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New District Created Successfully');
		redirect('location/district'); // Redirect to district listing page
	}
	
	public function district_edit($id)
	{
		ifPermissions('district_edit');
		$this->page_data['district'] = $this->location_model->getById($id, 'districts', 'district_id');
		$this->page_data['states'] = $this->location_model->get_states();
		$this->load->view('admin/location/district_edit', $this->page_data);
	}
	
	public function district_update($id)
	{
		ifPermissions('district_edit'); // Ensure correct permission check
		postAllowed();
	
		$data = [
			'district_name_en'  => post('district_name_en'),
			'district_code'     => post('district_code'),
			'district_sort'     => post('district_sort'),
			'district_state_id' => post('district_state_id'), // State selection
			'district_updated'  => date('Y-m-d H:i:s'),
			'district_updatedby'=> logged('id')
		];
	
		$this->location_model->update_district($id, $data);
		$this->activity_model->add("District #$id Updated by User: " . logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'District has been Updated Successfully');
	
		redirect('location/district'); // Redirect to the district listing page
	}
	
	public function district_delete($id)
	{
		ifPermissions('district_delete');
		if($id!==1 && $id!=logged($id)){ }else{
			redirect('/','refresh');
			return;
		}
		
		$id = $this->location_model->delete($id, 'districts', 'district_id');
		$this->activity_model->add("District #$id Deleted by User:".logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'District has been Deleted Successfully');
		redirect('location/district');
	}
	
	public function tehsil_add()
	{
		ifPermissions('tehsil_add');
		$this->page_data['states'] = $this->location_model->get_states();
		$this->load->view('admin/location/tehsil_add', $this->page_data);
	}
	
	public function distirct_by_state(){
		echo json_encode($this->location_model->get_distirct_by_state($this->input->post('state_id')));
	}
	
	public function tehsil_save()
	{
		ifPermissions('tehsil_add'); // Ensure correct permission check
		postAllowed();
	
		$id = $this->location_model->create(array(
			'tehsil_name_en'    => post('tehsil_name_en'),
			'tehsil_code'       => post('tehsil_code'),
			'tehsil_order'      => post('tehsil_order'),
			'tehsil_status'     => post('tehsil_status') ? post('tehsil_status') : 1, // Default status is 1 (active)
			'tehsil_created'    => date('Y-m-d H:i:s'),
			'tehsil_createdby'  => logged('id'),
			'tehsil_updated'    => date('Y-m-d H:i:s'),
			'tehsil_updatedby'  => logged('id'),
			'tehsil_state_id'   => post('tehsil_state_id'), // Foreign key reference to states
			'tehsil_district_id'=> post('tehsil_district_id') // Foreign key reference to districts
		), 'tehsils'); // Pass 'tehsils' as table name
	
		$this->activity_model->add('New Tehsil #' . $id . ' Created by User:' . logged('name'), logged('id'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New Tehsil Created Successfully');
		redirect('location/tehsil'); // Redirect to tehsil listing page
	}
	
	public function tehsil_edit($id)
	{
		ifPermissions('tehsil_edit');
		$this->page_data['tehsil'] = $this->location_model->getById($id, 'tehsils', 'tehsil_id');
		$this->page_data['states'] = $this->location_model->get_states();
		$this->page_data['districts'] = $this->location_model->get_districts();
		$this->load->view('admin/location/tehsil_edit', $this->page_data);
	}
	
	public function tehsil_update($id)
	{
		ifPermissions('tehsil_edit'); // Ensure correct permission check
		postAllowed();
	
		$data = [
			'tehsil_name_en'    => post('tehsil_name_en'),
			'tehsil_code'       => post('tehsil_code'),
			'tehsil_order'      => post('tehsil_order'),
			'tehsil_state_id'   => post('tehsil_state_id'), // State selection
			'tehsil_district_id'=> post('tehsil_district_id'), // District selection
			'tehsil_updated'    => date('Y-m-d H:i:s'),
			'tehsil_updatedby'  => logged('id')
		];
	
		$this->location_model->update_tehsil($id, $data);
		$this->activity_model->add("Tehsil #$id Updated by User: " . logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Tehsil has been Updated Successfully');
	
		redirect('location/tehsil'); // Redirect to the tehsil listing page
	}

	public function tehsil_delete($id)
	{
		ifPermissions('tehsil_delete');
		if($id!==1 && $id!=logged($id)){ }else{
			redirect('/','refresh');
			return;
		}
		
		$id = $this->location_model->delete($id, 'tehsils', 'tehsil_id');
		$this->activity_model->add("Tehsil #$id Deleted by User:".logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Tehsil has been Deleted Successfully');
		redirect('location/tehsil');
	}
	
	public function change_state_status($id)
	{
		$this->location_model->update_state($id, ['state_status' => get('state_status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}
	
	public function change_district_status($id)
	{
		$this->location_model->update_district($id, ['district_status' => get('district_status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}
	
	public function change_tehsil_status($id)
	{
		$this->location_model->update_tehsil($id, ['tehsil_status' => get('tehsil_status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}*/

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */