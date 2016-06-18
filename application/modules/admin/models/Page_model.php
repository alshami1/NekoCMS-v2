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

	public function delete_parent_page($page_id){

		$categories_update = array('parent_page'=>0);
		$updatesql = $this->db->where('categories.parent_page',$page_id);
		$updatesql = $this->db->update('categories',$categories_update);

		if($updatesql==1){
			$deletepagesql = $this->db->where('pages.pageID',$page_id);
			return $this->db->delete('pages');
		}

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
	
	public function get_subscriber_data($options = array()) {
		$query = $this->db->get('newsletter');
		if(isset($options['id']))
        return $query->row(0);
		return $query->result();
	}
	
	public function unread_message_count() {
		$this->db->where('messages.is_read', 'N');
		$this->db->from('messages');
		return $this->db->count_all_results();
    }
	
	public function fetch_unread_messages($cfg_page,$offset){
		$query=$this->db->order_by('msgID', 'DESC');
		$query=$this->db->get('messages',$cfg_page,$offset);
		return $query->result_array();
    }
	
	public function viewmsg($msgid){
		$query = $this->db->get_where('messages', array('msgID' => $msgid));
        if($query->row_array()==NULL){
          return FALSE;
        }else{
          $data=array('is_read'=>'Y');
          $this->db->where('messages.msgID',$msgid);
          $this->db->update('messages',$data);
          return $query->row_array();
		}
	}
	
	public function delete_message($id){
		$this->db->where('messages.msgID',$id);
		return $this->db->delete('messages');
	}
	
	
}