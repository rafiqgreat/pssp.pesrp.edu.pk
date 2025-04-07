<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationformind extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!is_logged()){
			redirect('user/login','refresh');
		}
		$this->load->library('functions');
	}
	public function index()
	{
		 $this->page_data['page']->title = 'Individual Application Form';	
		 $this->page_data['page']->menu = 'applicationformind';	
		 
		 $this->page_data['districts'] = $this->user_applicationformind_model->get_districts();
		 
		 if($this->session->logged['role']==3){
		 	$this->load->view('user/applicationformind/individual', $this->page_data);
		 }
	}
	
	public function tehsil_by_district(){
		$id=0;
		if($this->input->post('ind_districtid'))
			$id = $this->input->post('ind_districtid');
		echo json_encode($this->user_applicationformind_model->get_tehsil_by_district($id));
	}
	
	public function save()
	{
		$data = array(
			'ind_userid'		 => $this->session->userdata['logged']['id'],
			'ind_fname'        => $this->input->post('ind_fname'),
			'ind_fhusband'     => $this->input->post('ind_fhusband'),
			'ind_address'   	 => $this->input->post('ind_address'),
			'ind_districtid'   => $this->input->post('ind_districtid'),
			'ind_tehsilid'     => $this->input->post('ind_tehsilid'),
			'ind_dom_disid'    => $this->input->post('ind_dom_disid'),
			'ind_cnic'         => $this->input->post('ind_cnic'),
			'ind_dob'          => $this->input->post('ind_dob'),
			'ind_gender'       => $this->input->post('ind_gender'),
			'ind_maritalstatus'=> $this->input->post('ind_maritalstatus'),
			'ind_wmobile'      => $this->input->post('ind_wmobile'),
			'ind_mobile'       => $this->input->post('ind_mobile'),
			'ind_email'        => $this->input->post('ind_email'),
		);
		
		$litigation = $this->input->post('litigation');	
		// Handle file upload only if litigation is 'yes'
		if ($litigation === 'yes' && isset($_FILES['ind_declaration_img']) && $_FILES['ind_declaration_img']['error'] === UPLOAD_ERR_OK) 
		{
			$path="uploads/case_files/";
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			
			if(!empty($_FILES['ind_declaration_img']['name']))
			{
				$result = $this->functions->file_insert($path, 'ind_declaration_img', 'image', '9097152');
				if($result['status'] == 1){
					$data['ind_declaration_img'] = $path.$result['msg'];
				}
				else{
					$this->session->set_flashdata('alert-type', 'error');
					$this->session->set_flashdata('alert', 'File did not uploaded');
					redirect(base_url('user/applicationformind'), 'refresh');
				}
			}
		}
	
		$data['ind_declaration'] = $litigation;
		$data['ind_updated_at']  = date('Y-m-d H:i:s');
	
		$ind_id = $this->user_applicationformind_model->insert_ind_applicant($data);
	
		if ($ind_id) 
		{
			// Retrieve qulaification rows data
			  $qi_deg_name = $this->input->post('qi_deg_name');
			  $qi_institution = $this->input->post('qi_institution');
			  $qi_deg_type = $this->input->post('qi_deg_type');
			  $qi_percentage = $this->input->post('qi_percentage');
			  $qi_from = $this->input->post('qi_from');
			  $qi_to = $this->input->post('qi_to');
				// Process each row
			  for ($i = 0; $i < count($qi_deg_name); $i++) 
			  {
					$data_ind = array(
						'qi_ind_id' => $ind_id,
						'qi_deg_name' => $qi_deg_name[$i],
						'qi_institution' => $qi_institution[$i],
						'qi_deg_type' => $qi_deg_type[$i],
						'qi_percentage' => $qi_percentage[$i],
						'qi_from' => $qi_from[$i],
						'qi_to' => $qi_to[$i],
					);
					$this->user_applicationformind_model->add_ind_multipleinfo('tbl_qualification_ind',$data_ind);
			  }
			  
			  // Retrieve Experience rows data
			  $ei_employer = $this->input->post('ei_employer');
			  $ei_designation = $this->input->post('ei_designation');
			  $ei_from = $this->input->post('ei_from');
			  $ei_to = $this->input->post('ei_to');
			  $ei_year = $this->input->post('ei_year');
				// Process each row
			  for ($i = 0; $i < count($ei_employer); $i++) 
			  {
					$data_indexp = array(
						'ei_ind_id' => $ind_id,
						'ei_employer' => $ei_employer[$i],
						'ei_designation' => $ei_designation[$i],
						'ei_year' => $ei_year[$i],
						'ei_to' => $ei_to[$i],
						'ei_from' => $ei_from[$i],
					);
					$this->user_applicationformind_model->add_ind_multipleinfo('tbl_experience_ind',$data_indexp);
			  }
			
			
			
			
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Individual Application Form inserted Successfully');
			
			echo json_encode(['status' => 'success', 'insert_id' => $insert_id]);
			redirect('user/dashboard');
		} else {
			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Failed to insert Application Form');
			echo json_encode(['status' => 'error', 'message' => 'Failed to insert']);
			redirect('user/applicationformind');
		}
	}
	
	public function update_s1_applicant()
	{
		$data = array(
			'ye_s1_fname' 			=> $this->input->post('ye_s1_fname'),
			'ye_s1_fhusband' 		=> $this->input->post('ye_s1_fhusband'),
			'ye_s1_districtid' 		=> $this->input->post('ye_s1_districtid'),
			'ye_s1_tehsilid' 		=> $this->input->post('ye_s1_tehsilid'),
			'ye_s1_dom_disid' 		=> $this->input->post('ye_s1_dom_disid'),
			'ye_s1_cnic' 			=> $this->input->post('ye_s1_cnic'),
			'ye_s1_dob' 			=> $this->input->post('ye_s1_dob'),
			'ye_s1_gender' 			=> $this->input->post('ye_s1_gender'),
			'ye_s1_maritalstatus' 	=> $this->input->post('ye_s1_maritalstatus'),
			'ye_s1_wmobile' 		=> $this->input->post('ye_s1_wmobile'),
			'ye_s1_mobile' 			=> $this->input->post('ye_s1_mobile'),
			'ye_updated_at' 		=> date('Y-m-d H:i:s')
		);
	
		$ye_id = $this->input->post('ye_id');
		$resul_s1 = $this->user_applicationformind_model->update_support_applicant($ye_id, $data);
		
		if ($resul_s1) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
		}
	}
	
	public function update_s2_applicant() {
		$this->load->model('applicationformind_model');
	
		$data = [
			'ye_s2_fname' => $this->input->post('ye_s2_fname'),
			'ye_s2_fhusband' => $this->input->post('ye_s2_fhusband'),
			'ye_s2_districtid' => $this->input->post('ye_s2_districtid'),
			'ye_s2_tehsilid' => $this->input->post('ye_s2_tehsilid'),
			'ye_s2_dom_disid' => $this->input->post('ye_s2_dom_disid'),
			'ye_s2_cnic' => $this->input->post('ye_s2_cnic'),
			'ye_s2_dob' => $this->input->post('ye_s2_dob'),
			'ye_s2_gender' => $this->input->post('ye_s2_gender'),
			'ye_s2_maritalstatus' => $this->input->post('ye_s2_maritalstatus'),
			'ye_s2_wmobile' => $this->input->post('ye_s2_wmobile'),
			'ye_s2_mobile' => $this->input->post('ye_s2_mobile'),
			'ye_updated_at' => date('Y-m-d H:i:s')
		];
	
		$ye_id = $this->input->post('ye_id');
		$update = $this->user_applicationformind_model->update_support_applicant($ye_id, $data);
	
		if ($update) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Database update failed.']);
		}
	}
	
	public function save_qualification() {
		$this->load->helper('url');
//		$this->load->database();
		$this->load->library('session');
	
		$input = json_decode($this->input->raw_input_stream, true);
		$qualifications = $input['qualifications'];
	
		$user_id = $this->session->userdata['logged']['id']; // or however you get user ID
	
		$success = true; // Flag to check if all qualifications are saved successfully
	
		foreach ($qualifications as $order => $qual) {
			$data = [
				'qual_userid'       => $user_id,
				'qual_user_type'    => $qual['qual_user_type'],
				'qual_deg_name'     => $qual['qual_deg_name'],
				'qual_order'        => $order + 1,
				'qual_deg_type'     => strtolower($qual['qual_deg_type']),
				'qual_institution'  => $qual['qual_institution'],
				'qual_percentage'   => $qual['qual_percentage'],
				'qual_from'         => $qual['qual_from'],
				'qual_to'           => $qual['qual_to'],
				'qual_created_at'   => date('Y-m-d H:i:s')
			];
			$result = $this->user_applicationformind_model->save_qualification($data);
			if (!$result) {
				$success = false;
				break;
			}
		}
	
		if ($success) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function save_experience() {
		$this->load->helper('url');
		$this->load->library('session');
	
		// Decode the raw JSON input
		$input = json_decode($this->input->raw_input_stream, true);
		$experiences = $input['experiences'];
	
		// Get the logged-in user's ID
		$user_id = $this->session->userdata['logged']['id']; // or however you get user ID
	
		$success = true; // Flag to check if all experiences are saved successfully
	
		// Loop through each experience and save it
		foreach ($experiences as $order => $exp) {
			$data = [
				'exp_userid'        => $user_id,
				'exp_type'          => $exp['exp_user_type'], // Experience type (lead, s1, s2)
				'exp_order'         => $order + 1, // Ordering experience entries (if needed)
				'exp_employer'      => $exp['exp_employer'],
				'exp_name'          => $exp['exp_name'], // This seems like the job title or name of the position
				'exp_designation'   => $exp['exp_designation'],
				'exp_from'          => $exp['exp_from'],
				'exp_to'            => $exp['exp_to'],
				'exp_year'          => $exp['exp_year'],
				'exp_create_at'     => date('Y-m-d H:i:s')
			];
	
			// Call the model function to save the experience data
			$result = $this->user_applicationformind_model->save_experience($data);
	
			// If saving fails, set success flag to false and break out of the loop
			if (!$result) {
				$success = false;
				break;
			}
		}
	
		// Return the response
		if ($success) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function save_declaration() {
		$this->load->library('session');
		
		$ye_id = $this->input->post('insertedYeId');
		$litigation = $this->input->post('litigation');
		
		$case_file_name = '';
	
		// Handle file upload only if litigation is 'yes'
		if ($litigation === 'yes' && isset($_FILES['ye_declaration_img']) && $_FILES['ye_declaration_img']['error'] === UPLOAD_ERR_OK) {
			$config['upload_path']   = './uploads/case_files/';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			$config['max_size']      = 2048; // 2MB max
			$config['file_name']     = uniqid('case_');
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload('ye_declaration_img')) {
				echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
				return;
			} else {
				$uploadData = $this->upload->data();
				$case_file_name = $uploadData['file_name'];
			}
		}
	
		$data = [
			'ye_declaration'  		=> $litigation,
			'ye_declaration_img'	=> $case_file_name,
			'ye_updated_at' 		=> date('Y-m-d H:i:s')
		];
		
		$result = $this->user_applicationformind_model->save_declaration($ye_id, $data);
	
		if ($result) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function select_school()
	{		
		 $this->page_data['page']->menu = 'select_school';	
		 $this->page_data['districts'] = $this->user_applicationformind_model->get_districts();
		 $this->load->view('user/applicationformind/select_school_indv', $this->page_data);
	}
	
	public function save_school() {
		$this->load->library('session');
		// Get the posted data
		$selected_schools = json_decode($this->input->post('selected_schools', true), true);
		
		// Check if selected_schools is an array and contains no more than 3 schools
		if (is_array($selected_schools) && count($selected_schools) > 3) {
			// If more than 3 schools are selected, show an error
			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('error', 'You can only select up to 3 schools.');
			redirect('user/applicationformind/select_school');
		}
	
		// Data to insert into the tbl_user_young_ent table
		$data = [
			'ind_school_1' => isset($selected_schools[0]) ? $selected_schools[0] : null,
			'ind_school_2' => isset($selected_schools[1]) ? $selected_schools[1] : null,
			'ind_school_3' => isset($selected_schools[2]) ? $selected_schools[2] : null,
			// Add other form data here...
		];
	
		// Update the database with the selected schools data
		$ind_userid = $this->session->logged['id'];
		$update = $this->user_applicationformind_model->update_school_save($ind_userid, $data);
		
		// Set success message
		$this->session->set_flashdata('success', 'Schools nominated successfully!');
		$this->session->set_flashdata('alert-type', 'success');
		redirect('user/applicationformind/select_school');
	}
	
	public function generate_challan()
	{		
		 $this->page_data['page']->menu = 'generate_challan';
		 $ind_userid = $this->session->logged['id'];	
		 $this->page_data['data_indv'] = $this->user_applicationformind_model->get_by_id_with_joins($ind_userid);
		 //$this->page_data['districts'] = $this->get_districts();
		 $this->load->view('user/applicationformind/generate_challan_indv', $this->page_data);
	}


}
