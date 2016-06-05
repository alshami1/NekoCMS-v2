
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

$userData=$this->session->all_userdata();
?>
  <div class="container-fluid" style="margin-top: 90px;">
            <div class="side-body">
               
                <div class="row">
				
       
        
                        <div class="col-md-12">
						<div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title">Settings</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                       <?php
           if(validation_errors()){
           echo validation_errors();
           }
           if($this->session->flashdata('changes1')!=''){


            echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('changes1')."</div>";

           }
           ?>
                   <form id='defaultForm' method='POST' class='form-horizontal' action="<?php echo base_url('admin/site-settings');?>"  accept-charset="utf-8" enctype="multipart/form-data">

                   <div class='form-group'>
                       <div class='col-lg-12'>
                           <p><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Site Name *</p>
                           <?php foreach($site_title as $sitename):?>
                           <input value='<?php echo $sitename['configValue']; ?>'  id='txt_site_title' type='text' class='form-control' name='txt_site_title' placeholder='Site Title'/>
                         <?php endforeach; ?>
                       </div>
                   </div>

            <div class='form-group'>
                                   <div class='col-lg-12'>
                                       <p><span class='glyphicon glyphicon-use'></span>&nbsp; Site Owner *</p>
                                       <?php foreach($site_owner as $siteowner):?>
                                       <input value='<?php echo $siteowner['configValue']; ?>' id='txt_site_owner' type='text' class='form-control' name='txt_site_owner' placeholder='Site Owner'/>
                                     <?php endforeach; ?>
                                   </div>
			</div>

			<div class='form-group'>
                       <div class='col-lg-4'>
                           <p><span class='glyphicon glyphicon-tag'></span>&nbsp; Site Description *</p>
                            <?php foreach($site_meta as $sitemeta): ?>
                              <textarea style="" name="site_meta" placeholder="Add some description of your site" class="form-control"><?php echo $sitemeta['configValue'];?></textarea>
                            <?php endforeach; ?>
                       </div>
                   </div>

                      <div class='form-group'>
                       <div class='col-lg-4'>
                           <p><span class='glyphicon glyphicon-eye-open'></span>&nbsp; Site Meta Keywords (keywords must be separeted by comma) *</p>
                            <?php foreach($site_metakw as $sitemetakw): ?>
                              <textarea style="" name="site_metakw" placeholder="Add some meta keywords of your site" class="form-control"><?php echo $sitemetakw['configValue'];?></textarea>
                            <?php endforeach; ?>
                       </div>
                   </div>
					
					 <div class='form-group'>
                       <div class='col-lg-4'>
                           <p><span class='fa fa-reorder'></span>&nbsp;Footer Content *</p>
                            <?php foreach($footer as $fr): ?>
                              <textarea style="" name="site_footer" placeholder="Add some footer of your site" class="form-control"><?php echo $fr['configValue'];?></textarea>
                            <?php endforeach; ?>
                       </div>
                   </div>
                   

                   <div class='form-group'>
                    
                       <div class='col-lg-5'>

                        <br>
                        <button type='submit'  name='btn_publish' class='btn btn-success' style='font-weight: bold; font-size: 16px;'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong> Save Now </strong></button>

                       </div>
                   </div>
           </form>
		    </div>
       </div>
	   </div>

                
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->