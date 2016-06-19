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

class Home_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}


   public function allpost_from_category($parent_category,$offset,$limit){

			    $this->db->where('posts.parent_category',$parent_category);
			    $this->db->order_by("posts.postID", "DESC");
			    $query=$this->db->get('posts',$limit,$offset);
			    return $query->result_array();

	}


		public function _getHomeData($table,$params,$limit=NULL,$orderby=NULL){

		$query = $this->db->select('*');
		$query = $this->db->from($table);

		if(is_array($params)){

			foreach($params as $index){
				$query = $this->db->where($index['field'],$index['parameter']);
			}
		 }


		 if($orderby!==NULL){
		 	$query = $this->db->order_by($orderby);
		 }


		 if($limit!==NULL){
		 	$query = $this->db->limit($limit);
		 }

		 $query = $this->db->get();
		 
		 return $query->result_array();


	}

	   public function getNewsComments($newsid){

      $query = $this->db->where('article_comments.news_id',$newsid);
      $query = $this->db->where('article_comments.is_approved',1);
      $query = $this->db->get('article_comments');
     
      return $query->result_array();
   }

	
   
	public function countpost_from_category($parentID){

		        $this->db->from('posts');
		        $this->db->where('posts.parent_category',$parentID);
		        $db_results=$this->db->get();
		        $results=$db_results->result();
		        $numrows=$db_results->num_rows();
		        return $numrows;

	}
	
	public function getRows($postID = '')
	{
		$this->db->select('postID, title, slug, content, date_posted, posted_by, parent_category');
		$this->db->from('posts');

		if($postID){
			$this->db->where('postID',$postID);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('title','ASC');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		return !empty($result)?$result:false;
	}
	
	public function getArticlePublished($perPage = 5, $offset = 0, $key = null) {
        $this->db->select('p.postID, p.title, p.content, p.slug, p.date_posted, p.posted_by, p.parent_category, c.category_name as categoryName');
        $this->db->join('categories c', 'c.categ_ID = p.parent_category');
        $this->db->limit($perPage, $offset);
        if ($key != null) {
            $this->db->like('p.title', $key);
            $this->db->or_like('p.content', $key);
        }
        $query = $this->db->get('posts p');
        

        if ($query->num_rows() > 0) {

            return $query->result_array();
        }
    }

	
	public function _getLatest(){
		$query = $this->db->select('*');
		$query = $this->db->from('posts');
		$query = $this->db->order_by('posts.postID','DESC');
		$query = $this->db->limit(5);
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function _getLatestComments(){
		$query = $this->db->select('*');
		$query = $this->db->from('article_comments');
		$query = $this->db->order_by('article_comments.c_id','DESC');
		$query = $this->db->limit(5);
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function _getLatestPosts(){
		$query = $this->db->select('*');
		$query = $this->db->from('posts');
		$query = $this->db->order_by('posts.postID','DESC');
		$query = $this->db->limit(5);
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function getComments($newsid){
		$query = $this->db->where('article_comments.news_id',$newsid);
		$query = $this->db->where('article_comments.is_approved',1);
		$query = $this->db->get('article_comments');
     
		return $query->result_array();
	}
   
    public function savecomment($newsID,$name,$email,$date,$comment,$is_approved){
        $data = array(
			'news_id'=>$newsID,
			'name'=>$name,
			'email'=>$email,
			'comment_date'=>$date,
			'comment'=>$comment,
			'is_approved'=>$is_approved
        );
        return $this->db->insert('article_comments',$data);
    }
	
	public function getBlogComments(){
        $query = $this->db->join('posts','posts.postID = article_comments.news_id ','INNER');
        $query = $this->db->get('article_comments');
        return $query->result_array();

    }

    public function getBlogCommentbyId($c_id){
		$query = $this->db->join('posts','posts.postID = article_comments.news_id ','INNER');
		$query = $this->db->where('article_comments.c_id',$c_id);
		$query = $this->db->get('article_comments');
		return $query->result_array();

    }
	
	public function getsite_meta_keywords(){
		$this->db->where('site_info.configID',4);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}
	
	public function getsite_meta_description(){
		$this->db->where('site_info.configID',2);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}
	
	public function getsite_footer(){
		$this->db->where('site_info.configID',5);
		$query=$this->db->get('site_info');
		return $query->result_array();
	}
	
	public function signup() {
        $data = array(
            'email' => $this->input->post('email'),
			'date_subscribed' => date('Y-m-d'),
        );
        $this->db->insert('newsletter',$data);
    }
	
	public function sendmessage(){
		$data = array(
			'visitor_email' => $this->input->post('email'),
			'body' => $this->input->post('message'),
			'from' => $this->input->post('name'),
			'ip_address' => $this->input->ip_address(),
			'is_read'=> 'N',
			'date_recieved'=>str_replace("/","-",date("Y/m/d"))
		);
		$this->db->insert('messages', $data);
		return TRUE;  
	}
}