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


class Error404 extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library(array('twitterbootstrap'));

	}

	public function page_not_found(){
		$data['css_files']=$this->twitterbootstrap->load_css_files();
        $data['js_files']=$this->twitterbootstrap->load_js_files();
		$this->load->view('tpl/error404',$data);
	}
}