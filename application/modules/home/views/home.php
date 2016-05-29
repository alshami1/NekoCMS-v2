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

<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-8">
        
            <?php foreach($latest_articles as $index): ?>
        <h2 style="text-align: left;"><?php echo $index['title']; ?></h2>
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

	<div class="col-md-4">
		      <div class="panel panel-default">
                 
                 <div class="panel-heading">
                    <h3 class="panel-title">Search Post</h3>
                   </div>
                     <div class="panel-body">
         					<form accept-charset="utf-8" method="POST" action="">
                            <input class="form-control" name="q" id="q" />
                            <button class="btn btn-primary  btn-block"><i class="fa fa-search-plus"></i> Search</button>
                            </form>
                     </div>
				</div>

					  <div class="panel panel-default">
                 
                 <div class="panel-heading">
                    <h3 class="panel-title">Recent Comments</h3>
                   </div>
                     <div class="panel-body">
         					
                     </div>
						</div>	

				<div class="panel panel-default">
                 
                 <div class="panel-heading">
                    <h3 class="panel-title">Elsewhere</h3>
                   </div>
                     <div class="panel-body">
         					<ul style="list-style: none;">
         						<li><a href="<?php echo base_url('');?>"><i class="fa fa-facebook-square fa-2x"></i> NekoCMS </a></li>
         						<li><a href="https://github.com/novhex/NekoCMS"><i class="fa fa-github fa-2x"></i> Nekocms</a></li>
         						<li><a href="https://twitter.com/novhz94/"><i class="fa fa-twitter fa-2x"></i> NekoCMS</a></li>
         					</ul>
                     </div>
				
				</div>


                   </div>
		</div>

	</div>
