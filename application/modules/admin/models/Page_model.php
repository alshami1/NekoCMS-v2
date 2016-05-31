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
	
	public function saveEditedPage(){
		$slug=url_title($this->input->post('txt_pagetitle',true),'dash',TRUE);
		$data=array(
			'page_name'=>$this->input->post('txt_pagetitle',true),
			'page_slug'=>$slug
			);
		$this->db->where('pages.page_slug',$this->input->post('curr_slug',true));
		$this->updatePageParentCategory($slug,$this->input->post('curr_slug',true));
		return $this->db->update('pages',$data);
		}
		
		
	public function updatePageParentCategory($new_slug,$old_slug){
		
		$query = $this->db->where('parent_category',$old_slug);
		$query = $this->db->update('posts',array('parent_category'=>$new_slug));
	}
		
	

	public function get_page($page){
        $query =$this->db->where('pages.page_slug',str_replace("_", "-", $page));
        return $this->db->get('pages')->result_array();
	}
	
	public function update_page($data,$page){
		$this->db->where('pages.page_slug',str_replace("_", "-", $page));
		return $this->db->update('pages',$data);
    }
	
}