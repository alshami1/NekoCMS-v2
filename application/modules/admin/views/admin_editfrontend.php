

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
  <div class="container-fluid" style="margin-top: 50px;">
            <div class="side-body">
                <div class="page-title">
                
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title">FrontEnd HTML Editor</div>
                                </div>
                               
                            </div>
                            <div class="card-body">

                            <p>Select file to edit: <a href="<?php echo base_url('admin/edit-frontend-html').'/'; ?>"> Header</a> | <a href="<?php echo base_url('admin/edit-frontend-html').'/navbar';?>"> Navbar </a> | <a href="<?php echo base_url('admin/edit-frontend-html/footer');?>"> Footer </a> | <a href="<?php echo base_url('admin/edit-frontend-html/article'); ?>"> Article</a> | <a href="<?php echo base_url('admin/edit-frontend-html/categorypost');?>"> Category Post </a> | <a href="<?php echo base_url('admin/edit-frontend-html/home');?>"> Home </a></p>

                            <?php
                              if($this->session->flashdata('frontend_edit_ok')!=''){
                                echo "<div class='alert alert-success'>".$this->session->flashdata('frontend_edit_ok')."</div>";
                              }else{

                              }

                            ?>
                         <strong style="color: red;"><i class="fa fa-warning fa-2x"></i>  Be careful in editing the  file. </strong>

                         <form action="" method="POST" accept-charset="utf-8">
                         <input typte="text" name="filetoedit" value="<?php echo $file_to_edit; ?>" style="display: none;"/>
                     	<textarea name="phpcontent" style="margin-top: 15px; color:blue;" class="form-control" cols="20" rows="15"><?php echo $file_contents; ?></textarea>
                     	<button type="submit" class="btn btn-sm btn-primary btn-block" style="margin-top: 10px;"><i class="fa fa-save"></i> Save</button>
                     	</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>