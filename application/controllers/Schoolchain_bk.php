<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Schoolchain extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Schoolchain_model', 'Schoolchain_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Schoolchain List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/schoolchain/schoolchain_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->Schoolchain_model->get_all_schoolchain();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['schoolchain_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['schoolchain_code'],
				$row['schoolchain_name_en'],				
				'<span class="urdufont-right">'.$row['schoolchain_name_ur'].'</span>',
				$row['schoolchain_sort'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['schoolchain_id'].'" 
				id="cb_'.$row['schoolchain_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['schoolchain_id'].'"></label>',		
				'<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/schoolchain/edit/'.$row['schoolchain_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/schoolchain/delete/".$row['schoolchain_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Schoolchain_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('schoolchain_code', 'School Chain Code', 'trim|required');
			$this->form_validation->set_rules('schoolchain_name_en', 'School Chain Name (English)', 'trim|required');
			$this->form_validation->set_rules('schoolchain_name_ur', 'School Chain Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('schoolchain_sort', 'School Chain Sort', 'trim|required');
			$this->form_validation->set_rules('schoolchain_status', 'School Chain Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/schoolchain/add'),'refresh');
			}
			else{
				$data = array(
					'schoolchain_code' => $this->input->post('schoolchain_code'),
					'schoolchain_name_en' => $this->input->post('schoolchain_name_en'),
					'schoolchain_name_ur' => $this->input->post('schoolchain_name_ur'),
					'schoolchain_sort' => $this->input->post('schoolchain_sort'),
					'schoolchain_createdby' =>$this->session->userdata('admin_id'),
					'schoolchain_status' => $this->input->post('schoolchain_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Schoolchain_model->add_schoolchain($data);
				if($result){
					$this->session->set_flashdata('success', 'School Chain has been added successfully!');
					redirect(base_url('admin/schoolchain'));
				}
			}
		}
		else{
			$data['title'] = 'Add School Chain';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/schoolchain/schoolchain_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('schoolchain_code', 'School Chain Code', 'trim|required');
			$this->form_validation->set_rules('schoolchain_name_en', 'School Chain Name (English)', 'trim|required');
			$this->form_validation->set_rules('schoolchain_name_ur', 'School Chain Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('schoolchain_sort', 'School Chain Sort', 'trim|required');
			$this->form_validation->set_rules('schoolchain_status', 'School Chain Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['schoolchain'] = $this->Schoolchain_model->get_schoolchain_by_id($id);
				$data['view'] = 'admin/schoolchain/schoolchain_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'schoolchain_code' => $this->input->post('schoolchain_code'),
					'schoolchain_name_en' => $this->input->post('schoolchain_name_en'),
					'schoolchain_name_ur' => $this->input->post('schoolchain_name_ur'),
					'schoolchain_sort' => $this->input->post('schoolchain_sort'),
					'schoolchain_createdby' =>$this->session->userdata('admin_id'),
					'schoolchain_status' => $this->input->post('schoolchain_status'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Schoolchain_model->edit_schoolchain($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'School Chain has been updated successfully!');
					redirect(base_url('admin/schoolchain'));
				}
			}
		}
		else{
			//die('Edit here');
			$data['title'] = 'Edit School Chain';
			$data['schoolchain'] = $this->Schoolchain_model->get_schoolchain_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/schoolchain/schoolchain_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_school_chain', array('schoolchain_id' => $id));
		$this->session->set_flashdata('success', 'School Chain has been deleted successfully!');
		redirect(base_url('admin/schoolchain'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_schoolchain_pdf(){
		$data['all_schoolchain'] = $this->Schoolchain_model->get_schoolchain_for_export();
		$this->load->view('admin/schoolchain/schoolchain_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_schoolchain_csv(){ 
	   // file name 
		$filename = 'schoolchain_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 		
		header('Content-Type: text/csv; charset=UTF-8');
	   // get data 
		$schoolchain_data = $this->Schoolchain_model->get_schoolchain_csv_export();
		
	   // file creation 
		$file = fopen('php://output', 'w');
		//fputs($file, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
		$header = array("Code", "School Chain Name", "سکول چین", "Sort", "Status"); 
		fputcsv($file, $header);
		foreach ($schoolchain_data as $key=>$line){ 		
			//$line = array_map("utf8_decode", $line);
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}	?>