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
                                    <div class="title">Edit Blog</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <?php echo validation_errors(); ?>

                            <form action="" method="POST" accept-charset="utf-8">


                            <?php foreach($blog as $index): ?>

                                <div class="form-group">
                                            <label for="title">Blog title: </label>
                                            <input type="text" name="title" id="title" class="form-control" style="height: 40px;font-size: 20px; font-weight: bold;"  value="<?php echo $index['title']; ?>" />
                                </div>

                                
                                 <div class="form-group">
                                            <label for="content">Your content:</label>
                                            <textarea name="content" id="content"><?php echo $index['content'];?></textarea>
                                </div>
                            
                            <?php endforeach; ?>

                            <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> Update Blog</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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