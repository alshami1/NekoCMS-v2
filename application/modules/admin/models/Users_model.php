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

class Users_model extends CI_Model{

	private $project_url='';

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
        $this->load->library('session');
	}

	public function _authenticate($username,$password){

		$query = $this->db->select('usrs_username');
		$query = $this->db->from('users');
		$query  = $this->db->where('usrs_username',$username);

		if($this->db->count_all_results()==1){
				
			$cp = $this->db->select('usrs_pw');
			$cp = $this->db->from('users');
			$cp = $this->db->where('users.usrs_username',$username);
			$cp = $this->db->get();

			foreach($cp->result_array() as $index){
				if(password_verify($password,$index['usrs_pw'])){
					return TRUE;
				}else{
					return FALSE;
				}
			}
		}else{
			return FALSE;
		}

	}

	public function _addUsersData($data){
		return $this->db->insert('users',$data);
	}


	public function _getUserRole($username){
		$query = $this->db->where('users.usrs_username',$username);
		$query = $this->db->get('users');

		foreach($query->result_array() as $index){
			return $index['usrs_role'];
		}
	}

	public function _getUserID($username){
		$query = $this->db->where('users.usrs_username',$username);
		$query = $this->db->get('users');
		foreach($query->result_array() as $index){
			return $index['usrs_ID'];
		}
	}

	public function _getUsersData($table,$params){

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

	public function _lastLogged($username){
		$this->db->where('usrs_username',$username);
		$this->db->update('users',array('usrs_last_logged'=>date('Y-m-d')." ".date('h:i:sa')));
	}

	public function _updateUserDetails($data,$userId){
		$this->db->where('users.usrs_ID',$userId);
		return $this->db->update('users',$data);
	}
	
	public function getsite_meta_description(){
		$this->db->where('site_info.configID',2);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}

    public function getsite_meta_keywords(){
		$this->db->where('site_info.configID',4);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}
	
	public function getsite_footer(){
		$this->db->where('site_info.configID',5);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}
	
	public function getsite_owner(){
		$this->db->where('site_info.configID',3);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}

	public function getsite_title(){
		$this->db->where('site_info.configID',1);
		$query=$this->db->get('site_info');
		return $query->result_array();		
	}
	
	public function changeNick($new_val){
		$data=array(
			'usrs_full_name'=>$new_val
		);
		$this->db->where('users.id',1);
		return $this->db->update('users',$data);
	}

	
	public function updatesiteInfo(){
		$this->updateBlogTitle($this->input->post('txt_site_title',true));
		$this->updateBlogMeta($this->input->post('site_meta',true));
		$this->updateBlogMetaKw($this->input->post('site_metakw',true));
		$this->updateBlogOwner($this->input->post('txt_site_owner',true));
		$this->updateSiteFooter($this->input->post('site_footer',true));
	}
	
	public function updateUserPic($path){
	$this->resetDisplayPhotoSession($path);
		$data=array(
			'profile_photo'=>$path
		);
	$this->db->where('users.id',1);
	return $this->db->update('users',$data);
	}
	
	
	public function resetDisplayPhotoSession($newpath){
		unset($_SESSION['display_photo']);
		$_SESSION['display_photo']=$newpath;
	}
	
	
	public function updateBlogTitle($new_val){
        $data=array(
				'configValue'=>$new_val
			);
        $this->db->where('site_info.configID',1);
        return $this->db->update('site_info',$data);
	}

	public function updateBlogMeta($new_val){
        $data=array(
				'configValue'=>$new_val
			);
        $this->db->where('site_info.configID',2);
        return $this->db->update('site_info',$data);
	}

	public function updateBlogMetaKw($mkw){
			$data=array(
				'configValue'=>$mkw
			);
        $this->db->where('site_info.configID',4);
        return $this->db->update('site_info',$data);
	}
	
	public function updateSiteFooter($mkw){
			$data=array(
				'configValue'=>$mkw
			);
        $this->db->where('site_info.configID',5);
        return $this->db->update('site_info',$data);
	}

	public function updateBlogOwner($new_val){
			$data=array(
				'configValue'=>$new_val
			);
        $this->db->where('site_info.configID',3);
        return $this->db->update('site_info',$data);
	}


}