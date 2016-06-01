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

?>		<script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.min.js');?>"></script>
	      <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/bootstrap.min.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/Chart.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/bootstrap-switch.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.matchHeight-min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.dataTables.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/dataTables.bootstrap.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/select2.full.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/ace/ace.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/ace/mode-html.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/ace/theme-github.js');?>"></script>
            <!-- Javascript -->
            <script type="text/javascript" src="<?php echo base_url('assets/js/nekocms.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/bootbox.js'); ?>"></script>  
            <script type="text/javascript" src="<?php echo base_url('flatv2/js/app.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/js/index.js');?>"></script>

            <!-- Initialize Base URL DO NOT REMOVE or else your ajax requests will not work!-->
            <script type="text/javascript">
                set_base_url("<?php echo base_url(); ?>");
            </script>


            <?php
            $current_uri_segment = $this->uri->segment(2);

            if($current_uri_segment=='write-blog'){?>
             <script type="text/javascript" src="<?php echo base_url('assets/js/tinymce.min.js');?>"></script>
              <script type="text/javascript">
              tinymce.init({
          selector: 'textarea',
          height: 250,
          theme: 'modern',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
          ],
          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview media | forecolor backcolor emoticons',
          image_advtab: true,
          templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
          ],
          content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
          ]
         });
        </script>



            <?php }
              if($current_uri_segment=='parent-pages'){
            ?>
              <script type="text/javascript">
                
                $('#tbl_pages').DataTable();

                $(document).on('click','.deleteparentpage',function(){
                  var page_id  = this.dataset.pageid;

                    bootbox.confirm('Are you sure you want to delete this parent page?',function(x){
                      
                      if(x==true){
                        $.ajax({
                          url: "<?php echo base_url('admin/admin_ajax/remove_parent_page'); ?>",
                          method: "POST",
                          data: "parent_page_id="+page_id,
                          succes:function(response){
                            console.log(response);
                          }
                        });
                      }

                    });
                });

              </script>


            <?php } if($current_uri_segment=='user-list'){?>
                <script type="text/javascript">
                  $('#tbl_users').DataTable();
                </script>


            <?php } if($current_uri_segment=='categories'){?>
                  <script type="text/javascript">
                    $('#tbl_categories').DataTable();

                    $(document).on('click','.movecategory',function(){
                       var category_id = this.dataset.categid;

                       $.ajax({
                          url: "<?php echo base_url('admin/admin_ajax/show_movecategory_box'); ?>",
                          data: "categ_id="+category_id,
                          type: "POST",
                          success:function(response){
                            popUp = bootbox.dialog({
                              message: ' ',
                              title: 'Move category to new parent page',
                              size: 'small',
                              onEscape:function(){

                              }

                            });
                             popUp.contents().find('.bootbox-body').html(response);
                          }
                       });

                    });

                  </script>
            <?php }?>


            <?php if($current_uri_segment=='blog-post'){ ?>

<script type="text/javascript">

                  $('#tbl_posts').DataTable();
                  
                  $(document).on('click','.move_post',function(){
                      
                      $.ajax({
                        url: "<?php echo base_url('admin/admin_ajax/show_movepost_category_box');?>",
                        type: "POST",
                        data: "slug="+this.dataset.postslug,
                        success:function(response){
                          popUp = bootbox.dialog({
                            message: ' ',
                            title: 'Move post to other category',
                            size: 'small',
                            onEscape:function(){

                            }
                          });
                          popUp.contents().find('.bootbox-body').html(response);
                        }

                      });
                  });

                  $(document).on('click','.delete_post',function(){

                    var postID = this.dataset.postid;

                    bootbox.confirm("Are you sure you want to delete this post?",function(x){
                      if(x==true){

                      $.ajax({
                          url: "<?php echo base_url('admin/admin_ajax/deletepost');?>",
                          data: "post_id="+postID,
                          type: "POST",
                          success:function(response){

                              if(response==1){
                                window.location = "<?php echo base_url('admin/blog-post');?>";
                              }
                              if(response=='not-authorized'){
                                bootbox.alert('Unable to delete this post.');
                              }
                          }
                      });

                    }

                    });


                  });

</script>
            <?php } if($current_uri_segment=='frontend-themes'){?>
                <script type="text/javascript">
                  $('#tbl_themes').DataTable();

                  $(document).on('click','.activate_theme',function(){
                      var theme_name = this.dataset.themepackage;

                      bootbox.confirm('Activate this theme?',function(x){
                        if(x==true){
                          $.ajax({
                              url: "<?php echo base_url('admin/admin_ajax/activate_theme'); ?>",
                              data: "theme="+theme_name,
                              type: "POST",
                              success:function(response){
                                if(response==1){
                                  window.location = "<?php echo base_url('admin/frontend-themes'); ?>";
                                }
                              }
                          });
                        }
                      });
                  });

                  $(document).on('click','.deactivate_theme',function(){

                        var theme_name = this.dataset.themepackage;
                        
                      bootbox.confirm('Deactivate this theme?',function(x){
                          if(x==true){
                          $.ajax({
                              url: "<?php echo base_url('admin/admin_ajax/deactivate_theme'); ?>",
                              data: "theme="+theme_name,
                              type: "POST",
                              success:function(response){
                                if(response==1){
                                  window.location = "<?php echo base_url('admin/frontend-themes'); ?>";
                                }
                              }
                          });
                          }
                      });
                  });
                </script>

            <?php }?>

	</body>
</html>
