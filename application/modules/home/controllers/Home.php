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

class Home extends CI_Controller {

	private $theme;
  	private $str_output;

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','text'));
        $this->load->library(array('session','pagination','twitterbootstrap','form_validation','pageslib','themelib'));
        $this->load->model(array('home_model'));

        if($this->themelib->is_custom_theme_activated()=='Yes'){
          $this->theme = $this->themelib->get_custom_theme_path();
        }else{
          $this->theme = '';
        }


    }

    public function index() {
		//get articles ## Search
		
        $config['base_url'] = base_url() . 'home/index/';
        $config['total_rows'] =$this->home_model->getRows();
        $config['per_page'] = 5;
        $config['use_page_numbers'] = TRUE ;
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
		$this->pagination->initialize($config);

		if ($this->input->get('q')) {
            $data['latest_articles'] = $this->home_model->getArticlePublished($config['per_page'], $this->uri->segment(3), $this->input->get('q'));
            if (empty($data['latest_articles'])) {
                $this->session->set_flashdata('error', 'Sorry, we could not find any article(s)');
                redirect(base_url());
            }
        } else {
            $data['latest_articles']=$this->home_model->_getLatest($config['per_page'], $this->uri->segment(3));
        }
			
		//END
		
        $data['css_files']=$this->twitterbootstrap->load_css_files();
        $data['js_files']=$this->twitterbootstrap->load_js_files();
        $data['pages'] = $this->home_model->_getHomeData('pages',NULL);
        $data['page_title']='Home';
		$data['site_desc'] = $this->home_model->getsite_meta_description();
		$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
		$data['footer'] =$this->home_model->getsite_footer();
		$data['latest_comments']=$this->home_model->_getLatestComments();
		$data['latest_posts']=$this->home_model->_getLatestPosts();
        //$data['latest_articles']=$this->home_model->_getLatest();
        $this->load->view('tpl/'.$this->theme.'head',$data);
        $this->load->view('tpl/'.$this->theme.'navbar',$data);
        $this->load->view('home',$data);
        $this->load->view('tpl/'.$this->theme.'footer',$data);
		
    }

	public function article($slug){


		$datasize =$this->home_model->_getHomeData('posts',array(array('field'=>'slug','parameter'=>str_replace("_","-",$slug ))));


		if(sizeof($datasize)>0){

		$this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        $this->form_validation->set_rules('comment','Comment','trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");
		
		if($this->form_validation->run()==FALSE){
        
			$data['css_files']=$this->twitterbootstrap->load_css_files();
			$data['js_files']=$this->twitterbootstrap->load_js_files();
			$data['pages'] =$this->home_model->_getHomeData('pages',NULL);
			$data['categ_post']=$this->home_model->_getHomeData('posts',array(array('field'=>'slug','parameter'=>str_replace("_","-",$slug ))));
			$data['page_title']='Category Posts';
			$data['site_desc'] = $this->home_model->getsite_meta_description();
			$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
			$data['footer'] =$this->home_model->getsite_footer();
			$this->load->view('tpl/'.$this->theme.'head',$data);
			$this->load->view('tpl/'.$this->theme.'navbar',$data);
			$this->load->view('article',$data);
			$this->load->view('tpl/'.$this->theme.'footer',$data);
		
		}
		else
		{
			$response = $this->home_model->savecomment($this->input->post('news_id'),
            $this->input->post('name'),$this->input->post('email'),date('Y-m-d'),$this->input->post('comment'));

            if($response==1){
				$this->session->set_flashdata('comment_submitted','Your comment has been saved.');
				redirect(base_url('article').'/'.$slug);
            }

		}
	 }else{
	 	redirect(base_url('page-not-found'));

	 }
	 
	}
   
 
    public function category($parent_category=NULL,$offset=0){

        if(ctype_digit($parent_category)){

           $uri_segment = 3;
           $config['base_url'] = base_url('category').'/'.$parent_category;
           $config['total_rows'] =$this->home_model->countpost_from_category($parent_category);
           $config['per_page'] = 5;
           $config['use_page_numbers'] = TRUE ;
           $config['prev_link'] = '&laquo;';
           $config['next_link'] = '&raquo;';
           $config['full_tag_open'] = '<ul class="pagination">';
           $config['full_tag_close'] = '</ul>';
           $config['prev_link'] = '&laquo;';
           $config['prev_tag_open'] = '<li>';
           $config['prev_tag_close'] = '</li>';
           $config['next_tag_open'] = '<li>';
           $config['next_tag_close'] = '</li>';
           $config['cur_tag_open'] = '<li class="active"><a href="#">';
           $config['cur_tag_close'] = '</a></li>';
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['uri_segment'] = $uri_segment;
           $this->pagination->initialize($config);
           $data['categ_posts']=$this->home_model->allpost_from_category($parent_category,$offset,5);
           $data['css_files']=$this->twitterbootstrap->load_css_files();
           $data['js_files']=$this->twitterbootstrap->load_js_files();
           $data['pages'] =$this->home_model->_getHomeData('pages',NULL);
           $data['page_title']='Category Posts';
		   $data['site_desc'] = $this->home_model->getsite_meta_description();
		   $data['site_keywords'] =$this->home_model->getsite_meta_keywords();
		   $data['footer'] =$this->home_model->getsite_footer();
           $this->load->view('tpl/'.$this->theme.'head',$data);
           $this->load->view('tpl/'.$this->theme.'navbar',$data);
           $this->load->view('category-post',$data);
           $this->load->view('tpl/'.$this->theme.'footer',$data);
        }else{
            show_404();
            exit();
        }

    }
	
	public function subscribe() {
        $this->load->library('email');
		// field name, error message, validation rules
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[newsletter.email]');
		$this->form_validation->set_message('is_unique', '%s is already subscribed. Provide different email');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");
		
		if($this->form_validation->run() == TRUE)
		{	
			$this->home_model->signup();
			$message = 'You have successfully sign up to our newsletter. Thanks. -Webmaster';
			$email = $this->input->post('email');
			$this->email->From('no-reply@neko.com', 'Neko Admin');
			$this->email->To($email);		
			$this->email->Subject('Newsletter Signup Confirmation');		
			$this->email->message($message);
			$this->email->send();
			echo $this->email->print_debugger();
			$this->email->clear();
			
			$this->session->set_flashdata('success', '<div class="text-success text-center" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Success:</span>
			You have successfully sign up to our newsletter. 
			</div>');
			redirect('home');
			
			if($this->email->send())
			{
				
				$this->session->set_flashdata('success', 'You have successfully sign up to our newsletter.');
				redirect('home');
			}	
        }
		else
		{
			$this->session->set_flashdata('error', 'Please enter your email and try again');
			redirect('home');
		}
		
		$data['css_files']=$this->twitterbootstrap->load_css_files();
        $data['js_files']=$this->twitterbootstrap->load_js_files();
        $data['pages'] = $this->home_model->_getHomeData('pages',NULL);
        $data['page_title']='Home';
		$data['site_desc'] = $this->home_model->getsite_meta_description();
		$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
		$data['footer'] =$this->home_model->getsite_footer();
		$data['latest_comments']=$this->home_model->_getLatestComments();
		$data['latest_posts']=$this->home_model->_getLatestPosts();
		$this->home_model->signup();
        $this->load->view('tpl/'.$this->theme.'head',$data);
        $this->load->view('tpl/'.$this->theme.'navbar',$data);
        $this->load->view('home',$data);
        $this->load->view('tpl/'.$this->theme.'footer',$data);
	}
	
	public function contactus() {
        $this->form_validation->set_rules('name','Name','required|max_length[45]|trim');
        $this->form_validation->set_rules('email','Email Address','required|trim');
        $this->form_validation->set_rules('message','Message','required|trim|max_length[160]');
        $this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

        if ($this->form_validation->run() === FALSE)
        {	
		    $data['css_files']=$this->twitterbootstrap->load_css_files();
			$data['js_files']=$this->twitterbootstrap->load_js_files();
			$data['pages'] = $this->home_model->_getHomeData('pages',NULL);
			$data['page_title']='Home';
			$data['site_desc'] = $this->home_model->getsite_meta_description();
			$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
			$data['footer'] =$this->home_model->getsite_footer();
			$data['latest_comments']=$this->home_model->_getLatestComments();
			$data['latest_posts']=$this->home_model->_getLatestPosts();
			$this->load->view('tpl/'.$this->theme.'head',$data);
			$this->load->view('tpl/'.$this->theme.'navbar',$data);
			$this->load->view('contact',$data);
			$this->load->view('tpl/'.$this->theme.'footer',$data);

        }else {
			if($this->home_model->sendmessage()===TRUE){
                $this->session->set_flashdata('form_submission_success','Message successfully Sent');
                redirect('home/contactus');
			}else{
				$this->session->set_flashdata('form_submission_error','Sorry, your message cannot be send.');
				redirect('home/contactus');
			}
        }
	}

		public function loadcomments(){
		 


		if($this->input->post('newsID')!=''){
		$news_id = $this->input->post('newsID');
		
		$data=$this->home_model->getNewsComments($news_id);

		foreach($data as $html_output):
			
					$this->str_output="<p><i class='fa fa-user'></i> Comment by: ".$html_output['name']." </p>";
					$this->str_output.="<p><i class='fa fa-calendar'></i> ".date('F  j, Y',strtotime($html_output['comment_date']));
					$this->str_output.="<p>".$html_output['comment']."</p><hr>";

					echo $this->str_output;


		endforeach;

		}else{
			redirect(base_url());
		}
		
	}

} 
