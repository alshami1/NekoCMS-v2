<?php
/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/

defined('BASEPATH') or exit('Error!');

class Home_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

		public function _getHomeData($table,$params,$limit=NULL,$orderby=NULL){

		$query = $this->db->select('*');
		$query = $this->db->from($table);

		if(is_array($params)){

			foreach($params as $index){
				$query = $this->db->where($index['field'],$index['parameter']);
			}
		 }


		 if($orderby!==NULL){
		 	$query = $this->db->order_by($orderby);
		 }


		 if($limit!==NULL){
		 	$query = $this->db->limit($limit);
		 }

		 $query = $this->db->get();
		 
		 return $query->result_array();


	}

	   public function allpost_from_category($parent_category,$offset,$limit){

			    $this->db->where('posts.parent_category',$parent_category);
			    $this->db->order_by("posts.postID", "DESC");
			    $query=$this->db->get('posts',$limit,$offset);
			    return $query->result_array();

   }

   
	public function countpost_from_category($parentID){

		        $this->db->from('posts');
		        $this->db->where('posts.parent_category',$parentID);
		        $db_results=$this->db->get();
		        $results=$db_results->result();
		        $numrows=$db_results->num_rows();
		        return $numrows;

   }

   public function _getLatest(){
		   		$query =  $this->db->select('*');
		   		$query =  $this->db->from('posts');
		   		$query = $this->db->order_by('posts.postID','DESC');
		   		$query = $this->db->limit(5);
		   		$query = $this->db->get();

		   		return $query->result_array();
	}
	

	public function get_category_name($categID){
		$this->db->where('categories.categ_ID',$categID);
		$query = $this->db->get('categories');
		foreach($query->result_array() as $index){
			return $index['category_name'];
		}
	}


	public function getsite_meta_description(){
		$this->db->where('site_info.configID',2);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}

		public function getsite_footer(){
		$this->db->where('site_info.configID',5);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}
	

		public function getsite_meta_keywords(){
		$this->db->where('site_info.configID',4);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}
	


}