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
                                    <div class="title">Inbox</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <?php
                               if($this->session->flashdata('msgdelete_success')!=''){
									echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('msgdelete_success')."</div>";
								}
                            ?>
						<?php echo $this->pagination->create_links(); ?>
							<div class="table-responsive">
								<table class="table table-condensed" id="msgTable">
									<thead>
									<tr>
										<th> No. </th>
										<th> From </th>
										<th> Email </th>
										<th> IP Address </th>
										<th> Date Recieved </th>
										<th> Message Status </th>
										<th> Actions </th>
									</tr>
									</thead>

								<?php
									foreach($message_list as $messageLists):
										
										echo "<tr>";
										echo "<td id='msgID'>".$messageLists['msgID']."</td>";
										echo "<td>".$messageLists['from']."</td>";
										echo "<td><a href='mailto:".$messageLists['visitor_email']."'>$messageLists[visitor_email]</a></td>";
										echo "<td>".$messageLists['ip_address']."&nbsp; <a target='_blank' href='http://whatismyipaddress.com/ip/$messageLists[ip_address]'>IP Address Info</a></td>";
										echo "<td>".date('F j, Y',strtotime($messageLists['date_recieved']))."</td>";
                                        if($messageLists['is_read']!=='N'){
										echo "<td> <span class='label label-success'>Read</span></td>";
									}else{
										echo "<td> <span class='label label-warning'>Unread</span></td>";
									}
										echo "<td><a  data-id='$messageLists[msgID]' title='' class='deletemsg' href='#'><span class='glyphicon glyphicon-trash'></span> Delete</a> | <a id='viewMsg' href='".base_url()."admin/showmessage/$messageLists[msgID]'><span class='glyphicon glyphicon-zoom-in'></span> View</a></td>";
										echo "</tr>";
									 endforeach ?>
								
								</table>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>