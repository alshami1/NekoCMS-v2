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
				<?php if ($this->session->flashdata('error')): ?>
					<?php echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><strong>Error: </strong>".$this->session->flashdata('error')."</div>"; ?>
				<?php endif; ?>
<!-- SEARCH ARTICLES -->
	<?php if ($latest_articles): ?>
        <?php if ($this->input->get('q')): ?>
            We have found <?php echo count($latest_articles); ?> Articles with keyword '<strong><?php echo $this->input->get('q'); ?></strong>'. <br/><br/>
        <?php endif; ?>
	<?php endif; ?>
<!-- END Search -->	
		
            <?php foreach($latest_articles as $index): ?>
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

	<div class="col-md-4">
		      <div class="panel panel-default">
                 
                 <div class="panel-heading">
                    <h3 class="panel-title">Search Post</h3>
                   </div>
                     <div class="panel-body">
         					<form accept-charset="utf-8" method="GET" action="<?php echo site_url('home'); ?>">
                            <input class="form-control" placeholder="Search articles..." name="q" type="text"/>
                            <button type="submit" class="btn btn-primary  btn-block" style="margin-top:10px;"><i class="fa fa-search-plus"></i> Search</button>
                            </form>
                     </div>
				</div>

					  <div class="panel panel-default">
                 
                 <div class="panel-heading">
                    <h3 class="panel-title">Recent Comments</h3>
                   </div>
                     <div class="panel-body">
         				<?php foreach($latest_comments as $com): ?>
							<p>
								Comment   <strong><?php echo $com['comment']; ?></strong> <br/>
								by   <small><?php echo $com['name']; ?></small>
							</p>
						<?php endforeach; ?>
                     </div>
						</div>	
						
						<div class="panel panel-default">
                 
                 <div class="panel-heading">
                    <h3 class="panel-title">Recent Posts</h3>
                   </div>
                     <div class="panel-body">
         				<?php foreach($latest_posts as $post): ?>
							<p>
								<strong style="color: blue;"><?php echo $post['title']; ?></strong>
								<?php
									$content = strip_tags($post['content']);
										if (strlen($content) > 15) {
										$stringCut = substr($content, 0, 25);
										$string_to_replace=".....";
										$content= substr($stringCut, 0, strrpos($stringCut, ' '))."  ".$string_to_replace;
										echo "<p style='text-align: justify;'>".$content." <br><a href='".base_url('article').'/'.$post['slug']."' class=''><i class='fa fa-info-circle'></i> Read More </a></p>";
									}
								?>
								<small><?php //echo $com['content']; ?></small>
							</p>
						<?php endforeach; ?>
                     </div>
						</div>

						<div class="panel panel-default">
                 
							<div class="panel-heading">
								<h3 class="panel-title">Get Updates</h3>
							</div>
								<div class="panel-body">
									<form action="<?php echo base_url('home/subscribe'); ?>" method="post" accept-charset="utf-8">
									<input type="text" name="email" value="<?php echo set_value('email');?>" class="form-control" placeholder="Email">
									<button type="submit" class="btn btn-primary" style="margin-top:10px;">Subscribe</button>
									</form>
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
