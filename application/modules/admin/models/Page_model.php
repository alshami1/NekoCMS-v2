<?php
defined('BASEPATH') or exit('Error!');


/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
class Page_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function add_page($data){
		return $this->db->insert('pages',$data);
	}

	public function add_page_category($data){
		
		return $this->db->insert('categories',$data);
	}

		public function _getPagesData($table,$params){

		$query = $this->db->select('*');
		$query = $this->db->from($table);

		if(is_array($params)){

			foreach($params as $index){
				$query = $this->db->where($index['field'],$index['parameter']);
			}
		 }
		 $query = $this->db->get();
		 return $query->result_array();


	}
}