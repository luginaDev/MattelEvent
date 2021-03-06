<!-- LOGIN PAGE -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Doni Sepatu Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $this->template->get_css_path();?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo $this->template->get_css_path();?>bootstrap-responsive.css" rel="stylesheet">
    <script src="<?php echo $this->template->get_js_path();?>jquery.js"></script>
    <script src="<?php echo $this->template->get_js_path();?>bootstrap.js"></script>
    <script src="<?php echo $this->template->get_js_path();?>highcharts/js/highcharts.js"></script>
  <script src="<?php echo $this->template->get_js_path();?>highcharts/js/modules/exporting.js"></script>
  <script src="<?php echo $this->template->get_js_path();?>application.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Doni Sepatu Online</a>
          <div class="nav-collapse">
            <ul class="nav">
              <!-- <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li> -->
            </ul>
            <!-- <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p> -->
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">

       <!--  <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div>
        </div>-->
        <?php 
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        ?>
        <?php if(!empty($success)) { ?>
        <div class="alert alert-success">
          <p><span class="ico-text ico-alert-success"></span><?=$success?></p>
        </div>
        <?php } ?>
        <?php if(!empty($error)) { ?>
        <div class="alert alert-error">
          <p><span class="ico-text ico-alert-error"></span><?=$error?></p>
        </div>
        <?php } ?>
        <?php  echo $template['body']; ?>
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->
    
      

  </body>
</html>
