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
                                    <div class="title">Comments</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">

                            <div class="table-responsive">
                                  <table class="table table-condensed" id="tbl_users_comments">
                                  <thead>
                                        <tr>
											<th> # </th>
											<th> Name </th>
											<th> Email </th>
											<th> Comment on </th>
											<th> Date Commented </th>
											<th> Is Aprroved? </th>
											<th> Options </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($comments as $list): ?>
                                                <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $list['name'];?></td>
                                                <td><?php echo $list['email'];?></td>
                                                <td><?php echo $list['title']; ?></td>
                                                <td><?php echo date('F j, Y',strtotime($list['comment_date']));?></td>
                                                
                                                <td>
                                                <?php 
                                                    if($list['is_approved']==0){
                                                        echo "<label class='label label-warning'>Waiting for Approval</label>";
                                                    }else{
                                                        echo "<label class='label label-success'> Approved Comment</label>";
                                                    }
                                                ?>

                                                </td>

                                                <td>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="Approve this comment" class="approvecomment btn btn-success"><i class="fa fa-check"></i></a>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="Disapprove this comment" class="disapprovecomment btn btn-warning"><i class="fa fa-times"></i></a>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="View comment" class="viewcomment btn btn-primary"><i class="fa fa-search"></i></a>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="Delete this comment permanently" class="deletecomment btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        </tbody>
                                  </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	
