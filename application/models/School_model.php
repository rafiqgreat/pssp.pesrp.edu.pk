<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends MY_Model {

	public $table = 'schools';

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_school() 
	{
		$query = $this->db->select('schools.*, states.state_name_en, districts.district_name_en, tehsils.tehsil_name_en')
                  ->from('schools')
				  ->join('states', 'states.state_id = schools.school_state_id', 'left')
				  ->join('districts', 'districts.district_id = schools.school_district_id', 'left')
				  ->join('tehsils', 'tehsils.tehsil_id = schools.school_tehsil_id', 'left')
                  ->get();
		return $query->result();
		//die($this->db->last_query());
    }
	
	public function get_schoolchains() 
	{
		$query = $this->db->select('*')
                  ->from('school_chain')
				  ->where('schoolchain_status', 1)	
                  ->get();
		return $query->result();
    }
	
	public function username_exist( $username ) {
		$this->db->select( '*' );
		$this->db->from( 'schools' );
		$this->db->where( 'username', $username );
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function file_insert($path, $file_key, $type, $size_limit) {
        // Check if the path is valid
        if (!is_dir($path)) {
            //return "Error: Directory does not exist.";
			return 0;
        }

        // Check if the file is uploaded
        if (!isset($_FILES[$file_key])) {
            //return "Error: No file uploaded.";
			return 0;
        }

        $file = $_FILES[$file_key];

        // Validate file size
        if ($file['size'] > $size_limit) {
            //return "Error: File size exceeds the limit.";
			return 0;
        }

        // Validate file type (assuming Excel file validation)
        $allowed_types = ['xls', 'xlsx', 'csv'];
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        if (!in_array($file_ext, $allowed_types)) {
            //return "Error: Invalid file type.";
			return 0;
        }

        // Move the uploaded file to the specified path
        $destination = $path . '/' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            //return "File uploaded successfully to " . $destination;
			return 1;
        } else {
            //return "Error: File upload failed.";
			return 0;
        }
    }

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */