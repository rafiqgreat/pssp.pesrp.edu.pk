<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationform_model extends MY_Model {
	

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
	

	public function insert_lead_applicant($data)
    {
        $this->db->insert('tbl_user_young_ent', $data);
        return $this->db->insert_id(); // returns the inserted record ID
    }
	
	public function update_support_applicant($ye_id, $data)
	{
		$this->db->where('ye_id', $ye_id);
		return $this->db->update('tbl_user_young_ent', $data);
	}
	
	public function update_school_save($ye_userid, $data)
	{
		$this->db->where('ye_userid', $ye_userid);
		return $this->db->update('tbl_user_young_ent', $data);
	}
	
	public function save_declaration($ye_userid, $data)
	{
		$this->db->where('ye_userid', $ye_userid);
		return $this->db->update('tbl_user_young_ent', $data);
		//die($this->db->last_query());
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



}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */