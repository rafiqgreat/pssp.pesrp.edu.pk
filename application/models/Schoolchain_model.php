<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolchain_model extends MY_Model {

	public $table = 'school_chain';

	public function __construct()
	{
		parent::__construct();
	}
	
	/*public function get_all_school() 
	{
		$query = $this->db->select('schools.*, states.state_name_en, districts.district_name_en, tehsils.tehsil_name_en')
                  ->from('schools')
				  ->join('states', 'states.state_id = schools.school_state_id', 'left')
				  ->join('districts', 'districts.district_id = schools.school_district_id', 'left')
				  ->join('tehsils', 'tehsils.tehsil_id = schools.school_tehsil_id', 'left')
                  ->get();
		return $query->result();
		//die($this->db->last_query());
    }*/
	
	public function get_schoolchains() 
	{
		$query = $this->db->select('*')
                  ->from('school_chain')
				  ->where('schoolchain_status', 1)	
                  ->get();
		return $query->result();
    }
	
	public function get_schoolchain_edit($id) 
	{
		$query = $this->db->select('*')
                  ->from('school_chain')
				  ->where('schoolchain_id', $id)	
                  ->get();
		return $query->result();
    }
	
	public function update_schoolchain($id, $data)
	{
		$this->db->where('schoolchain_id', $id);
		$this->db->update($this->table, $data);
		return $id;
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */