<?php

/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/

class Adminlib {
	
	private $CI;
	private $current_url;

	public function __construct(){
		# code...
		$this->CI =  &get_instance();
		$this->CI->load->library('session');
		$this->CI->load->helper('url');
		$this->has_loggedIn();
		$this->check_permission();
	}

	 public function check_permission(){

	 	$writer_disallowed_links = array('parent-pages','add-user','user-list','categories','edit-frontend-html');
	 	$visited_url = $this->CI->uri->segment(2);

	 	if(in_array($visited_url,$writer_disallowed_links) && $this->CI->session->userdata('site_user_role')=='writer'){
	 		$this->CI->session->set_flashdata('forbidden_access','You have insufficient access for this page');
	 		redirect(base_url('admin/forbidden-page'));
	 	}



	 }

	public function getAuthorFullName($userId){
		
		$data = $this->CI->users_model->_getUsersData('users',array(array('field'=>'usrs_ID','parameter'=>$userId)));
		foreach($data as $index){
			return $index['usrs_full_name'];
		}
	}

	public function hashPassword($password){
		return password_hash($password,PASSWORD_BCRYPT,array('cost'=>15));
	}


	public function has_loggedIn(){

		$this->current_url = $this->CI->uri->segment(2);

		if(strlen($this->current_url)>0){
			if($this->CI->session->userdata('site_user')==''){
					redirect(base_url('admin/'));
			}
		}
	 }

	 public function is_page_exists($page_to_check){

	 	$this->CI->load->database();
	 	$sql = $this->CI->db->select('page_name');
	 	$sql = $this->CI->db->from('pages');
	 	$sql = $this->CI->db->where('page_name',ucwords($page_to_check));
	 	return $this->CI->db->count_all_results();
	 }


	public function verifyPassword($password,$hash){
		return password_verify($password,$hash);
	}	



}