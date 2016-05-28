<?php
/*
*  NEKO SIMPLE CMS v1.0.3
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>"><i class='fa fa-paw'></i> NekoCMS </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php foreach($pages as $page){?>
            <li class="dropdown">
              <a style="font-size: 12px; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $page['page_name'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">

              <?php foreach($this->pageslib->_getCategories($page['pageID']) as $c): 
                if($c['category_name']!==''){
              ?>

                <li><a href="<?php echo base_url('category').'/'.$c['categ_ID'];?>"><i class="fa fa-asterisk"></i> <?php echo $c['category_name'];?></a></li>

              <?php } endforeach;?>

              </ul>
            </li>


          <?php } ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>