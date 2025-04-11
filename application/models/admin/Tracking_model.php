<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking_model extends MY_Model {

	public $table = 'tracking';

	public function __construct()
	{
		parent::__construct();
	}
    
    public function get_by_id($id) 
	 {
		$query = $this->db->select('*, roles.id, roles.title')
                  ->from($this->table)
                  ->join('users', 'users.id = tracking.tr_userid', 'left')
						->join('roles', 'roles.id = users.role', 'left')
						->join('tracking_centers', 'tracking_centers.cbarcode = tracking.tr_code', 'left')
                  ->where('tracking.tr_id', $id)
                  ->get();
		return $query->row_array();
		//print_r($data);
		//die($this->db->last_query());
    }
	 
	 public function get_list() 
	 {
		$query = $this->db->select('*, roles.id, roles.title')
                  ->from($this->table)
                  ->join('users', 'users.id = tracking.tr_userid', 'left')
						->join('roles', 'roles.id = users.role', 'left')
						->join('tracking_centers', 'tracking_centers.cbarcode = tracking.tr_code', 'left')
						->order_by('tr_id', 'DESC')
                  ->get();
		return $query->result();
		//print_r($data);
		//die($this->db->last_query());
    }

}

/* End of file Tracking_model.php */
/* Location: ./application/models/Tracking_model.php */