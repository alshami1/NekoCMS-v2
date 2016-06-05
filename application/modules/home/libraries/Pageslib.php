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

class Pageslib{

	private $CI;
	
	public function __construct(){

		$this->CI = &get_instance();
		$this->CI->load->model('home_model');
	}

	public function _getCategories($parent_pageID){
		$data = $this->CI->home_model->_getHomeData('categories',array(array(
			'field'=>'parent_page',
			'parameter'=>$parent_pageID
			)
		  )
		);
		return $data;
	}

	public function getAuthorFullName($userId){
		$data = $this->CI->home_model->_getHomeData('users',array(array('field'=>'usrs_ID','parameter'=>$userId)));
		foreach($data as $index){
			return $index['usrs_full_name'];
		}
	}


	public function getSiteTitle(){
		$this->CI->db->where('site_info.configID',1);
		$query= $this->CI->db->get('site_info');
		foreach($query->result_array() as $index){
			return $index['configValue'];
		}
	}

	public function setArticleTitle($slug){
		$this->CI->db->where('posts.slug',str_replace("_", "-", $slug));
		$query = $this->CI->db->get('posts');
		
		foreach($query->result_array() as $index){
			return $index['title'];
		}
	}
}