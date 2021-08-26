<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
  <title><?=$template['title'];?></title>
  <meta name="description" content="magshoes">
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-41182490-1', 'magnshoes.com');
    ga('send', 'pageview');

  </script>
  <link href="image/favicon.png" rel="icon" />
  <link rel="stylesheet" type="text/css" href="<?=$this->template->get_css_path();?>stylesheet.css" />
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>jquery-1.6.1.min.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>tabs.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>jquery.prettyPhoto.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>labelify.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>jquery.colorbox.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>jquery.anythingslider.js"></script>
  <script type="text/javascript" src="<?=base_url("assets/js/jquery.validate.js");?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/js/jquery.message.min.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/js/star-rating/jquery.rating.js")?>"></script>
  <link rel="stylesheet" type="text/css" href="<?=base_url("assets/js/star-rating/jquery.rating.css")?>" />

  <link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/jquery.message.css")?>" />

<script type="text/javascript" src="<?=base_url('assets/js/jquery.realperson.package-1.0.1/jquery.realperson.js')?>"></script>

  <link rel="stylesheet" media="screen" type="text/css" href="<?=base_url("assets/css/ui-lightness/jquery-ui-1.10.3.custom.css")?>" />
  <script type="text/javascript" src="<?=base_url("assets/js/jquery-ui-1.10.3.custom.js")?>"></script>

  <style type="text/css">@import "<?=base_url('assets/js/jquery.realperson.package-1.0.1/jquery.realperson.css')?>" </style>

  <script type="text/javascript" src="<?=$this->template->get_js_path();?>application.js"></script>

</head>

<body class="common-home">
<input type="hidden" value="<?=$this->session->flashdata('message');?>" name="pesan" id="pesan">
<input type="hidden" value="<?=base_url()?>" name="base_url" id="base_url">

  <div class="main-shining">
    <p id="back-top" style="display: none; "> <a href="#"><span>
logo
    </span></a> </p>
    <?php  echo $template['partials']['header']; ?>
    <div id="container">
    <div id="notification">  </div>
    <div class="wrap-content">
      <div id="column-left">
        <?=$template['partials']['left_menu_category'];?>
        <?=$template['partials']['left_menu_terlaris'];?>
        <?=$template['partials']['left_menu_dilihat'];?>
        <?=$template['partials']['left_menu_terakhirdiliat'];?>
        <?=$template['partials']['shop_cart_info'];?>
        <?=$template['partials']['left_menu_tracking'];?>
      </div>

    <div id="content">
     <?php  echo $template['body']; ?>

    </div>
  </div>

</div>
<script type="text/javascript">
  <?php if($this->session->userdata("member_login")!=""){ ?> 
    <?php if($this->session->userdata("member_no_ktp") !="" || $this->session->userdata("member_alamat") =="" || $this->session->userdata("member_kelurahan_id") ==""){ ?> 
      // alert(1);
      $(document).ready(function(){
        $(".register").trigger("click");
      });
    <?php } ?>
  <?php } ?>
</script>

</body>
</html>