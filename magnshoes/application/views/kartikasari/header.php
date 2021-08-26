<?php $b = $this->config->item("base_url") . "/"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Kartikasari</title>

<link href="<?php echo $b ?>css/kartikasari.css" rel="stylesheet" type="text/css" />

<!--[if lte IE 7]>
<link href="css/patches/patch_my_layout.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo $b ?>js/jquery.js"></script>
<script src="<?php echo $b ?>js/booklet/jquery-ui-1.8.9.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.3&amp;sensor=false"></script>
<script type="text/javascript" src="<?php echo $b ?>js/jquery.jmapping-2.1.0/vendor/markermanager.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/jquery.jmapping-2.1.0/vendor/StyledMarker.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/jquery.jmapping-2.1.0/vendor/jquery.metadata.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/jquery.jmapping-2.1.0/jquery.jmapping.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/pikachoose/jquery.pikachoose.js"></script>
<link type="text/css" href="<?php echo $b ?>js/pikachoose/styles/bottom.css" rel="stylesheet" />
<script src="<?php echo $b ?>js/booklet/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo $b ?>js/booklet/jquery.booklet.1.2.0.min.js" type="text/javascript"></script>
<link href="<?php echo $b ?>js/booklet/jquery.booklet.1.2.0.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />

<script type="text/javascript" src="<?php echo $b ?>js/application.js"></script>

<!--<script type="text/javascript" src="<?php echo $b ?>js/galleryview-dev/js/jquery.galleryview-3.0-dev.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/galleryview-dev/js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/galleryview-dev/js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="<?php echo $b ?>js/galleriffic-2.0/js/jquery.galleriffic.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/galleriffic-2.0/js/jquery.opacityrollover.js"></script>
<script type="text/javascript" src="js/jquery.history.js"></script>
<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>


-->
<!-- CSS -->
<!-- <link href="<?php echo $b ?>js/galleryview-dev/css/jquery.galleryview-3.0-dev.css" rel="stylesheet" type="text/css" /> -
<link rel="stylesheet" href="<?php echo $b ?>js/galleriffic-2.0/css/galleriffic-2.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $b ?>js/galleriffic-2.0/css/white.css" type="text/css" />
->
<!-- MENU HORIZONTAL -->
<link href="<?php echo $b ?>css/menu_style.css" rel="stylesheet" type="text/css" />

</head>
<body>
  <div class="page_margins">
    <div class="page">
      <div id="header">
        <div class="image_wrapper">
      	  <img src="<?php echo $b ?>images/logo.png" alt="" width="200" align="middle" style="margin: 20px auto;"/>
        </div>
      	<div id="headernav">
      		<a href="<?php echo $b . "kartikasari/home" ?>">Home</a> |
      		<a href="#">Indonesia</a> |
      		<a href="#">English</a>
      	</div>
      </div>
      <div id="main">
      <div class="menu">
        <ul>
    			<li><a href="<?php echo $b . "kartikasari/home" ?>">Home</a></li>
    			<li><a href="<?php echo $b . "kartikasari/aboutus" ?>">Tentang Kami</a></li>
    			<li><a href="<?php echo $b . "kartikasari/products" ?>">Produk</a></li>
    			<li><a href="<?php echo $b . "kartikasari/specialhampers" ?>">Special Hampers</a></li>
    			<li><a href="<?php echo $b . "kartikasari/location" ?>">Lokasi</a></li>
    		  <li><a href="<?php echo $b . "kartikasari/careerpages" ?>">Karir</a></li>
    			<li><a href="<?php echo $this->config->item("kartikasaristore_url"); ?>" target="_blank">Online Store</a></li>
    		</ul>
			</div>
			<div class="separator"></div>
	

      