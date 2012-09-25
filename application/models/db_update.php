<?php

class Db_update extends CI_model{
		function updateData($data,$id){
			$this->db->where('id', $id);
			$this->db->update('pagedata', $data); 
			return "succes";
		}

}
