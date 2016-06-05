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

        $data['css_files']=$this->twitterbootstrap->load_css_files();
        $data['js_files']=$this->twitterbootstrap->load_js_files();
        $data['pages'] = $this->home_model->_getHomeData('pages',NULL);
        $data['page_title']='Home';
	     	$data['site_desc'] = $this->home_model->getsite_meta_description();
		    $data['site_keywords'] =$this->home_model->getsite_meta_keywords();
		    $data['footer'] =$this->home_model->getsite_footer();
        $data['latest_articles']=$this->home_model->_getLatest();
        $data['category_name']=NULL;
        $this->load->view('tpl/'.$this->theme.'head',$data);
        $this->load->view('tpl/'.$this->theme.'navbar',$data);
        $this->load->view('home',$data);
        $this->load->view('tpl/'.$this->theme.'footer',$data);
    }

   public function article($slug){
           
           $data['site_desc'] = $this->home_model->getsite_meta_description();
           $data['site_keywords'] =$this->home_model->getsite_meta_keywords();
           $data['footer'] =$this->home_model->getsite_footer();
           $data['url_slug'] = $slug;
           $data['category_name']=NULL;
           $data['css_files']=$this->twitterbootstrap->load_css_files();
           $data['js_files']=$this->twitterbootstrap->load_js_files();
           $data['pages'] =$this->home_model->_getHomeData('pages',NULL);
           $data['categ_post']=$this->home_model->_getHomeData('posts',array(array('field'=>'slug','parameter'=>str_replace("_","-",$slug ))));
           $data['page_title']='Article ';
           $this->load->view('tpl/'.$this->theme.'head',$data);
           $this->load->view('tpl/'.$this->theme.'navbar',$data);
           $this->load->view('article',$data);
           $this->load->view('tpl/'.$this->theme.'footer',$data);

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
           $data['category_name'] = $this->home_model->get_category_name($parent_category);
           $data['site_desc'] = $this->home_model->getsite_meta_description();
           $data['site_keywords'] =$this->home_model->getsite_meta_keywords();
           $data['footer'] =$this->home_model->getsite_footer();
           $data['categ_posts']=$this->home_model->allpost_from_category($parent_category,$offset,5);
           $data['css_files']=$this->twitterbootstrap->load_css_files();
           $data['js_files']=$this->twitterbootstrap->load_js_files();
           $data['pages'] =$this->home_model->_getHomeData('pages',NULL);
           $data['page_title']='Category Posts';
           $this->load->view('tpl/'.$this->theme.'head',$data);
           $this->load->view('tpl/'.$this->theme.'navbar',$data);
           $this->load->view('category-post',$data);
           $this->load->view('tpl/'.$this->theme.'footer',$data);
        }else{
            show_404();
            exit();
        }

    }
	
	//SEARCH
	public function search() {
		$data['title'] = 'Search';
		$navquery = $this->db->order_by("position","asc");
		$navquery = $this->db->get('pages');
		$data["nav"] = $navquery->result_array();
		$sidebarquery = $this->db->order_by("position","asc");
		$sidebarquery = $this->db->get('sidebar');
		$data["sidebar"] = $sidebarquery->result_array();
		$this->load->view('/template/'.$this->config->item('theme').'/header', $data);
		$this->load->view('/template/'.$this->config->item('theme').'/sidebar', $data);
		$this->load->view('search', $data);
		$this->load->view('/template/'.$this->config->item('theme').'/footer');	
	}

  public function t(){

  }

} 
