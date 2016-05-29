
<?php
/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
?>


<input type="text" id="slug" name="slug" value="<?php echo $post_slug; ?>" style="display: none;" />

<label id="error" style="color:red; text-align: center;"></label>
<br>

<label>Move post to:</label>

<select id="categorylist" name="categorylist" class="form-control">
	<option value="">Select Category</option>
	<?php foreach($categories as $index):?>
		<option value="<?php echo $index['categ_ID'];?>"><?php echo $index['category_name']; ?></option>
	<?php endforeach; ?>
</select>

<button id="move_post_btn" class="btn btn-primary btn-sm"><i class="fa fa-mail-forward"></i> Move</button>
	
<script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.min.js');?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
			
			$("#move_post_btn").click(function(){
				var cbValue = $('#categorylist').val();

				if(cbValue===""){
					$("#error").html("Please select category.");
				}else{
					$.ajax({
						url: "<?php echo base_url('admin/admin_ajax/move_post_category');?>",
						type: "POST",
						data: "slug="+$("#slug").val()+"&destination="+cbValue,
						success:function(response){
							if(response==1){
								window.location = "<?php echo base_url('admin/blog-post');?>";
							}
						}		
					});

				}
		});
	});
</script>