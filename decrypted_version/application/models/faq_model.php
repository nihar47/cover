<?php

 class faq_model extends ROCKERS_Model {

	public function faq_model() {

		parent::__construct();
		return;
	}
    
	public function find_total(){
	    	$query = $this->db->query("SELECT * FROM  `faq`  WHERE `active` = 1 ");
		 
		if(($query->num_rows()>0) ) {
			return $query->num_rows();
		}
		return 0;
	
	}
	
	public function list_faq($limit = "", $offset = "", $count = '') {

		$query = $this->db->query("SELECT * FROM  `faq`  WHERE `active` = 1 LIMIT " . $offset . ", " . $limit);
		// $q = $this->db->last_query(); 
		if(($query->num_rows()>0) ) {
			return $query->result();
		}
		return 0;
	}
	public function list_faq_catergory($limit = "", $offset = "", $count = '') {

		$query = $this->db->query("SELECT * FROM  `faq_category`  WHERE `active` = 1 LIMIT " . $offset . ", " . $limit);
		// $q = $this->db->last_query(); 
		if(($query->num_rows()>0) ) {
			return $query->result();
		}
		return 0;
	}
	
	public function insert_que_faq() {
		
		
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$data = array("faq_category_id" => $this->input->post("Category"),"email" => $this->input->post("emailid"),"question" => $this->input->post("question"));
		if ($this->db->insert("faq", $data))
		{
			 
			return 1;
		}
		return 0;
	}
	}

} //Testimonials_model


