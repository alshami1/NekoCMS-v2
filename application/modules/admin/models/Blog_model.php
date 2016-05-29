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

class Blog_model extends CI_Model{


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function add_blog($data){
      return $this->db->insert('posts',$data);
    }

	  public function countpost_from_category($user_id,$role){
            
        if($role=='admin'){

            $this->db->from('posts');
            $db_results=$this->db->get();
            $results=$db_results->result();
            $numrows=$db_results->num_rows();

        }else{

            $this->db->from('posts');
            $this->db->where('posts.posted_by',$user_id);
            $db_results=$this->db->get();
            $results=$db_results->result();
            $numrows=$db_results->num_rows();

        }
          
            return $numrows;
   }

   public function delete_blog($postID){
        $this->db->where('posts.postID',$postID);
        return $this->db->delete('posts');
   }

   public function get_blog($slug){
        $query =$this->db->where('posts.slug',str_replace("_", "-", $slug));
        return $this->db->get('posts')->result_array();
   }

   public function get_lastblogId(){
        $ids = array();
        
        foreach($this->db->get('posts')->result_array() as $index){
            array_push($ids, $index['postID']);
        }

        return end($ids);
   }

   public function move_blog($slug,$destination){
        $this->db->where('posts.slug',$slug);
        return $this->db->update('posts',array('parent_category'=>$destination));
    }

   public function update_blog($data,$slug){
    $this->db->where('posts.slug',str_replace("_", "-", $slug));
    return $this->db->update('posts',$data);
   }


   public function user_blogs($user_id,$role,$offset,$limit){

        if($role=='admin'){

            $this->db->join('categories','categories.categ_ID = posts.parent_category','INNER');
            $this->db->order_by("posts.title", "ASC");
            $query=$this->db->get('posts',$limit,$offset);
            
            

        }else{
                $this->db->join('categories','categories.categ_ID = posts.parent_category','INNER');
                $this->db->where('posts.posted_by',$user_id);
                $this->db->order_by("posts.title", "ASC");
                $query=$this->db->get('posts',$limit,$offset);
                
        }

        
        return $query->result_array();
   }



}