
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Magnshoes Admin Panel </title>
  <link rel="stylesheet" type="text/css" media="screen" href="<?=$this->template->get_css_path();?>glyphicons.all.css" />
  <style type="text/css" title="currentStyle">
      @import "<?=base_url('assets/js/DataTables-1.9.0/media/css/demo_page.css');?>";
      @import "<?=base_url('assets/js/DataTables-1.9.0/media/css/demo_table.css');?>";
      @import "<?=base_url('assets/js/DataTables-1.9.0/media/css/TableTools.css');?>";
      #example_wrapper .row {
        margin-left: 0 !important;
      }
      #demo {
        padding: 10px;
      }
    </style>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>jquery-1.7.2.min.js"></script>
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
  <script type="text/javascript" src="<?=base_url("assets/js/highcharts/js/highcharts.js");?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/js/highcharts/js/modules/exporting.js");?>"></script>
  <script type="text/javascript" charset="utf-8" src="<?=base_url('assets/media/js/ZeroClipboard.js');?>"></script>
  <script src="<?=base_url("assets/js/bootstrap-datepicker.js")?>"></script>
  <script src="<?=base_url("assets/js/jquery.printElement.min.js")?>"></script>

  <link rel="stylesheet" type="text/css" media="screen" href="<?=$this->template->get_css_path();?>bootstrap.css" />
 <script src="<?=base_url("assets/js/jquery.validate.js");?>"></script>
 <script type="text/javascript" charset="utf-8" src="<?=base_url('assets/js/DataTables-1.9.0/media/js/jquery.dataTables.js');?>"></script>
 <script type="text/javascript" charset="utf-8" src="<?=base_url("assets/js/dataTables.bootstrap.js")?>"></script>

  <script type="text/javascript" src="<?=base_url("assets/js/uploadify-v2.1.4/swfobject.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/js/uploadify-v2.1.4/jquery.uploadify.v2.1.4.js")?>"></script>
  <link href="<?=base_url("assets/js/uploadify-v2.1.4/uploadify.css")?>" rel="stylesheet" type="text/css" />
  <style type="text/css" title="currentStyle">
      /*@import "<?=$this->template->get_js_path();?>media/css/demo_page.css";*/
      /*@import "<?=$this->template->get_js_path();?>media/css/demo_table.css";*/
      /*@import "<?=$this->template->get_js_path();?>media/css/TableTools.css";*/
    </style>
  <script type="text/javascript" src="<?=$this->template->get_js_path();?>application.js"></script>
</head>
<body>
  <!-- <input type="hidden" id="base_url" value="<?=base_url()?>"/> -->
   <input type="hidden" id="base_url" value="<?=base_url()?>"/>
  <?=$template['partials']['top_menu']; ?>
  
  <!-- BEGIN #main -->
  <div class="main" id="main">
    <?=$template['partials']['left_menu']; ?>
    <!-- BEGIN #main-content -->
    <div class="content" id="main-content">
      <?=$template['partials']['error_message']; ?>
      <div class="row-fluid" id="main-content-row">
        <div class="span12" id="main-content-span">
          <?=$template['body']; ?>
        </div>
      </div>
    </div><!-- END #main-content -->
  </div><!-- END #main -->

  <!-- BEGIN #footer -->
  <div class="footer" id="footer">
    <ul>
      <li><a href="tables.html">Users</a></li>
      <li><a href="tables.html">Entries</a></li>
      <li><a href="404.html">Comments</a></li>
      <li><a href="images.html">Images</a></li>
      <li><a href="statistics.html">Stats</a></li>
      <li><a href="404.html">Security</a></li>
    </ul>
    <div class="clearfix"></div>
  </div> <!-- END #footer -->
<div class="modal" id="myModalPenjualan" style="display:none">
      <div class="modal-header">
      <a class="close" data-dismiss="modal">×</a>
      <h3>Nofikasi Penjualan</h3>
      </div>
      <div class="modal-body notifikasi_body">
        
      </div>
      <div class="modal-footer">

      </div>
    </div>
<div class="modal" id="myModalRetur" style="display:none"></div>
</body>
</html>