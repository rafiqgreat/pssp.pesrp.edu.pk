<?php defined('BASEPATH') OR exit('No direct script access allowed');
class School extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'School Management';
		$this->page_data['page']->menu = 'school';
		$this->load->library('functions');
		$this->load->library('PHPExcel');
        require_once APPPATH . 'libraries/PHPExcel/IOFactory.php';
	}

	public function index()
	{
		ifPermissions('school_list');
		$this->page_data['schools'] = $this->school_model->get_all_school();
		$this->load->view('school/list', $this->page_data);
	}

	public function add()
	{
		ifPermissions('school_add');
		$this->page_data['page']->submenu = 'add';
		$this->page_data['states'] = $this->location_model->get_states();
		$this->page_data['schoolchains'] = $this->school_model->get_schoolchains();
		$this->load->view('school/add', $this->page_data);
	}
	
	public function save()
	{
		ifPermissions('school_add');
		postAllowed();
	
		$id = $this->school_model->create(array(
			'school_name' => post('school_name'),
			'username' => post('username'),
			'password' => hash("sha256", post('password')),
			'school_department' => post('school_department'),
			'school_type' => post('school_type'),
			'school_state_id' => post('school_state_id'),
			'school_district_id' => post('school_district_id'),
			'school_tehsil_id' => post('school_tehsil_id'),
			'school_address' => post('school_address'),
			'school_uc' => post('school_uc'),
			'school_uc_name' => post('school_uc_name'),
			'school_level' => post('school_level'),
			'school_gender' => post('school_gender'),
			'school_email' => post('school_email'),
			'school_phone' => post('school_phone'),
			'school_contact_name' => post('school_contact_name'),
			'school_contact_mobile' => post('school_contact_mobile'),
			'school_createdby' => logged('id'),
			'school_status' => 1,
			'school_is_verify' => 1,
			'school_chain_id' => post('school_chain_id'),
		), 'schools');

		if (!empty($_FILES['school_logo']['name'])) {
			$path = $_FILES['school_logo']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$this->uploadlib->initialize([
				'file_name' => $id . '.' . $ext
			]);
			$image = $this->uploadlib->uploadImage('school_logo', '/schools');
	
			if ($image['status']) {
				$this->schools_model->update($id, ['img_type' => $ext]);
			} else {
				copy(FCPATH . 'uploads/schools/default.png', 'uploads/schools/' . $id . '.png');
			}
		} else {
			copy(FCPATH . 'uploads/schools/default.png', 'uploads/schools/' . $id . '.png');
		}
	
		$this->activity_model->add('New School $' . $id . ' Created by User:' . logged('name'), logged('id'));
	
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New School Created Successfully');
		
		redirect('school');
	}


	public function view($id)
	{

		ifPermissions('users_view');

		$this->page_data['User'] = $this->users_model->getById($id);
		$this->page_data['User']->role = $this->roles_model->getByWhere([
			'id'=> $this->page_data['User']->role
		])[0];
		$this->page_data['User']->activity = $this->activity_model->getByWhere([
			'user'=> $id
		], [ 'order' => ['id', 'desc'] ]);
		$this->load->view('users/view', $this->page_data);

	}

	public function edit($id)
	{
		ifPermissions('school_edit');
		$this->page_data['states'] = $this->location_model->get_states();
		$this->page_data['districts'] = $this->location_model->get_districts();
		$this->page_data['tehsils'] = $this->location_model->get_tehsils();
		$this->page_data['tehsils'] = $this->location_model->get_tehsils();
		$this->page_data['schoolchain'] = $this->schoolchain_model->get();
		$this->page_data['school'] = $this->school_model->getById($id, 'schools', 'school_id');
		$this->load->view('school/edit', $this->page_data);
	}


	public function school_update($id)
	{
		ifPermissions('school_edit');
		postAllowed();
	
		// Fetch the existing school record
		$data = array(
			'school_name' => post('school_name'),
			'username' => post('username'),
			'school_department' => post('school_department'),
			'school_type' => post('school_type'),
			'school_state_id' => post('school_state_id'),
			'school_district_id' => post('school_district_id'),
			'school_tehsil_id' => post('school_tehsil_id'),
			'school_address' => post('school_address'),
			'school_uc' => post('school_uc'),
			'school_uc_name' => post('school_uc_name'),
			'school_level' => post('school_level'),
			'school_gender' => post('school_gender'),
			'school_email' => post('school_email'),
			'school_phone' => post('school_phone'),
			'school_contact_name' => post('school_contact_name'),
			'school_contact_mobile' => post('school_contact_mobile'),
			'school_chain_id' => post('school_chain_id'),
		);
	
		// If a new password is provided, update it
		if (!empty(post('password'))) {
			$data['password'] = hash("sha256", post('password'));
		}
	
		$this->school_model->update($id, $data, 'schools', 'school_id');
	
		// Handle file upload for school logo
		if (!empty($_FILES['school_logo']['name'])) {
			$path = $_FILES['school_logo']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$this->uploadlib->initialize([
				'file_name' => $id . '.' . $ext
			]);
			$image = $this->uploadlib->uploadImage('school_logo', '/schools');
	
			if ($image['status']) {
				$this->school_model->update($id, ['school_logo' => 'uploads/schools/' . $id . '.' . $ext]);
			}
		}
	
		$this->activity_model->add('School $' . $id . ' Updated by User:' . logged('name'), logged('id'));
	
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'School Updated Successfully');
	
		redirect('school');
	}


	public function delete($id)
	{
		ifPermissions('school_delete');
		$id = $this->school_model->delete($id, 'schools', 'school_id');
		$this->activity_model->add("School #$id Deleted by User:".logged('name'));
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'School has been Deleted Successfully');
		redirect('school');
	}

	public function change_status($id)
	{
		$this->users_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
		echo 'done';
	}
	
	public function distirct_by_state(){
		echo json_encode($this->location_model->get_distirct_by_state($this->input->post('state_id')));
	}
	
	public function tehsil_by_district(){
		echo json_encode($this->location_model->get_tehsil_by_district($this->input->post('district_id')));
	}
	
	public function import()
	{
		if($this->input->post('submit'))
		{

			if(empty($_FILES['import_file']['name']))
			{
				die('if');
					$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('alert-type', 'error');
				$this->session->set_flashdata('alert', 'File does not exist');
				redirect(base_url('school/import'),'refresh');
			}
			else
			{
				
				$import_file = $this->input->post('import_file');
				$path="assets/schools/";
				$config['allowed_types'] = 'xlsx|csv|xls';
				
				if(!empty($_FILES['import_file']['name']))
				{
					$result = $this->functions->file_insert($path, 'import_file', 'excel', '9097152');
					if($result['status'] == 1){
						$data['import_file'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('alert-type', 'error');
						$this->session->set_flashdata('alert', 'File did not uploaded');
						redirect(base_url('school/import'), 'refresh');
					}
				}
/////////////////////////////////////////////////////////////----------------------------------------------------------------
				//$fileLoading = PHPExcel_IOFactory::load($data['import_file']);
				//$fileLoading->setActiveSheetIndex(0);
				
				//$objPHPExcel  = new PHPExcel();
//    			$objPHPExcel ->setActiveSheetIndex(0);
//    			$objPHPExcel ->getActiveSheet();
				$input_file_type = PHPExcel_IOFactory::identify($data['import_file']);
            	
				$obj_reader = PHPExcel_IOFactory::createReader($input_file_type);
				
            	$fileLoading = $obj_reader->load($data['import_file']);
				
				$fileLoading->getActiveSheet();
				
        		//$highest_row = $sheet->getHighestRow();
			
				//print_r($fileLoading->getActiveSheet());
				//die();
				$startIndex = 2;
				$username = array();
				$username_ctr = 0;
				$passwprd = array();
				$sch_name = array();
				$sch_address =array();
				
				$fun_numb = ''; $username_en = ''; $password_en = ''; $school_name = ''; $school_address = '';
				$insertedid_nun_numb = 0;
				
				while( $fileLoading->getActiveSheet()->getCell('A'.$startIndex)->getValue() != '' /*|| $startIndex < 1000*/  )
				{
					$nun_numb = ($fileLoading->getActiveSheet()->getCell('A'.$startIndex)->getValue() && $fileLoading->getActiveSheet()->getCell('A'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('A'.$startIndex)->getValue():'';
					
					$username_en = ($fileLoading->getActiveSheet()->getCell('B'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('B'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('B'.$startIndex)->getValue():'';
					
					$password_en = password_hash( $username_en, PASSWORD_BCRYPT );
					
					$school_name = ($fileLoading->getActiveSheet()->getCell('C'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('C'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('C'.$startIndex)->getValue():'';
					
					$school_address = ($fileLoading->getActiveSheet()->getCell('D'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('D'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('D'.$startIndex)->getValue():'';
										
					$exists = $this->school_model->username_exist( $username_en );
					if($exists){
						$fun_numb = $nun_numb;
						$startIndex++;
						//continue;
					}
					else{
					if($fun_numb != $nun_numb){
							$sql = 'INSERT INTO schools (username, password, school_name, school_address, school_status, school_createdby) VALUES ("'.$username_en.'","'.$password_en.'","'.$school_name.'","'.$school_address.'","1","'.logged('id').'")';
							$result = $this->db->query($sql);
							//die($this->db->last_query());
							//$insertedid_ncs_numb = $this->db->insert_id(); // last inserted id
						}
						$fun_numb = $nun_numb;
						$startIndex++;	
					}
				}
				if($fun_numb == $nun_numb)
				{
					$this->session->set_flashdata('alert-type', 'success');
					$this->session->set_flashdata('alert', 'File imported Successfully');
					redirect(base_url('school/import'));
				}
			}
		}
		else
		{	
			ifPermissions('school_import');
			$this->page_data['page']->submenu = 'import';
			$this->load->view('school/import', $this->page_data);
		}
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */