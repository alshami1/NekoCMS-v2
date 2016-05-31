<?
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
                                    <div class="title">Edit Page</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">

				<?php
                if(validation_errors()){
                echo "<div class='alert alert-danger' style='width:965px; height:85px;'><a class='close' data-dismiss='alert'>×</a>".validation_errors()."</div>"; 
                }
                ?>
					<form action="" method="POST" accept-charset="utf-8">
					<?php foreach($page_to_edit as $index): ?>
						<div class="form-group">
                            <label for="title">Page Name: </label>
                            <input type="text" name="txt_pagetitle" id="txt_pagetitle" class="form-control" style="height: 40px;font-size: 20px; font-weight: bold;"  value="<?php echo $index['page_name']; ?>" />
							
						</div>
					<?php endforeach; ?> 	
                        <button type="submit" name="btn_publish" class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> Update Page</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>  
