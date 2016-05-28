<?php

/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') or exit('Error');
	
$validators = array();

function login_validators(){

	$validators = array(
		array(
			'label' => 'Username',
			 'field'=> 'txtusername',
			  'rules' => 'trim|required|min_length[6]'
			),
		array(
			'label' 	=> 'Password',
			 'field'	=> 'txtpassword',
			  'rules'	=>  'trim|required|min_length[6]'
			)
		);

	return $validators;
}


function add_blog_validators(){

	$validators = array(
			array(
				'label'=>'Title',
				'field'=>'title',
				'rules'=>'trim|required|is_unique[posts.title]'
			),
			array(
				'label'=>'Blog Category',
				'field'=>'blog_categ',
				'rules'=>'trim|required'
				),
			array(
				'label'=>'Content',
				'field'=>'content',
				'rules'=>'trim|required|min_length[6]'
				)
		);

	return $validators;
}


function add_username_validators(){
	$validators = array(
		array(
			'label'=>'Full Name',
			'field'=>'txt_user_fullname',
			'rules'=>'trim|required|min_length[2]|max_length[100]'
			),
		
		array(
			'label'=>'Username',
			'field'=>'txt_username',
			'rules'=>'trim|required|min_length[6]|max_length[20]',
			),

		array(
			'label'=>'Password',
			'field'=>'txt_user_password',
			'rules'=>'trim|required|min_length[6]',
			),

		array(
			'label'=>'Password Confirmation',
			'field'=>'txt_user_password_cf',
			'rules'=>'trim|required|matches[txt_user_password]',
			),
		array(
			'label'=>'User Role',
			'field'=>'usr_role',
			'rules'=>'trim|required',
			),
		array(
			'label'=>'Email',
			'field'=>'txt_user_mail',
			'rules'=>'trim|required|valid_email',
			)

		);

    return $validators;
}
