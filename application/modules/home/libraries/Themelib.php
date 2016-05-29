<?php
/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Themelib {

	private $CI;

	public function __construct(){
		$this->CI = &get_instance();
	}

	public function is_custom_theme_activated(){
		$query = $this->CI->db->select('is_activated');
		$query = $this->CI->db->from('theme_settings');
		$query = $this->CI->db->where('ts_ID',1);
		$query = $this->CI->db->get();
		foreach($query->result_array() as $i){

			return $i['is_activated'];

		}

	}

	public function get_custom_theme_path(){
		
		$query = $this->CI->db->select('theme_path');
		$query = $this->CI->db->from('theme_settings');
		$query = $this->CI->db->where('ts_ID',1);
		$query = $this->CI->db->get();
		foreach($query->result_array() as $i){

			return $i['theme_path'];

		}
	}

}