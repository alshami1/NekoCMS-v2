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
                                    <div class="title">Parent Pages</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <div id='add_page_ajax_messages' style='text-align: center;'> </div>
                            <a id="add_page" style="margin-bottom: 20px;" class="btn btn-primary btn-sm"> Add Page</a>

                            <div class="table-responsive">
                                  <table class="table table-condensed" id="tbl_pages">
                                  <thead>
                                        <tr>
                                          <th>ParentID</th>
                                          <th>Page Name</th>
                                         
                                          <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach($parent_pages as $index): ?>
                                                <tr>
                                                <td> <?php echo $index['pageID']; ?> </td>
                                                <td> <?php echo $index['page_name']; ?> </td>
                                               
                                                <td>
                                                    <a href="<?php echo base_url('admin/edit-page').'/'.$index['page_slug'];?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i> Delete</a>
												</td>
                                                </tr>
                                                <?php endforeach;?>
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

