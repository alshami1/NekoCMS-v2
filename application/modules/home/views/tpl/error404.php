<!DOCTYPE html>
<html>
<head>
<?php
foreach($css_files as $files):
?>
<link rel="stylesheet" type="text/css" href="<?php echo $files; ?>">
<?php endforeach; ?>
<script type="text/javascript" src="<?php echo $js_files['jquery']; ?>"></script>
<script type="text/javascript" src="<?php echo $js_files['twitter_bootstrap_js']; ?>"></script>
	<title> Error 404 </title>
</head>
<body>
	<div class="container" style="margin-top: 70px;">
		<div class="container">
				<h1 style="text-align: center;"><i class="fa fa-paw"></i> Page Not Found </h1>
				<p style="text-align: center;"> The requested url was not found in our servers. If you believe this is an error , please contact the administrator  </p>

				<p style="margin-top: 100px; text-align: center;"> Return <a href="<?php echo base_url();?>"> HOME </a></p>
				<p style="text-align: center;"> Powered by  <a href="https://github.com/novhex/NekoCMS-v2"> NekoCMS v2 </a></p>
		</div>
	</div>

	</body>
</html>