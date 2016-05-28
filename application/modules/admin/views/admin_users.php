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
                                    <div class="title">End Users</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <a href="<?php echo base_url('admin/add-user'); ?>" class="btn btn-primary btn-sm">Add User</a>

                            <div class="table-responsive">
							<table class="table table-condensed table-hover table-stripped" id="tbl_users">
						<thead>
							<th> # </th>
							<th> Username </th>
							<th> Name </th>
							<th> Email </th>
							<th> Role </th>
							<th> Date Added</th>
							<th> Last Logged</th>
							
						</thead>
						<tbody>
							<?php $c=1; foreach($users as $index): ?>
								<tr>
									<td><?php echo $c++; ?></td>
									<td><?php echo $index['usrs_username'];?></td>
									<td><?php echo $index['usrs_full_name'];?></td>
									<td><?php echo $index['usrs_email'];?></td>
									<td><?php echo $index['usrs_role'];?></td>
									<td><?php echo $index['usrs_date_added'];?></td>
									<td><?php echo $index['usrs_last_logged'];?></td>
								
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

