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
		$this->load->library(array('adminlib','session'));
	}

	public function activate_theme(){
		
	if($this->input->is_ajax_request()){

		$this->load->database();
		$query = $this->db->truncate('theme_settings'); 

		echo  $this->db->insert('theme_settings',array('theme_path'=>$this->input->post('theme',TRUE),'is_activated'=>'Yes'
			));
	}

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


	public function deactivate_theme(){
		
	if($this->input->is_ajax_request()){

		$this->load->database();
		$query = $this->db->truncate('theme_settings'); 

		echo  $this->db->insert('theme_settings',array('theme_path'=>$this->input->post('theme',TRUE),'is_activated'=>'No'
			));
	}

	}

	public function deletepost(){
		
		if($this->input->is_ajax_request()){
			$this->load->model('blog_model');

			if($this->session->userdata('site_user_role')=='writer'){
				$postsIDS = array();
				
				$writerposts = $this->blog_model->user_blogs($this->session->userdata('site_user_id'),$this->session->userdata('site_user_role'),NULL,NULL);

				foreach($writerposts as $index){
					array_push($postsIDS,$index['postID']);
				}
				if(in_array($this->input->post('post_id'),$postsIDS)){
					echo $this->blog_model->delete_blog($this->input->post('post_id',TRUE));		
					
				}else{
					echo 'not-authorized';
				}

			}else{
				echo $this->blog_model->delete_blog($this->input->post('post_id',TRUE));
			}


		}

	}

	public function move_post_category(){

		if($this->input->is_ajax_request()){
			
			$this->load->model('blog_model');
			echo $this->blog_model->move_blog($this->input->post('slug',TRUE),$this->input->post('destination',TRUE));

		}
	}

	public function move_category_parent(){
		
		if($this->input->is_ajax_request()){
			$this->load->model('category_model');
			echo $this->category_model->update_category_parent($this->input->post('categ_id',TRUE),$this->input->post('destination',TRUE));

		}
	}


	public function remove_parent_page(){
		if($this->input->is_ajax_request()){
			
			$parent_page_id = $this->input->post('parent_page_id',TRUE);

			echo $this->page_model->delete_parent_page($parent_page_id);

		}
	}

	public function show_movepost_category_box(){
		if($this->input->is_ajax_request()){

		$this->load->model('category_model');
		$slug = $this->input->post('slug',TRUE);
		$data['post_slug']=$slug;
		$data['categories']=$this->category_model->get_all_categories();
		$this->load->view('popups/movepost',$data);

	  }
	}

	public function show_movecategory_box(){
		
		if($this->input->is_ajax_request()){
			$data['parent_pages'] = $this->page_model->_getPagesData('pages',NULL);
			$data['category_to_move'] = $this->input->post('categ_id',TRUE);
			$this->load->view('popups/movecategory',$data);
		}
	}



}