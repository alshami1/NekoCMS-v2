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
                                    <div class="title">View Message</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
								 <div style='text-align: center;'> </div>
								<a href="<?php echo base_url('admin/inbox');?>" style="margin-bottom: 20px;" class="btn btn-primary btn-sm"> Inbox</a>
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-primary">
											<div class="panel-heading">Message:</div>
												<div class="panel-body">
													<div class="col-md-6">
														<strong><span class='glyphicon glyphicon-comment'></span> From: <?php echo $msg_content['from']; ?><strong> <br />
															<strong><span class='glyphicon glyphicon-time'></span> Date recieved: </strong><?php echo date('F  j, Y',strtotime($msg_content['date_recieved'])); ?>
														<br />
															<strong><span class='glyphicon glyphicon-info'></span> IP Address: </strong><?php echo $msg_content['ip_address']; ?>
														<br />
														<br />
															<p> <?php echo $msg_content['body']; ?></p>
													</div>
												</div>
											</div><!-- /.col-->
									</div><!-- /.row -->
								</div><!--/.main-->
							
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	