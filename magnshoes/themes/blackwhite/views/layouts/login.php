
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Magnshoes Admin Panel</title>
  <link rel="stylesheet" type="text/css" media="screen" href="<?=$this->template->get_css_path();?>glyphicons.all.css" />

  <script type="text/javascript" src="<?=$this->template->get_js_path();?>jquery-1.7.2.min.js"></script>
  
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>flot/jquery.flot.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>flot/jquery.flot.resize.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-alert.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-button.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-carousel.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-collapse.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-dropdown.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-modal.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-tooltip.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-popover.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-scrollspy.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-tab.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-transition.js"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>bootstrap/bootstrap-typeahead.js"></script>

  <!-- Uncomment to use LESS The dynamic stylesheet language. | http://lesscss.org/ -->
  <!-- <link rel="stylesheet/less" type="text/css" href="<?=$this->template->get_css_path();?>main.less" /> -->
  <!-- <script type="text/javascript" src="<?=$this->template->get_js_path();?>less-1.3.0.min.js"></script> -->

  <!-- Uncomment to use CSS -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?=$this->template->get_css_path();?>bootstrap.css" />

  <!-- DEMO SCRIPTS -->
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>demo.js"></script>
</head>
<body>
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
  <div class="container login">
    <div class="row">
      <div class="span4 offset4">
        <div class="well">
        
        <?php  echo $template['body']; ?>
          <!-- -->
        </div> 
      </div>
    </div>
  </div>

</body>
</html>