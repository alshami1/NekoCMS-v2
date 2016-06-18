<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-8">
                <?php
                    if($this->session->flashdata('form_submission_success')!=''){
                        echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                    }
                    if($this->session->flashdata('form_submission_error')!=''){
						echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                    }
                ?>
                           
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Contact Us
                    </div>
                    <div class="panel-body">
					<form action="<?php echo base_url('home/contactus');?>" accept-charset="utf-8" id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post" >
                            <label>Your Name*</label>
								<input class="form-control" name="name">
							<label><?php echo form_error('name'); ?></label>
                            <label>Your Email*</label>
                                <input class="form-control" name="email">
							<label><?php echo form_error('email'); ?></label>
                         
                            <label>Your Message</label>
								<textarea rows="8" class="form-control" name="message" placeholder="You Message here..." required></textarea>
                       
                            <button type="submit" style="margin-top:20px;" class="btn btn-primary">Send Message</button>
                    </form><!-- /.contact-form -->
					</div>
                </div>
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