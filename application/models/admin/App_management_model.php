<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_management_model extends MY_Model {

	//public $table1 = 'states';
	//public $table3 = 'tehsils';

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_young_ent_list() 
	{
		$query = $this->db->select('*')
                  ->from('tbl_user_young_ent')
				  ->join('districts', 'tbl_user_young_ent.ye_lead_districtid = districts.district_id', 'left')
				  ->join('tehsils', 'tbl_user_young_ent.ye_lead_tehsilid = tehsils.tehsil_id', 'left')
                  ->get();
		return $query->result();
		//die($this->db->last_query());
    }
	
	public function get_indiv_list() 
	{
		$query = $this->db->select('*')
                  ->from('tbl_user_indiv')
				  ->join('districts', 'tbl_user_indiv.ind_districtid = districts.district_id', 'left')
				  ->join('tehsils', 'tbl_user_indiv.ind_tehsilid = tehsils.tehsil_id', 'left')
                  ->get();
		return $query->result();
		//die($this->db->last_query());
    }
	
	public function get_edu_tech_list() 
	{
		$query = $this->db->select('*')
                  ->from('tbl_user_edu_tech')
				  ->join('districts', 'tbl_user_edu_tech.edu_tech_districtid = districts.district_id', 'left')
				  ->join('tehsils', 'tbl_user_edu_tech.edu_tech_tehsilid = tehsils.tehsil_id', 'left')
                  ->get();
		return $query->result();
		//die($this->db->last_query());
    }
	
	public function get_edu_chain_list() 
	{
		$query = $this->db->select('*')
                  ->from('tbl_user_edu_chain')
				  ->join('districts', 'tbl_user_edu_chain.edu_chain_districtid = districts.district_id', 'left')
				  ->join('tehsils', 'tbl_user_edu_chain.edu_chain_tehsilid = tehsils.tehsil_id', 'left')
                  ->get();
		return $query->result();
		//die($this->db->last_query());
    }
	
	public function get_ngos_list() 
	{
		$query = $this->db->select('*')
                  ->from('tbl_user_ngos')
				  ->join('districts', 'ngos.ngo_districtid = districts.district_id', 'left')
				  ->join('tehsils', 'ngos.ngo_tehsilid = tehsils.tehsil_id', 'left')
                  ->get();
		return $query->result();
		//die($this->db->last_query());
    }
	
	public function get_app_preview_userid($id)
	{
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
		//die($this->db->last_query());
	}
	
	public function get_qualification_userid($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_qualification');	
		$this->db->where('qual_userid', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_experience_userid($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_experience');	
		$this->db->where('exp_userid', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
//==================================================================================================
	
	public function get_districts() 
	{
		$query = $this->db->select('districts.*, states.state_name_en')
						  ->from('districts') // Ensure the correct table name is used
						  ->join('states', 'states.state_id = districts.district_state_id', 'left')
						  ->get();
		return $query->result();
	}

	
	public function get_tehsils() 
	{
		$query = $this->db->select('tehsils.*, districts.district_name_en, states.state_name_en')
                  ->from('tehsils')
				  ->join('districts', 'districts.district_id = tehsils.tehsil_district_id', 'left')
				  ->join('states', 'states.state_id = tehsils.tehsil_state_id', 'left')
                  ->get();
		return $query->result();
    }
	
	public function update_state($id, $data)
	{
		$this->db->where('state_id', $id);
		$this->db->update('states', $data);
		return $id;
	}
	
	public function update_district($id, $data)
	{
		$this->db->where('district_id', $id);
		$this->db->update('districts', $data);
		return $id;
	}
	
	public function update_tehsil($id, $data)
	{
		$this->db->where('tehsil_id', $id);
		$this->db->update('tehsils', $data);
		return $id;
	}
	
	public function get_distirct_by_state($id){
		$this->db->select('*')
				 ->from('districts')
				 ->where('district_state_id', $id)
				 ->where('district_status', 1);					 
		$query = $this->db->get();			
		return $result = $query->result_array();			
	}
	
	public function get_tehsil_by_district($id){
		$this->db->select('*')
				 ->from('tehsils')
				 ->where('tehsil_district_id', $id)
				 ->where('tehsil_status', 1);					 
		$query = $this->db->get();			
		return $result = $query->result_array();			
	}

}

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */