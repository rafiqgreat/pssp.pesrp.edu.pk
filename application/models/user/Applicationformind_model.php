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
	
	public function update_school_save($ind_userid, $data)
	{
		$this->db->where('ind_userid', $ind_userid);
		return $this->db->update('tbl_user_indiv', $data);
		//die($this->db->last_query());
	}
	
	public function update_ind_applicant($ind_userid, $data)
	{
		$this->db->where('ind_userid', $ind_userid);
		$this->db->update('tbl_user_indiv', $data);
		return true;
		//die($this->db->last_query());
	}
	
	public function update_final_submission($ind_userid, $data)
	{
		$this->db->where('ind_userid', $ind_userid);
		return $this->db->update('tbl_user_indiv', $data);
		//die($this->db->last_query());
	}
	
	public function get_by_id($id) {
		$query = $this->db->get_where('tbl_user_indiv', ['ind_userid' => $id]);
		return $query->row_array(); // use row() if you prefer an object
	}
	
	public function get_school_info($id) {
		$query = $this->db->get_where('schools', ['school_id' => $id]);
		return $query->row_array(); // use row() if you prefer an object
	}
	
	public function get_by_id_with_joins($id)
	{
		$this->db->select('
			indiv.*,
			d.district_name_en as district_name,
			t.tehsil_name_en as tehsil_name,
			s1.school_name as school_1_name,
			s1.username as school_1_username,
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
	
	public function get_schools_by_tehsilid($id) {
		$this->db->select('*');
		$this->db->from('schools');
		$this->db->join('tehsils', 'schools.school_tehsil_id = tehsils.tehsil_id', 'left');
		$this->db->join('districts', 'schools.school_district_id = districts.district_id', 'left');
		$this->db->where('school_tehsil_id', $id);
		$query = $this->db->get();
		return $query->result();
		//die($this->db->last_query());
	}
	
	public function get_app_preview_userid($id)
	{
		
		$this->db->select('
			indiv.*,
			d.district_name_en as district_name,
			t.tehsil_name_en as tehsil_name,
			dd.district_name_en as dom_district_name,
			
			s1.school_name as school_1_name,
			s2.school_name as school_2_name,
			s3.school_name as school_3_name
		');
		$this->db->from('tbl_user_indiv as indiv');
	
		// District
		$this->db->join('districts d', 'd.district_id = indiv.ind_districtid', 'left');
		// Tehsil
		$this->db->join('tehsils t', 't.tehsil_id = indiv.ind_tehsilid', 'left');
		// District domicile
		$this->db->join('districts dd', 'dd.district_id = indiv.ind_dom_disid', 'left');
	
		// Schools
		$this->db->join('schools s1', 's1.school_id = indiv.ind_school_1', 'left');
		$this->db->join('schools s2', 's2.school_id = indiv.ind_school_2', 'left');
		$this->db->join('schools s3', 's3.school_id = indiv.ind_school_3', 'left');
	
		$this->db->where('indiv.ind_userid', $id);
	
		$query = $this->db->get();
		return $query->row_array();
	
		$this->db->select('
			yep.*,
			d.district_name_en as district_name,
			t.tehsil_name_en as tehsil_name,
			dd.district_name_en as dom_district_name,
			
			ds1.district_name_en as s1district_name,
			ts1.tehsil_name_en as s1tehsil_name,
			dds1.district_name_en as s1dom_district_name,
			
			ds2.district_name_en as s2district_name,
			ts2.tehsil_name_en as s2tehsil_name,
			dds2.district_name_en as s2dom_district_name,
			
			s1.school_name as school_1_name,
			s2.school_name as school_2_name,
			s3.school_name as school_3_name
		');
		$this->db->from('tbl_user_young_ent as yep');
	
		// District
		$this->db->join('districts d', 'd.district_id = yep.ye_lead_districtid', 'left');
		$this->db->join('districts ds1', 'ds1.district_id = yep.ye_s1_districtid', 'left');
		$this->db->join('districts ds2', 'ds2.district_id = yep.ye_s2_districtid', 'left');
	
		// Tehsil
		$this->db->join('tehsils t', 't.tehsil_id = yep.ye_lead_tehsilid', 'left');
		$this->db->join('tehsils ts1', 'ts1.tehsil_id = yep.ye_s1_tehsilid', 'left');
		$this->db->join('tehsils ts2', 'ts2.tehsil_id = yep.ye_s2_tehsilid', 'left');
		
		// District domicile
		$this->db->join('districts dd', 'dd.district_id = yep.ye_lead_dom_disid', 'left');
		$this->db->join('districts dds1', 'dds1.district_id = yep.ye_s1_dom_disid', 'left');
		$this->db->join('districts dds2', 'dds2.district_id = yep.ye_s2_dom_disid', 'left');
	
		// Schools
		$this->db->join('schools s1', 's1.school_id = yep.ye_school_1', 'left');
		$this->db->join('schools s2', 's2.school_id = yep.ye_school_2', 'left');
		$this->db->join('schools s3', 's3.school_id = yep.ye_school_3', 'left');
	
		$this->db->where('yep.ye_userid', $id);
	
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function get_qualification_userid($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_qualification_ind');	
		$this->db->where('qi_userid', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_experience_userid($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_experience_ind');	
		$this->db->where('ei_userid', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_schooldetail_id($schoolids) {
		$this->db->select('*');
		$this->db->from('schools');
		$this->db->join('tehsils', 'schools.school_tehsil_id = tehsils.tehsil_id', 'left');
		$this->db->join('districts', 'schools.school_district_id = districts.district_id', 'left');
		$this->db->where_in('school_id', $schoolids);
		$query = $this->db->get();
		return $query->result_array();
		//die($this->db->last_query());
	}
}