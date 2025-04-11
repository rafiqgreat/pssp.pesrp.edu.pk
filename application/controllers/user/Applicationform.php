<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Mpdf\Mpdf;
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
		$userid = $this->session->logged['id'];	
		$indvidual = $this->user_applicationform_model->get_app_preview_userid($userid);
		if(!empty($indvidual))
			redirect('user/applicationform/applicationpreview');
		$this->page_data['page']->title = 'Young Entrepreneur Application Form';
		$this->page_data['page']->menu = 'applicationform';
			
		$this->page_data['districts'] = $this->user_applicationform_model->get_districts();
		$ye_userid = $this->session->logged['id'];
		$this->page_data['data_young_ent'] = $this->user_applicationform_model->get_by_id('tbl_user_young_ent', ['ye_userid' => $ye_userid]);
		$this->page_data['data_young_qual'] = $this->user_applicationform_model->get_by_id('tbl_qualification', ['qual_userid' => $ye_userid]);
		$this->page_data['data_young_exp'] = $this->user_applicationform_model->get_by_id('tbl_experience', ['exp_userid' => $ye_userid]);
		
		$this->load->view('user/applicationform/young_entrepreneur_application', $this->page_data);
	}
	
	public function tehsil_by_district()
	{
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
	
	public function save_young_ent_form()
	{
		$data = array(
			'ye_userid'			   	=> $this->session->userdata['logged']['id'],
			'ye_lead_fname'        	=> $this->input->post('ye_lead_fname'),
			'ye_lead_fhusband'     	=> $this->input->post('ye_lead_fhusband'),
			'ye_lead_address'     	=> $this->input->post('ye_lead_address'),
			'ye_lead_districtid'   	=> $this->input->post('ye_lead_districtid'),
			'ye_lead_tehsilid'     	=> $this->input->post('ye_lead_tehsilid'),
			'ye_lead_dom_disid'    	=> $this->input->post('ye_lead_dom_disid'),
			'ye_lead_cnic'         	=> $this->input->post('ye_lead_cnic'),
			'ye_lead_dob'          	=> $this->input->post('ye_lead_dob'),
			'ye_lead_gender'       	=> $this->input->post('ye_lead_gender'),
			'ye_lead_maritalstatus'	=> $this->input->post('ye_lead_maritalstatus'),
			'ye_lead_wmobile'      	=> $this->input->post('ye_lead_wmobile'),
			'ye_lead_mobile'       	=> $this->input->post('ye_lead_mobile'),
			'ye_lead_email'       	=> $this->input->post('ye_lead_email'),
			'ye_school_1'       		=> $this->input->post('ye_school_1'),
			
			'ye_s1_fname' 			=> $this->input->post('ye_s1_fname'),
			'ye_s1_fhusband' 		=> $this->input->post('ye_s1_fhusband'),
			'ye_s1_districtid' 	=> $this->input->post('ye_s1_districtid'),
			'ye_s1_address' 		=> $this->input->post('ye_s1_address'),
			'ye_s1_tehsilid' 		=> $this->input->post('ye_s1_tehsilid'),
			'ye_s1_dom_disid' 	=> $this->input->post('ye_s1_dom_disid'),
			'ye_s1_cnic' 			=> $this->input->post('ye_s1_cnic'),
			'ye_s1_dob' 			=> $this->input->post('ye_s1_dob'),
			'ye_s1_gender' 		=> $this->input->post('ye_s1_gender'),
			'ye_s1_maritalstatus' => $this->input->post('ye_s1_maritalstatus'),
			'ye_s1_wmobile' 		=> $this->input->post('ye_s1_wmobile'),
			'ye_s1_mobile' 		=> $this->input->post('ye_s1_mobile'),
			'ye_s1_email' 			=> $this->input->post('ye_s1_email'),
			
			'ye_s2_fname' 			=> $this->input->post('ye_s2_fname'),
			'ye_s2_fhusband' 		=> $this->input->post('ye_s2_fhusband'),
			'ye_s2_address' 		=> $this->input->post('ye_s2_address'),
			'ye_s2_districtid' 	=> $this->input->post('ye_s2_districtid'),
			'ye_s2_tehsilid' 		=> $this->input->post('ye_s2_tehsilid'),
			'ye_s2_dom_disid' 	=> $this->input->post('ye_s2_dom_disid'),
			'ye_s2_cnic' 			=> $this->input->post('ye_s2_cnic'),
			'ye_s2_dob' 			=> $this->input->post('ye_s2_dob'),
			'ye_s2_gender'			=> $this->input->post('ye_s2_gender'),
			'ye_s2_maritalstatus' => $this->input->post('ye_s2_maritalstatus'),
			'ye_s2_wmobile' 		=> $this->input->post('ye_s2_wmobile'),
			'ye_s2_mobile' 		=> $this->input->post('ye_s2_mobile'),
			'ye_s2_email' 			=> $this->input->post('ye_s2_email'),
		);
		
		$litigation = $this->input->post('litigation');	
		// Handle file upload only if litigation is 'yes'
		if ($litigation === 'yes' && isset($_FILES['ye_declaration_img']) && $_FILES['ye_declaration_img']['error'] === UPLOAD_ERR_OK) 
		{
			$path="uploads/case_files/";
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			
			if(!empty($_FILES['ye_declaration_img']['name']))
			{
				$result = $this->functions->file_insert($path, 'ye_declaration_img', 'image', '9097152');
				if($result['status'] == 1){
					$data['ye_declaration_img'] = $path.$result['msg'];
				}
				else{
					$this->session->set_flashdata('alert-type', 'error');
					$this->session->set_flashdata('alert', 'File did not uploaded');
					redirect(base_url('user/applicationform'), 'refresh');
				}
			}
		}
		
		$data['ye_declaration'] = $litigation;
		$data['ye_updated_at']  = date('Y-m-d H:i:s');
		
		//echo '<pre>';
		//print_r($data);
		//die();
	
		$insert_id = $this->user_applicationform_model->insert_lead_applicant($data);
		
		if ($insert_id) 
		{
			// Retrieve qulaification rows data
			  $qual_deg_name = $this->input->post('qual_deg_name');
			  $qual_user_type = $this->input->post('qual_user_type');
			  $qual_institution = $this->input->post('qual_institution');
			  $qual_deg_type = $this->input->post('qual_deg_type');
			  $qual_percentage = $this->input->post('qual_percentage');
			  $qual_from = $this->input->post('qual_from');
			  $qual_to = $this->input->post('qual_to');
				// Process each row
			  for ($i = 0; $i < count($qual_deg_name); $i++) 
			  {
					$data_yep = array(
						'qual_userid' => $this->session->userdata['logged']['id'],
						'qual_deg_name' => $qual_deg_name[$i],
						'qual_user_type' => $qual_user_type[$i],
						'qual_institution' => $qual_institution[$i],
						'qual_deg_type' => $qual_deg_type[$i],
						'qual_percentage' => $qual_percentage[$i],
						'qual_from' => $qual_from[$i],
						'qual_to' => $qual_to[$i],
					);
					$this->user_applicationform_model->add_ind_multipleinfo('tbl_qualification',$data_yep);
			  }
			  
			  // Retrieve Experience rows data
			  $exp_type = $this->input->post('exp_type');
			  $exp_employer = $this->input->post('exp_employer');
			  $exp_designation = $this->input->post('exp_designation');
			  $exp_from = $this->input->post('exp_from');
			  $exp_to = $this->input->post('exp_to');
			  $exp_year = $this->input->post('exp_year');
				// Process each row
			  for ($i = 0; $i < count($exp_employer); $i++) 
			  {
					$data_indexp = array(
						'exp_userid' => $this->session->userdata['logged']['id'],
						'exp_type' => $exp_type[$i],
						'exp_employer' => $exp_employer[$i],
						'exp_designation' => $exp_designation[$i],
						'exp_from' => $exp_from[$i],
						'exp_to' => $exp_to[$i],
						'exp_year' => $exp_year[$i],
					);
					$this->user_applicationform_model->add_ind_multipleinfo('tbl_experience',$data_indexp);
			  }
			
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Young Entrepreneur Application Form inserted Successfully');
			
			echo json_encode(['status' => 'success', 'insert_id' => $insert_id]);
			redirect('user/applicationform/applicationpreview');
		} else {
			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Failed to insert Application Form');
			echo json_encode(['status' => 'error', 'message' => 'Failed to insert']);
			redirect('user/applicationform');
		}
	
		/*if ($insert_id) {
			echo json_encode(['status' => 'success', 'insert_id' => $insert_id]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to insert']);
		}*/
	}
	
	public function edit()
	{
		$userid	= $this->session->userdata['logged']['id'];
		
		if($this->input->post('submit'))
		{ 
			$data = array(
				'ye_userid'			   	=> $this->session->userdata['logged']['id'],
				'ye_lead_fname'        	=> $this->input->post('ye_lead_fname'),
				'ye_lead_fhusband'     	=> $this->input->post('ye_lead_fhusband'),
				'ye_lead_address'     	=> $this->input->post('ye_lead_address'),
				'ye_lead_districtid'   	=> $this->input->post('ye_lead_districtid'),
				'ye_lead_tehsilid'     	=> $this->input->post('ye_lead_tehsilid'),
				'ye_lead_dom_disid'    	=> $this->input->post('ye_lead_dom_disid'),
				'ye_lead_cnic'         	=> $this->input->post('ye_lead_cnic'),
				'ye_lead_dob'          	=> $this->input->post('ye_lead_dob'),
				'ye_lead_gender'       	=> $this->input->post('ye_lead_gender'),
				'ye_lead_maritalstatus'	=> $this->input->post('ye_lead_maritalstatus'),
				'ye_lead_wmobile'      	=> $this->input->post('ye_lead_wmobile'),
				'ye_lead_mobile'       	=> $this->input->post('ye_lead_mobile'),
				'ye_lead_email'       	=> $this->input->post('ye_lead_email'),
				'ye_school_1'       		=> $this->input->post('ye_school_1'),
				
				'ye_s1_fname' 			=> $this->input->post('ye_s1_fname'),
				'ye_s1_fhusband' 		=> $this->input->post('ye_s1_fhusband'),
				'ye_s1_districtid' 	=> $this->input->post('ye_s1_districtid'),
				'ye_s1_address' 		=> $this->input->post('ye_s1_address'),
				'ye_s1_tehsilid' 		=> $this->input->post('ye_s1_tehsilid'),
				'ye_s1_dom_disid' 	=> $this->input->post('ye_s1_dom_disid'),
				'ye_s1_cnic' 			=> $this->input->post('ye_s1_cnic'),
				'ye_s1_dob' 			=> $this->input->post('ye_s1_dob'),
				'ye_s1_gender' 		=> $this->input->post('ye_s1_gender'),
				'ye_s1_maritalstatus' => $this->input->post('ye_s1_maritalstatus'),
				'ye_s1_wmobile' 		=> $this->input->post('ye_s1_wmobile'),
				'ye_s1_mobile' 		=> $this->input->post('ye_s1_mobile'),
				'ye_s1_email' 			=> $this->input->post('ye_s1_email'),
				
				'ye_s2_fname' 			=> $this->input->post('ye_s2_fname'),
				'ye_s2_fhusband' 		=> $this->input->post('ye_s2_fhusband'),
				'ye_s2_address' 		=> $this->input->post('ye_s2_address'),
				'ye_s2_districtid' 	=> $this->input->post('ye_s2_districtid'),
				'ye_s2_tehsilid' 		=> $this->input->post('ye_s2_tehsilid'),
				'ye_s2_dom_disid' 	=> $this->input->post('ye_s2_dom_disid'),
				'ye_s2_cnic' 			=> $this->input->post('ye_s2_cnic'),
				'ye_s2_dob' 			=> $this->input->post('ye_s2_dob'),
				'ye_s2_gender'			=> $this->input->post('ye_s2_gender'),
				'ye_s2_maritalstatus' => $this->input->post('ye_s2_maritalstatus'),
				'ye_s2_wmobile' 		=> $this->input->post('ye_s2_wmobile'),
				'ye_s2_mobile' 		=> $this->input->post('ye_s2_mobile'),
				'ye_s2_email' 			=> $this->input->post('ye_s2_email'),
			);
		
			$litigation = $this->input->post('litigation');	
			// Handle file upload only if litigation is 'yes'
			if ($litigation === 'yes' && isset($_FILES['ye_declaration_img']) && $_FILES['ye_declaration_img']['error'] === UPLOAD_ERR_OK) 
			{
				$path="uploads/case_files/";
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				
				if(!empty($_FILES['ye_declaration_img']['name']))
				{
					$result = $this->functions->file_insert($path, 'ye_declaration_img', 'image', '9097152');
					if($result['status'] == 1){
						$data['ye_declaration_img'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('alert-type', 'error');
						$this->session->set_flashdata('alert', 'File did not uploaded');
						redirect(base_url('user/applicationform'), 'refresh');
					}
				}
			}
			
			$data['ye_declaration'] = $litigation;
			$data['ye_updated_at']  = date('Y-m-d H:i:s');		
			
			$result = $this->user_applicationform_model->update_young_applicant($userid, $data);
			
			if ($result) 
			{ 
				  // Retrieve qulaification rows data
				  $this->db->delete('tbl_qualification', array('qual_userid' => $userid));
				  
				  $qual_deg_name = $this->input->post('qual_deg_name');
				  $qual_user_type = $this->input->post('qual_user_type');
				  $qual_institution = $this->input->post('qual_institution');
				  $qual_deg_type = $this->input->post('qual_deg_type');
				  $qual_percentage = $this->input->post('qual_percentage');
				  $qual_from = $this->input->post('qual_from');
				  $qual_to = $this->input->post('qual_to');
					// Process each row
				  for ($i = 0; $i < count($qual_deg_name); $i++) 
				  {
						$data_yep = array(
							'qual_userid' => $this->session->userdata['logged']['id'],
							'qual_deg_name' => $qual_deg_name[$i],
							'qual_user_type' => $qual_user_type[$i],
							'qual_institution' => $qual_institution[$i],
							'qual_deg_type' => $qual_deg_type[$i],
							'qual_percentage' => $qual_percentage[$i],
							'qual_from' => $qual_from[$i],
							'qual_to' => $qual_to[$i],
						);
						$this->user_applicationform_model->add_ind_multipleinfo('tbl_qualification',$data_yep);
				  }
				  
				  // Retrieve Experience rows data
				  $this->db->delete('tbl_experience', array('exp_userid' => $userid));
				  
				  $exp_type = $this->input->post('exp_type');
				  $exp_employer = $this->input->post('exp_employer');
				  $exp_designation = $this->input->post('exp_designation');
				  $exp_from = $this->input->post('exp_from');
				  $exp_to = $this->input->post('exp_to');
				  $exp_year = $this->input->post('exp_year');
					// Process each row
				  for ($i = 0; $i < count($exp_employer); $i++) 
				  {
						$data_indexp = array(
							'exp_userid' => $this->session->userdata['logged']['id'],
							'exp_type' => $exp_type[$i],
							'exp_employer' => $exp_employer[$i],
							'exp_designation' => $exp_designation[$i],
							'exp_from' => $exp_from[$i],
							'exp_to' => $exp_to[$i],
							'exp_year' => $exp_year[$i],
						);
						$this->user_applicationform_model->add_ind_multipleinfo('tbl_experience',$data_indexp);
				  }		
				
				$this->session->set_flashdata('alert-type', 'success');
				$this->session->set_flashdata('alert', 'Young Entrepreneur Application Form updated successfully');
				
				echo json_encode(['status' => 'success', 'insert_id' => $insert_id]);
				redirect('user/applicationform/applicationpreview');
			} 
			else 
			{
				$this->session->set_flashdata('alert-type', 'error');
				$this->session->set_flashdata('alert', 'Failed to update Application Form');
				redirect('user/applicationform/edit');
			}
		}
		else
		{
			$this->page_data['page']->title = 'Edit Young Entrepreneur Application Form';		
			$this->page_data['page']->menu = 'applicationpreview';
			
			$this->page_data['districts'] = $this->user_applicationform_model->get_districts();
			$ye_userid = $this->session->logged['id'];
			$this->page_data['data_young_ent'] = $this->user_applicationform_model->get_form_info_by_id('tbl_user_young_ent', ['ye_userid' => $ye_userid]);
			
			$this->page_data['tehsils'] = $this->user_applicationform_model->get_tehsil_by_district($this->page_data['data_young_ent']['ye_lead_districtid']);
			
			$this->page_data['school'] = $this->user_applicationform_model->get_school_info($this->page_data['data_young_ent']['ye_school_1']);
			$schoolinfo = $this->user_applicationform_model->get_school_info($this->page_data['data_young_ent']['ye_school_1']);
			if($schoolinfo)
			{
				$this->page_data['schooltehsils'] = $this->user_applicationform_model->get_tehsil_by_district($schoolinfo['school_district_id']);
				$this->page_data['schools'] = $this->user_applicationform_model->get_schools_by_tehsilid($schoolinfo['school_tehsil_id']);
			}
			else
			{
				$this->page_data['schooltehsils'] = array();
				$this->page_data['schools'] = array();
			}
				
			$this->page_data['qulaifications'] = $this->user_applicationform_model->get_qualification_userid($userid);
			$this->page_data['experiences'] = $this->user_applicationform_model->get_experience_userid($userid);
			
			$this->load->view('user/applicationform/young_entrepreneur_application_edit', $this->page_data);
		}
	}

	public function select_school()
	{	
		$ye_userid = $this->session->logged['id'];
		$this->page_data['page']->menu = 'select_school';
		$this->page_data['data_young_ent'] = $this->user_applicationform_model->get_by_id('tbl_user_young_ent', ['ye_userid' => $ye_userid]);	
		$this->page_data['districts'] = $this->user_applicationform_model->get_districts();
		$this->load->view('user/applicationform/select_school_yep', $this->page_data);
	}
	
	public function teh_by_district()
	{
		$id=0;
		if($this->input->post('ye_lead_districtid')){
			$id = $this->input->post('ye_lead_districtid');
		}elseif($this->input->post('ye_s1_districtid')){
			$id = $this->input->post('ye_s1_districtid');
		}elseif($this->input->post('ye_s2_districtid')){
			$id = $this->input->post('ye_s2_districtid');
		}elseif($this->input->post('school_district_id')){
			$id = $this->input->post('school_district_id');
		}
		echo json_encode($this->user_applicationform_model->get_tehsil_by_district($id));
	}
	
	public function school_by_tehsil()
	{
		$tehsil_id = $this->input->post('tehsil_id');
		//$schools = $this->db->get_where('schools', ['school_tehsil_id' => $tehsil_id])->result();
		$schools = $this->user_applicationform_model->get_schools_by_tehsilid($tehsil_id);
		echo json_encode($schools);
	}
	
	public function save_school()
	{
		$selected_schools = json_decode($this->input->post('selected_schools', true), true);
		if (is_array($selected_schools) && count($selected_schools) > 3) {
			$this->session->set_flashdata('error', 'You can only select up to 3 schools.');
			redirect('user/applicationform');
		}
		$data = [
			'ye_school_1' => isset($selected_schools[0]) ? $selected_schools[0] : null,
			'ye_school_2' => isset($selected_schools[1]) ? $selected_schools[1] : null,
			'ye_school_3' => isset($selected_schools[2]) ? $selected_schools[2] : null,
		];
		$ye_userid = $this->session->logged['id'];
		$update = $this->user_applicationform_model->update_school_save($ye_userid, $data);
		$this->session->set_flashdata('message', 'Schools nominated successfully.');
		$this->session->set_flashdata('message_type', 'success');
		redirect('user/applicationform/select_school');
	}
	
	public function generate_challan()
	{		
		 $this->page_data['page']->menu = 'generate_challan';
		 $ye_userid = $this->session->logged['id'];	
		 $this->page_data['data_yep'] = $this->user_applicationform_model->get_by_id_with_joins($ye_userid);
		 $html =  $this->load->view('user/applicationform/generate_challan_yep', $this->page_data, true);
		
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
	
	public function applicationpreview()
	{	
		 $this->page_data['page']->title = 'Application Preview';		
		 $this->page_data['page']->menu = 'applicationpreview';
		 
		 $ye_userid = $this->session->logged['id'];	
		 $this->page_data['data_yep'] = $this->user_applicationform_model->get_app_preview_userid($ye_userid);
		 $this->page_data['qulaifications'] = $this->user_applicationform_model->get_qualification_userid($ye_userid);
		 $this->page_data['experiences'] = $this->user_applicationform_model->get_experience_userid($ye_userid);
		 
		 $this->load->view('user/applicationform/application_preview', $this->page_data);
	}
	
	public function finalsubmission() 
	{
		$data = [
			'ye_final_submit' => 1
		];
		$userid = $this->session->logged['id'];
		$update = $this->user_applicationform_model->update_final_submission($userid, $data);
		
		if($update)
		{
			$this->session->set_flashdata('alert-type', 'success');
			$this->session->set_flashdata('alert', 'Application Final Submit done successfully!');
			redirect('user/applicationform/applicationpreview');
		}
		else
		{
			$this->session->set_flashdata('alert-type', 'error');
			$this->session->set_flashdata('alert', 'Application Final Submit not submitted!');
			redirect('user/applicationform/applicationpreview');
		}
	}
}