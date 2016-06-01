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


<label id="error" style="color:red; text-align: center;"></label>
<br>
<input type="text" style="display: none;" id="categID" value="<?php echo $category_to_move; ?>" />
<label>Move category to:</label>
<select class="form-control" id="parent_pages" name="parent_pages">
	<option value="">Select Parent Page</option>
	<?php foreach($parent_pages as $index): ?>
		<option value="<?php echo $index['pageID']; ?>"><?php echo $index['page_name']; ?></option>
	<?php endforeach; ?>
</select>

<button id="move_categ_btn" class="btn btn-primary btn-sm"><i class="fa fa-mail-forward"></i> Move</button>
	
<script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.min.js');?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
			
			$("#move_categ_btn").click(function(){
				var cbValue = $('#parent_pages').val();

				if(cbValue===""){
					$("#error").html("Please select category.");
				}else{
					$.ajax({
						url: "<?php echo base_url('admin/admin_ajax/move_category_parent');?>",
						type: "POST",
						data: "categ_id="+$("#categID").val()+"&destination="+cbValue,
						success:function(response){
							if(response==1){
								window.location = "<?php echo base_url('admin/categories');?>";
							}
						}		
					});

				}
		});
	});
</script>