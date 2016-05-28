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
?>
<!DOCTYPE html>
<html>
<head>
<?php foreach($css_files as $index): ?>
<link rel="stylesheet" type="text/css" href="<?php echo $index; ?>">
<?php endforeach; ?>
	<title><?php echo $page_title; ?></title>
</head>
<body>
		<?php
	if($this->session->flashdata('forbidden_access')!=''){
		echo $this->session->flashdata('forbidden_access');
	}else{
		redirect(base_url('admin/dashboard'));
	}?>
	</body>
</html>
