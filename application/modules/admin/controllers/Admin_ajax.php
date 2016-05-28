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


class Admin_ajax extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('url'));
		$this->load->model('page_model');
		$this->load->library('adminlib');
	}

	public function add_page(){
		if($this->input->is_ajax_request()==TRUE){


		 if(strlen($this->input->post('page_title',TRUE))>255){
		 		echo "<p style='color:red;'>* Page length must not exceed up to 255 characters! </p>";


		 }else{

		 	if(preg_match('/^[A-Z0-9 ]+$/i', $this->input->post('page_title',TRUE))==0){
		 		echo "<p style='color:red;'>* Page name should alphanumeric and spaces only </p>";
		 	}else{
			if($this->adminlib->is_page_exists($this->input->post('page_title',TRUE))==0){
				
				$response =$this->page_model->add_page(
				array('page_name'=>ucwords($this->input->post('page_title',TRUE)),
				'page_slug'=>url_title($this->input->post('page_title'), 'dash', TRUE)
				));

				echo $response;

		 	}else{
		 		echo "<p style='color:red;'>* Page already exists. Please have a unique page name. </p>";
		 	}
		  }

		 }

		}else{
			redirect(base_url('admin/forbidden-page'));
		}
	}

	public function deletepost(){
		
		if($this->input->is_ajax_request()){
			$this->load->model('blog_model');

			echo $this->blog_model->delete_blog($this->input->post('post_id',TRUE));

		}

	}

	public function move_post_category(){

		if($this->input->is_ajax_request()){
			
			$this->load->model('blog_model');
			echo $this->blog_model->move_blog($this->input->post('slug',TRUE),$this->input->post('destination',TRUE));

		}


	}

	public function show_move_category_box(){
		if($this->input->is_ajax_request()){

		$this->load->model('category_model');
		$slug = $this->input->post('slug',TRUE);
		$data['post_slug']=$slug;
		$data['categories']=$this->category_model->get_all_categories();
		$this->load->view('popups/movepost',$data);

	  }
	}



}