<?php

	class Db_get extends CI_model{
		function getData($page){
			$query = $this->db->get_where("pagedata",array("page"=> $page));
			return $query->result();
		}
	
	}