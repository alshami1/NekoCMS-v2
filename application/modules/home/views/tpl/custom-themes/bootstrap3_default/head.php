 <?php

/*
*  NEKO SIMPLE CMS v1.0.3
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') or exit('Error!');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Neko Zone - <?php echo $page_title; ?></title>
<meta name="robots" content="all">
<?php foreach($site_keywords as $sitekeywords): ?>
<meta name="keywords" content="<?php echo $sitekeywords['configValue'];?>">
<?php endforeach; ?>
<?php foreach($site_desc as $sitedesc): ?>
<meta name="description" content="<?php echo $sitedesc['configValue'];?>">
<?php endforeach; ?>
<meta name="author" content="Novhex">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/font-awesome.min.css');?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/dataTables.bootstrap.css');?>">

    <!-- CSS App -->


    <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/bootstrap.min.js'); ?>"></script>
    
		
</head>
<body class="flat-blue">
