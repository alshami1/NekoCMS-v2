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
                                    <div class="title">Edit User</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <?php echo validation_errors(); ?>
                            

								<form action="" method="POST" accept-charset="utf-8" id="frm_adduser">

                                <?php foreach($user_info as $index):?>
								<label>Full Name</label>

								<input type="text" name="txt_user_fullname" id="txt_user_fullname" class="form-control" value="<?php echo $index['usrs_full_name'];?>" />

								<label>Username</label>
								<input class="form-control" name="txt_username" id="txt_username" value="<?php echo $index['usrs_username'];?>"/>
								<label>Email</label>
								<input class="form-control" name="txt_user_mail" id="txt_user_mail" value="<?php echo $index['usrs_email'];?>"/>

								<label>Password (Optional) </label>
								<input type="password" class="form-control" name="txt_user_password" id="txt_user_password" value="<?php echo set_value('');?>" />
								<label>Confirm Password</label>
								<input type="password" class="form-control" name="txt_user_password_cf" id="txt_user_password_cf" value="<?php echo set_value('');?>" />
								
                                <?php 
                                if($this->session->userdata('site_user_role')=='admin'){?>
                                <label>User Role</label>
								<select name="usr_role" class="form-control">
								<option value="">-Select Role-</option>
								<option value="admin">Admin</option>
								<option  value="writer">Writer</option>
								</select>
                                <?php }?>


								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update User</button>
                            <?php endforeach; ?>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>