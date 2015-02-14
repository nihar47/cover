<?php

 class Testimonials_model extends ROCKERS_Model {

	public function Testimonials_model() {

		parent::__construct();
		return;
	}
    
	public function find_total(){
	    	$query = $this->db->query("SELECT * FROM  `testimonials`  WHERE `active` = 1 ");
		 
		if(($query->num_rows()>0) ) {
			return $query->num_rows();
		}
		return 0;
	
	}
	
	public function list_testimonials($limit = "", $offset = "", $count = '') {

		$query = $this->db->query("SELECT * FROM  `testimonials`  WHERE `active` = 1 LIMIT " . $offset . ", " . $limit);
		// $q = $this->db->last_query(); 
		if(($query->num_rows()>0) ) {
			return $query->result();
		}
		return 0;
	}

} //Testimonials_model


