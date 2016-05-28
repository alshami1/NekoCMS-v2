<?
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
	<?php foreach($css_files as $data): ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $data;?>">
	<?php endforeach; ?>
	<title><?php echo $page_title; ?></title>
</head>
<body>

	<div class="container" style="margin-top: 70px;">
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
				<div class="well">	
				<h4 style="text-align: center;"><i class="fa fa-paw fa-2x"></i> System Login </h4>
				<?php echo validation_errors();?> 
				<?php 
					if($this->session->flashdata('auth_error')!=''){
						echo $this->session->flashdata('auth_error');
					}
				?>
				<form accept-charset="utf-8" method="POST" action="">
					<div class="row">
						<div class="col-sm-12">
							<label for="txtusername">Username:</label>
							<input type="text" name="txtusername" id="txtusername" class="form-control">
						</div>

						<div class="col-sm-12">
							<label for="txtusername">Password:</label>
							<input type="password" name="txtpassword" id="txtpassword" class="form-control">
						</div>
						<div class="col-sm-12">
						<label></label>
						<button id="btnlogin" class="btn btn-primary btn-block" style="margin-bottom: 12px;"><i class="fa fa-arrow-right"></i> LOGIN </button>
						</div>
						</div>
				</form>
					</div>
				</div>
		</div>
		
		<div class="col-sm-4"></div>
		</div>

	<script type="text/javascript" src="<?php echo $js_files['jquery'];?>"></script>
	<script type="text/javascript" src="<?php echo $js_files['twitter_bootstrap_js'];?>"></script>
	
	<script>
			$(document).ready(function(){
				/*
				* Add Loading Animation :)
				*/
				$('#btnlogin').click(function(){
					$(this).addClass('disabled');
					$(this).html("<i class='fa fa-spinner fa-spin'></i> LOGGING IN ...");
				});

			});	
	</script>
	

	</body>
</html>