<?php
class Demo_model extends CI_Model { 

	public function Demo_model() {

		parent::__construct();
		return;
	}

	public function get_data(){
		$query = $this->db->query("select * from admin");
		if($query->num_rows()>0){
			return $query->result();
			}else{
				return 0;
				}
		
		}


}?>