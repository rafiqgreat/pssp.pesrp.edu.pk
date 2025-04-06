<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationform extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('functions');
		if(!is_logged()){
			redirect('user/login','refresh');
		}
	}
	public function index()
	{		
		 $this->page_data['districts'] = $this->user_applicationform_model->get_districts();
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
	
	public function tehsil_by_district(){
		$id=0;
		if($this->input->post('ye_lead_districtid')){
			$id = $this->input->post('ye_lead_districtid');
		}elseif($this->input->post('ye_s1_districtid')){
			$id = $this->input->post('ye_s1_districtid');
		}elseif($this->input->post('ye_s2_districtid')){
			$id = $this->input->post('ye_s2_districtid');
		}
		echo json_encode($this->user_applicationform_model->get_tehsil_by_district($id));
	}
	
	public function insert_lead_applicant()
	{
		$data = array(
			'ye_userid'			   => $this->session->userdata['logged']['id'],
			'ye_lead_fname'        => $this->input->post('ye_lead_fname'),
			'ye_lead_fhusband'     => $this->input->post('ye_lead_fhusband'),
			'ye_lead_districtid'   => $this->input->post('ye_lead_districtid'),
			'ye_lead_tehsilid'     => $this->input->post('ye_lead_tehsilid'),
			'ye_lead_dom_disid'    => $this->input->post('ye_lead_dom_disid'),
			'ye_lead_cnic'         => $this->input->post('ye_lead_cnic'),
			'ye_lead_dob'          => $this->input->post('ye_lead_dob'),
			'ye_lead_gender'       => $this->input->post('ye_lead_gender'),
			'ye_lead_maritalstatus'=> $this->input->post('ye_lead_maritalstatus'),
			'ye_lead_wmobile'      => $this->input->post('ye_lead_wmobile'),
			'ye_lead_mobile'       => $this->input->post('ye_lead_mobile'),
		);
		
		//echo '<pre>';
//		print_r($data);
//		die();
	
		$insert_id = $this->user_applicationform_model->insert_lead_applicant($data);
	
		if ($insert_id) {
			echo json_encode(['status' => 'success', 'insert_id' => $insert_id]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to insert']);
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
		$resul_s1 = $this->user_applicationform_model->update_support_applicant($ye_id, $data);
		
		if ($resul_s1) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
		}
	}
	
	public function update_s2_applicant() {
		$this->load->model('Applicationform_model');
	
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
		$update = $this->user_applicationform_model->update_support_applicant($ye_id, $data);
	
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
			$result = $this->user_applicationform_model->save_qualification($data);
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
			$result = $this->user_applicationform_model->save_experience($data);
	
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
	
		$ye_userid = $this->session->userdata['logged']['id'];
		$litigation = $this->input->post('litigation');
	
		$case_file_path = '';
	
		// Handle file upload only if litigation is 'yes'
		if ($litigation === 'yes' && isset($_FILES['ye_declaration_img']['name']) && !empty($_FILES['ye_declaration_img']['name'])) {
	
			// Use your preferred path
			$path = 'uploads/case_files/';
			$filename = $_FILES['ye_declaration_img']['name'];
			$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
			
			if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
				$upload_type = 'image';
			} elseif ($ext == 'pdf') {
				$upload_type = 'pdf';
			} elseif (in_array($ext, ['xls', 'xlsx'])) {
				$upload_type = 'excel';
			} elseif (in_array($ext, ['doc', 'docx', 'txt', 'rtf'])) {
				$upload_type = 'doc';
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Unsupported file type.']);
				return;
			}

	
			// Call your custom file insert helper (limit: 2MB = 2097152 bytes)
			//$result = $this->functions->file_insert($path, 'ye_declaration_img', 'file', '2097152');
			$result = $this->functions->file_insert($path, 'ye_declaration_img', $upload_type, '2097152');

	
			if ($result['status'] == 1) {
				$case_file_path = $path . $result['msg']; // full relative path
			} else {
				echo json_encode(['status' => 'error', 'message' => $result['msg']]);
				return;
			}
		}
	
		$data = [
			'ye_declaration'        => $litigation,
			'ye_declaration_img'    => $case_file_path,
			'ye_updated_at'         => date('Y-m-d H:i:s')
		];
	
		$result = $this->user_applicationform_model->save_declaration($ye_userid, $data);
	
		if ($result) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function select_school()
	{		
		 $this->page_data['districts'] = $this->user_applicationform_model->get_districts();
		 $this->load->view('user/applicationform/select_school_yep', $this->page_data);
	}
	
	public function teh_by_district(){
		echo json_encode($this->location_model->get_tehsil_by_district($this->input->post('district_id')));
	}
	
	public function school_by_tehsil() {
		$tehsil_id = $this->input->post('tehsil_id');
		$schools = $this->db->get_where('schools', ['school_tehsil_id' => $tehsil_id])->result();
		echo json_encode($schools);
	}
	
	public function save_school() {
		// Get the posted data
		$selected_schools = json_decode($this->input->post('selected_schools', true), true);
		
		// Check if selected_schools is an array and contains no more than 3 schools
		if (is_array($selected_schools) && count($selected_schools) > 3) {
			// If more than 3 schools are selected, show an error
			$this->session->set_flashdata('error', 'You can only select up to 3 schools.');
			redirect('user/applicationform');
		}
	
		// Data to insert into the tbl_user_young_ent table
		$data = [
			'ye_school_1' => isset($selected_schools[0]) ? $selected_schools[0] : null,
			'ye_school_2' => isset($selected_schools[1]) ? $selected_schools[1] : null,
			'ye_school_3' => isset($selected_schools[2]) ? $selected_schools[2] : null,
			// Add other form data here...
		];
	
		// Update the database with the selected schools data
		$ye_userid = $this->session->logged['id'];
		$update = $this->user_applicationform_model->update_school_save($ye_userid, $data);
		
		// Set success message
		$this->session->set_flashdata('success', 'Schools nominated successfully!');
		redirect('user/applicationform');
	}




}
