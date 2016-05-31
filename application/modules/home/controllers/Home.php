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
          $data['pages'] =$this->home_model->_getHomeData('pages',NULL);
          $data['page_title']='Home';
          $data['latest_articles']=$this->home_model->_getLatest();
          $this->load->view('tpl/'.$this->theme.'head',$data);
          $this->load->view('tpl/'.$this->theme.'navbar',$data);
          $this->load->view('home',$data);
          $this->load->view('tpl/'.$this->theme.'footer',$data);
    }

   public function article($slug){

          
           $data['css_files']=$this->twitterbootstrap->load_css_files();
           $data['js_files']=$this->twitterbootstrap->load_js_files();
           $data['pages'] =$this->home_model->_getHomeData('pages',NULL);
           $data['categ_post']=$this->home_model->_getHomeData('posts',array(array('field'=>'slug','parameter'=>str_replace("_","-",$slug ))));
           $data['page_title']='Category Posts';
           $this->load->view('tpl/'.$this->theme.'head',$data);
           $this->load->view('tpl/'.$this->theme.'navbar',$data);
           $this->load->view('article',$data);
           $this->load->view('tpl/footer',$data);

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
           $this->load->view('tpl/'.$this->theme.'head',$data);
           $this->load->view('tpl/'.$this->theme.'navbar',$data);
           $this->load->view('category-post',$data);
           $this->load->view('tpl/footer',$data);
        }else{
            show_404();
            exit();
        }

    }

} 
