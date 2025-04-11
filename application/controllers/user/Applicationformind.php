<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Mpdf\Mpdf;
class Applicationformind extends MY_Controller 
{
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
		 $userid = $this->session->logged['id'];	
		 $indvidual = $this->user_applicationformind_model->get_app_preview_userid($userid);
		 if(!empty($indvidual))
		 	redirect('user/applicationformind/applicationpreview');
			
		 $this->page_data['page']->title = 'Individual Application Form';	
		 $this->page_data['page']->menu = 'applicationformind';	
		 
		 $this->page_data['districts'] = $this->user_applicationformind_model->get_districts();
		 
		 if($this->session->logged['role']==3){
		 	$this->load->view('user/applicationformind/individual', $this->page_data);
		 }
	}
	
	public function tehsil_by_district()
	{
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
			'ind_school_1'     => $this->input->post('ind_school_1'),
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
						'qi_userid'	=> $this->session->userdata['logged']['id'],
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
						'ei_userid'	=> $this->session->userdata['logged']['id'],
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
			redirect('user/applicationformind/applicationpreview');
		} 
		else 
		{
			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Failed to insert Application Form');
			echo json_encode(['status' => 'error', 'message' => 'Failed to insert']);
			redirect('user/applicationformind');
		}
	}
	
	public function edit()
	{
		$userid	= $this->session->userdata['logged']['id'];
		$ind_id = $this->input->post('ind_id');
		if($this->input->post('submit'))
		{ 
			$data = array(
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
				'ind_school_1'     => $this->input->post('ind_school_1'),
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
						redirect(base_url('user/applicationformind/edit'), 'refresh');
					}
				}
			}
		
			$data['ind_declaration'] = $litigation;
			$data['ind_updated_at']  = date('Y-m-d H:i:s');
			
			$result = $this->user_applicationformind_model->update_ind_applicant($userid, $data);
			
			if ($result) 
			{ 
				  // Retrieve qulaification rows data
				  $this->db->delete('tbl_qualification_ind', array('qi_userid' => $userid));
				  
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
							'qi_userid'	=> $this->session->userdata['logged']['id'],
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
				  $this->db->delete('tbl_experience_ind', array('ei_userid' => $userid));
				  
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
							'ei_userid'	=> $this->session->userdata['logged']['id'],
							'ei_employer' => $ei_employer[$i],
							'ei_designation' => $ei_designation[$i],
							'ei_year' => $ei_year[$i],
							'ei_to' => $ei_to[$i],
							'ei_from' => $ei_from[$i],
						);
						$this->user_applicationformind_model->add_ind_multipleinfo('tbl_experience_ind',$data_indexp);
				  }			
				
				$this->session->set_flashdata('alert-type', 'success');
				$this->session->set_flashdata('alert', 'Individual Application Form updated successfully');
				
				echo json_encode(['status' => 'success', 'insert_id' => $insert_id]);
				redirect('user/applicationformind/applicationpreview');
			} 
			else 
			{
				$this->session->set_flashdata('alert-type', 'error');
				$this->session->set_flashdata('alert', 'Failed to update Application Form');
				redirect('user/applicationformind/edit');
			}
		}
		else
		{
			$this->page_data['page']->title = 'Edit Individual Form';		
			$this->page_data['page']->menu = 'applicationpreview';
			
			$userid = $this->session->logged['id'];
			$this->page_data['districts'] = $this->user_applicationformind_model->get_districts();
			$this->page_data['indvidual'] = $this->user_applicationformind_model->get_app_preview_userid($userid);
			$this->page_data['tehsils'] = $this->user_applicationformind_model->get_tehsil_by_district($this->page_data['indvidual']['ind_districtid']);
			
			$this->page_data['school'] = $this->user_applicationformind_model->get_school_info($this->page_data['indvidual']['ind_school_1']);
			$schoolinfo = $this->user_applicationformind_model->get_school_info($this->page_data['indvidual']['ind_school_1']);
			if($schoolinfo)
			{
				$this->page_data['schooltehsils'] = $this->user_applicationformind_model->get_tehsil_by_district($schoolinfo['school_district_id']);
				$this->page_data['schools'] = $this->user_applicationformind_model->get_schools_by_tehsilid($schoolinfo['school_tehsil_id']);
			}
			else
			{
				$this->page_data['schooltehsils'] = array();
				$this->page_data['schools'] = array();
			}
				
			$this->page_data['qulaifications'] = $this->user_applicationformind_model->get_qualification_userid($userid);
			$this->page_data['experiences'] = $this->user_applicationformind_model->get_experience_userid($userid);
			
			$this->load->view('user/applicationformind/individual_edit', $this->page_data);
		}
	}
	
	public function select_school()
	{		
		 $this->page_data['page']->menu = 'select_school';	
		 $this->page_data['districts'] = $this->user_applicationformind_model->get_districts();
		 $this->load->view('user/applicationformind/select_school_indv', $this->page_data);
	}
	
	public function save_school() 
	{
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
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Schools nominated successfully!');
		redirect('user/applicationformind/select_school');
	}
	
	public function generate_challan()
	{		
		 $this->page_data['page']->menu = 'generate_challan';
		 $ind_userid = $this->session->logged['id'];	
		 $this->page_data['data_indv'] = $this->user_applicationformind_model->get_by_id_with_joins($ind_userid);
		 $html =  $this->load->view('user/applicationformind/generate_challan_indv', $this->page_data, true);
		
		$mpdf = new Mpdf([
			 'default_font' => 'arial',
			 'margin_top' => 6,
			 'margin_bottom' => 10,
			 'margin_left' => 10,
			 'margin_right' => 10
		]);
		//$mpdf->showImageErrors = true;
		//$mpdf->SetHTMLHeader('<div style="text-align: center;">Subject Report - Header</div><hr>');
		$mpdf->SetHTMLFooter('<div style="color:red; width:530px; margin:0 auto;">Depositor must present the "computerized" deposit slip of BOP Easy Pay Cash Management System to PEF authority as proof of deposit. Sign and stamp on the downloaded challan form or manual deposit is not acceptable to PEF authority <br><br><strong>Print Date and Time:</strong> '.date('n/j/Y g:i:s A').' </div>');
		
		$mpdf->SetAuthor("DWS IT TEAM");
		$mpdf->SetTitle("Challan Form");
		$mpdf->WriteHTML($html);
		$mpdf->Output("challan_form.pdf", "D"); 
		exit;
	}
	
	public function school_by_tehsil()
	{
		$tehsil_id = $this->input->post('tehsil_id');
		//$schools = $this->db->get_where('schools', ['school_tehsil_id' => $tehsil_id])->result();
		$schools = $this->user_applicationformind_model->get_schools_by_tehsilid($tehsil_id);
		echo json_encode($schools);
	}
	
	public function applicationpreview()
	{	
		 $this->page_data['page']->title = 'Application Preview Individual';		
		 $this->page_data['page']->menu = 'applicationpreviewind';
		 
		 $userid = $this->session->logged['id'];	
		 $this->page_data['indvidual'] = $this->user_applicationformind_model->get_app_preview_userid($userid);
		 $this->page_data['qulaifications'] = $this->user_applicationformind_model->get_qualification_userid($userid);
		 $this->page_data['experiences'] = $this->user_applicationformind_model->get_experience_userid($userid);
		 
		 $this->load->view('user/applicationformind/application_preview_ind', $this->page_data);
	}
	
	public function finalsubmission() 
	{
		$data = [
			'ind_final_submit' => 1
		];
		$ind_userid = $this->session->logged['id'];
		$update = $this->user_applicationformind_model->update_final_submission($ind_userid, $data);
		
		if($update)
		{
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Application Final Submit done successfully!');
			redirect('user/applicationformind/applicationpreview');
		}
		else
		{
			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Application Final Submit not submitted!');
			redirect('user/applicationformind/applicationpreview');
		}
	}
}
