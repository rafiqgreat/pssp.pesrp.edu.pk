<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_Model {

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
	 
	 public function get_statics() 
	 {
		$query = $this->db->select([
			  'COUNT(DISTINCT CONCAT(tr_userid, "_", tr_code)) as totalScanned',
			  'COUNT(DISTINCT CASE WHEN roles.title = "Paper Collector" THEN CONCAT(tr_userid, "_", tr_code) END) as totalPaperCollector',
			  'COUNT(DISTINCT CASE WHEN roles.title = "District Focal Person" THEN CONCAT(tr_userid, "_", tr_code) END) as totalDistrictFocalPerson',
			  'COUNT(DISTINCT CASE WHEN roles.title = "Tehsil Focal Person" THEN CONCAT(tr_userid, "_", tr_code) END) as totalTehsilFocalPerson',
			  'COUNT(DISTINCT CASE WHEN roles.title = "Test Administrator" THEN CONCAT(tr_userid, "_", tr_code) END) as totalTestAdministrator'
		 ])
		 ->from($this->table)
		 ->join('users', 'users.id = tracking.tr_userid', 'left')
		 ->join('roles', 'roles.id = users.role', 'left')
		 ->join('tracking_centers', 'tracking_centers.cbarcode = tracking.tr_code', 'left')
		 ->get();
	
	return $query->row_array();

		//print_r($data);
		//die($this->db->last_query());
    }
	 
	public function get_district_statics()
{
    $this->db->select([
        'tc.cdistrictname',
        'tc.ctehsilname',

        // Total distinct trackings at district level
        '(SELECT COUNT(DISTINCT CONCAT(t1.tr_userid, "_", t1.tr_code)) 
          FROM tracking t1 
          JOIN tracking_centers tc1 ON tc1.cbarcode = t1.tr_code 
          WHERE tc1.cdistrictname = tc.cdistrictname) AS total_district_trackings',

        // Total distinct trackings at tehsil level
        'COUNT(DISTINCT CONCAT(t.tr_userid, "_", t.tr_code)) AS total_tehsil_trackings',

        // Count distinct trackings by user role in district & tehsil
        'COUNT(DISTINCT CASE WHEN r.title = "Paper Collector" THEN CONCAT(t.tr_userid, "_", t.tr_code) END) AS paper_collector_trackings',
        'COUNT(DISTINCT CASE WHEN r.title = "District Focal Person" THEN CONCAT(t.tr_userid, "_", t.tr_code) END) AS district_focal_trackings',
        'COUNT(DISTINCT CASE WHEN r.title = "Tehsil Focal Person" THEN CONCAT(t.tr_userid, "_", t.tr_code) END) AS tehsil_focal_trackings',
        'COUNT(DISTINCT CASE WHEN r.title = "Test Administrator" THEN CONCAT(t.tr_userid, "_", t.tr_code) END) AS test_administrator_trackings'
    ], false);

    $this->db->from('tracking_centers tc');
    $this->db->join('tracking t', 'tc.cbarcode = t.tr_code', 'left'); // Left Join to check match
    $this->db->join('users u', 'u.id = t.tr_userid', 'left'); // Left Join with users
    $this->db->join('roles r', 'r.id = u.role', 'left'); // Left Join with roles

    $this->db->group_by(['tc.cdistrictname', 'tc.ctehsilname']); // Group by District and Tehsil
    $this->db->order_by('tc.cdistrictname, tc.ctehsilname');

    $query = $this->db->get();
    
    // Print SQL query for debugging
     //echo $this->db->last_query();
     //exit();

    return $query->result_array();
}




	 

	 
	 public function getDistrictTehsils()
	 {
		 $this->db->select([
			  'tc.cdistrictname',
			  'tc.ctehsilname',
			  'MAX(CASE WHEN t.tr_code IS NOT NULL THEN "Yes" ELSE "Pending" END) AS status' // Ensures "Yes" if any match found
		 ], false);
	
		 $this->db->from('tracking_centers tc');
		 $this->db->join('tracking t', 'tc.cbarcode = t.tr_code', 'left'); // Left Join to check match
		 $this->db->group_by(['tc.cdistrictname', 'tc.ctehsilname']); // Prevents duplicate Tehsil names
		 $this->db->order_by('tc.cdistrictname, tc.ctehsilname');
	
		 $query = $this->db->get();
		 return $query->result_array();
	 }
}