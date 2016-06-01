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


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">Neko CMS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          <?php foreach($pages as $page){?>
            <li class="dropdown">
              <a style="font-size: 12px; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $page['page_name'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">

              <?php foreach($this->pageslib->_getCategories($page['pageID']) as $c): 
                if($c['category_name']!==''){
              ?>

                <li><a  style="color:black;" href="<?php echo base_url('category').'/'.$c['categ_ID'];?>"><i class="fa fa-asterisk"></i> <?php echo $c['category_name'];?></a></li>

              <?php } endforeach;?>

              </ul>
            </li>


          <?php } ?>

          </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


     <header class="intro-header" style="background-image: <?php echo "url('".base_url('custom_css/home-bg.jpg')."')"; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Neko CMS !</h1>
                        <hr class="small">
                        <span class="subheading">A Simple Blog Using Neko CMS!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>