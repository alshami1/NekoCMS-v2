<?php
defined('BASEPATH') or exit('Error!');


/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
?>
<?php 
echo validation_errors(); 
	if($this->session->flashdata('addcategory_ok')!=''){
		echo "<div class='alert alert-success'>".$this->session->flashdata('addcategory_ok')."</div>";
	}
?>
<form action="" method="POST" accept-charset="utf-8">
<label>Category Name</label>
<input type="text" name="page_category" id="page_category" class="form-control">
<label>Parent Page</label>
<select class="form-control" name="page_list">
	<option value="">Select Parent Page</option>
	<?php foreach($parent_pages as $index): ?>
		<option value="<?php echo $index['pageID'];?>"><?php echo $index['page_name'];?></option>
	<?php endforeach; ?>
</select>
<button type="submit" id="btn_addcategory" name="btn_addcategory" class="btn btn-primary btn-sm"> Add Category</button>

</form>