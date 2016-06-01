<?php
/*
*  NEKO SIMPLE CMS v1.0.3
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="margin-top: 70px;">
<div class="row">
	<div class="col-md-12">
	<h1 style="text-align: center; margin-top: 50px; font-size: 20px;" >CATEGORY POSTS </h1>
	<hr>
	<?php foreach($categ_posts as $index): ?>
		<h2 style="text-align: left;"><a href="<?php echo base_url('article').'/'.$index['slug']; ?>"><?php echo $index['title']; ?></a></h2>
		<strong><?php echo "<i class='fa fa-user'></i>  Posted by: ".$this->pageslib->getAuthorFullName($index['posted_by']); ?></strong>
		<br>
		<strong><?php echo "<i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']));?></strong>

		<?php
         
        $content = strip_tags($index['content']);

        if (strlen($content) > 250) {

          $stringCut = substr($content, 0, 500);
          $string_to_replace=".....";
            $content= substr($stringCut, 0, strrpos($stringCut, ' '))."  ".$string_to_replace;
            echo "<p style='text-align: justify;'>".$content." <br><a href='".base_url('article').'/'.$index['slug']."' class='btn btn-primary btn-sm'><i class='fa fa-info-circle'></i> Read More </a></p>";
         }
        ?>

	
	<?php endforeach; ?>
	</div>
		<div style="text-align: center;"><?php echo $this->pagination->create_links(); ?></div>
	</div>

</div>


