<?php
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