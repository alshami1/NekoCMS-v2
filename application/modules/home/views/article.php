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
		<div class="col-md-12">
                <?php
                    if($this->session->flashdata('comment_submitted')!=''){
                        echo "<div class='alert alert-info'>".$this->session->flashdata('comment_submitted')."</div>";
                    }
                ?>
        </div>
	
	<?php foreach($categ_post as $index): ?>
		<h1 style="text-align: center; margin-top: 50px; font-size: 20px;" ><?php echo $index['title']; ?></h1>
		<hr>

		<strong><?php echo "<i class='fa fa-user'></i>  Posted by: ".$this->pageslib->getAuthorFullName($index['posted_by']); ?></strong>
		<br>
		<strong><?php echo "<i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']));?></strong>

		<div class="social_media_btns" style="text-align: center;">
			<p style="text-align: center;"> SHARE POST : </p>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('article').'/'.$index['slug'];?>"><i class="fa fa-facebook-square fa-2x" style="color:#3b5998;"></i></a>
			<a href="https://twitter.com/home?status=<?php echo base_url('article').'/'.$index['slug'];?>"><i class="fa fa-twitter fa-2x" style="color:#337ab7;"></i></a>
			<a href="https://plus.google.com/share?url=<?php echo base_url('article').'/'.$index['slug'];?>"><i class="fa fa-google-plus-square fa-2x" style="color:red;"></i></a>
		</div>

<div id="article_full" style="margin-top: 25px;">
	<?php
     echo $index['content'];
      ?>

</div>
	<?php endforeach; ?>
	</div>
	
<div class="container">
            <div class="row">
                    <div class="col-md-12">
                         
                         <h3>Post Comments</h3>
                         <a class="btn btn-primary btn-xs pull-right" id="commentcontrol">Hide Comments</a>
<hr>
                         <div id="comments">
                         
                         </div>
                      
                    </div>
            </div>
         
            <div class="col-md-6">
                    <div class="well">
                            <h4> Your comment </h4>
                        <form action="" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="news_id" id="news_id" value="<?php echo $index['postID']; ?>" />
                            <label><?php echo form_error('name'); ?></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo $this->session->userdata('site_user')=='' ? set_value('name') : $this->session->userdata('site_user');?>" />
                            <label><?php echo form_error('email'); ?></label>
                            <input type="text" name="email" placeholder="Email Address" class="form-control" value="<?php echo set_value('email'); ?>"/>
                            <label><?php echo form_error('comment');?></label>
                            <textarea class="form-control" placeholder="Your comment (500 characters only)" name="comment"><?php echo set_value('comment'); ?></textarea>
                            
                            <br>
                            <div class="alert alert-info"><i class="fa fa-info"></i> Your comment will be checked first by administrator before it will appear in this section</div>
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Submit Comment</button>
                        </form>
                    </div>
            </div>
            
        </div>
	
	
		<div style="text-align: center;"><?php echo $this->pagination->create_links(); ?></div>
	</div>

</div>
      
      <script type="text/javascript">

    $(document).ready(function(){

         var newsID = $("#news_id").val();
         $(set_base_url("<?php echo base_url(); ?>"));
         $(loadComments(newsID));


         //hide/show div for comments button
         $('#commentcontrol').click(function(){

          if($(this).html()=='Hide Comments'){
            $('#comments').hide();
            $(this).html("Show Comments");
          }else{
                $('#comments').show();
            $(this).html("Hide Comments");
          }

         });

    });



  function loadComments(news_id){
  
  $.ajax({
    url: "<?php echo base_url('home/loadcomments'); ?>",
    data: 'newsID='+news_id,
    type: 'POST',
    success:function(response){
      $("#comments").html(response);
    }
  });
}


      </script>