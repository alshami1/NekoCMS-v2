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
  <div class="container-fluid" style="margin-top: 90px;">
            <div class="side-body">
               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title">Add Page Category</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <?php echo validation_errors();?>
                            <?php
                            	if($this->session->flashdata('addpagecategory_ok')!=''){
                            		echo "<div class='alert alert-success'>".$this->session->flashdata('addpagecategory_ok')."</div>";
                            	}
                            ?>
                            <form action="" method="POST" accept-charset="utf-8">
   							<label>Page Categoy Name : </label>
   							<input type="text" name="page_category_name" id="page_category_name" class="form-control" />
   							<label>Parent Page : </label>
   							<select name="cb_parentpage" class="form-control">
   								<option value="">-</option>
   								<?php foreach($parent_pages as $parentpages): ?>
   									<option value="<?php echo $parentpages['pageID']; ?>"><?php echo $parentpages['page_name']; ?></option>
   								<?php endforeach;?>

   							</select>
   							<button type="submit" class="btn btn-primary btn-sm" style="margin-top: 20px;"><i class="fa fa-plus-square"></i> Add Page Category</button>
   							</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

