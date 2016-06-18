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
class Twitterbootstrap {

	private $CI;

		public function __construct(){
			
			$this->CI = &get_instance();
			$this->CI->load->helper('url');
		}

		public function load_css_files(){

			return array(
				'bootstrap'=>base_url('assets/css/bootstrap.min.css'),
				'font_awesome'=>base_url('assets/css/font-awesome/css/font-awesome.min.css'),
				'data_tables'=>base_url('assets/css/dataTables.css'),
				'flatui'=>base_url('assets/css/flat-ui.min.css'),
				);
		}

	

		public function load_js_files(){
			return array(
				'jquery'=>base_url('assets/js/jquery.min.js'),
				 'twitter_bootstrap_js'=>base_url('assets/js/bootstrap.min.js'),
				 'bootbox_js'=>base_url('assets/js/bootbox.js'),
				 'data_tables_js'=>base_url('assets/js/dataTables.js'),
				 'neko'=>base_url('assets/js/neko.js'),
				 'nekocms'=>base_url('assets/js/nekocms.js')
				);
		}




}