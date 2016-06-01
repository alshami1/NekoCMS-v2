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
                                    <div class="title">Page Categories</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <a href="<?php echo base_url('admin/add-page-category');?>" id="add_category" style="margin-bottom: 20px;" class="btn btn-primary btn-sm">Add Page Category</a>

                            <div class="table-responsive">
							<table class="table table-condensed table-hover table-stripped" id="tbl_categories">
						<thead>
							<th> CategoryID </th>
							<th> Category Slug</th>
							<th> Category Name </th>
							<th> Parent Page </th>
							<th> Options</th>
							
							
						</thead>
						<tbody>
							<?php  foreach($categories as $index): ?>
								<tr>
									
									<td><?php echo $index['categ_ID'];?></td>
									<td><?php echo $index['category_slug'];?></td>
									<td><?php echo $index['category_name'];?></td>
									<td><?php echo $index['parent_page'];?></td>
									<td>
										<a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
										<a href="" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Delete</a>
										<a class="btn btn-primary btn-sm movecategory" data-categid="<?php echo $index['categ_ID'];?>"><i class="fa fa-mail-forward"></i> Move</a>
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

