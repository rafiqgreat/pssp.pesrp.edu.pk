<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationformind_model extends MY_Model {
	

	public $table_ye = 'tbl_user_young_ent';

	public function get_districts() 
	{
		$query = $this->db->select('*')
						  ->from('districts') // Ensure the correct table name is used
						  ->get();
		return $query->result();
	}
	
	public function get_tehsil_by_district($id){
		$this->db->select('*')
				 ->from('tehsils')
				 ->where('tehsil_district_id', $id)
				 ->where('tehsil_status', 1);					 
		$query = $this->db->get();			
		return $result = $query->result_array();	
		//die($this->db->last_query());		
	}
	

	public function insert_ind_applicant($data)
	{
		$this->db->insert('tbl_user_indiv', $data);
		return $this->db->insert_id(); // returns the inserted record ID
	}
	
	public function add_ind_multipleinfo($tblname,$data)
	{
		$this->db->insert($tblname, $data);
		return $this->db->insert_id();
	}
	
	public function update_support_applicant($ye_id, $data)
	{
		$this->db->where('ye_id', $ye_id);
		return $this->db->update('tbl_user_young_ent', $data);
	}
	
	public function save_declaration($ye_id, $data)
	{
		$this->db->where('ye_id', $ye_id);
		$this->db->update('tbl_user_young_ent', $data);
		die($this->db->last_query());
	}
	
	public function save_qualification($data)
    {
        $this->db->insert('tbl_qualification', $data);
        return $this->db->insert_id(); // returns the inserted record ID
    }
	
	public function save_experience($data)
    {
        $this->db->insert('tbl_experience', $data);
        return $this->db->insert_id(); // returns the inserted record ID
    }

	public function update_school_save($ind_userid, $data)
	{
		$this->db->where('ind_userid', $ind_userid);
		return $this->db->update('tbl_user_indiv', $data);
		//die($this->db->last_query());
	}
	
	public function get_by_id($id) {
		$query = $this->db->get_where('tbl_user_indiv', ['ind_userid' => $id]);
		return $query->row_array(); // use row() if you prefer an object
	}
	
	public function get_by_id_with_joins($id)
	{
		$this->db->select('
			indiv.*,
			d.district_name_en as district_name,
			t.tehsil_name_en as tehsil_name,
			s1.school_name as school_1_name,
			s2.school_name as school_2_name,
			s3.school_name as school_3_name
		');
		$this->db->from('tbl_user_indiv as indiv');
	
		// District
		$this->db->join('districts d', 'd.district_id = indiv.ind_districtid', 'left');
	
		// Tehsil
		$this->db->join('tehsils t', 't.tehsil_id = indiv.ind_tehsilid', 'left');
	
		// Schools
		$this->db->join('schools s1', 's1.school_id = indiv.ind_school_1', 'left');
		$this->db->join('schools s2', 's2.school_id = indiv.ind_school_2', 'left');
		$this->db->join('schools s3', 's3.school_id = indiv.ind_school_3', 'left');
	
		$this->db->where('indiv.ind_userid', $id);
	
		$query = $this->db->get();
		return $query->row_array();
	}


}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */