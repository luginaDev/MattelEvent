<html >
<head>
  <title> Backend | Dasboard </title>
  <link href="<?=$this->template->get_css_path();?>bootstrap.css" rel="stylesheet">
    <link href="<?=$this->template->get_css_path();?>bootstrap-responsive.css" rel="stylesheet">
  <link href="<?=$this->template->get_css_path();?>application.css" rel="stylesheet">
    <script src="<?=$this->template->get_js_path();?>jquery.js"></script>
    <script src="<?=$this->template->get_js_path();?>bootstrap.js"></script>
    <script src="<?=$this->template->get_js_path();?>highcharts/js/highcharts.js"></script>
  <script src="<?=$this->template->get_js_path();?>highcharts/js/modules/exporting.js"></script>
  <script type="text/javascript" charset="utf-8" src="<?=base_url('assets/js/DataTables-1.9.0/media/js/jquery.dataTables.js');?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/uploadify-v2.1.4/swfobject.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/uploadify-v2.1.4/jquery.uploadify.v2.1.4.js")?>"></script>
<link href="<?=base_url("assets/js/uploadify-v2.1.4/uploadify.css")?>" rel="stylesheet" type="text/css" />

 
  <link href="<?=base_url("assets/css/datepicker.less")?>" rel="stylesheet" type="text/css" />
  <link href="<?=base_url("assets/css/datepicker.css")?>" rel="stylesheet" type="text/css" />
  <script src="<?=base_url("assets/js/bootstrap-datepicker.js")?>"></script>
  <script type="text/javascript" src="<?=$this->template->get_js_path()."tinymce/jscripts/tiny_mce/jquery.tinymce.js";?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/js/jquery.validate.js");?>"></script>
<script src="<?=$this->template->get_js_path();?>application.js"></script>
  <script>
    $(document).ready(function(){
      $('.dropdown-toggle').dropdown();
    })
  </script>
  <style type="text/css">
      body {
        padding-top: 120px;
        padding-bottom: 40px;
      }
      
    </style>
</head>
<body>

 <!-- #### HEADER ### -->
<?=$template['partials']['top_menu'];?>
 <!-- #### END HEADER ### -->

  <div class="container-fluid">
    <!-- ### CONTENT ### -->
    <div class="row-fluid">
      <div class="span12 well">
        <div class="">
        <?php 
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        ?>
        <?php if(!empty($success)) { ?>
        <div class="alert alert-success">
          <button class="close" data-dismiss="alert">×</button>
          <p><span class="ico-text ico-alert-success"></span><?=$success?></p>
        </div>
        <?php } ?>
        <?php if(!empty($error)) { ?>
        <div class="alert alert-error">
          <button class="close" data-dismiss="alert">×</button>
          <p><span class="ico-text ico-alert-error"></span><?=$error?></p>
        </div>
        <?php } ?>
        <?=$template['body'];?>

    </div>
    </div>
    </div>
    <!-- ### END CONTENT ### -->
    
    <input type="hidden" id="base_url" value="<?=base_url()?>"/>

    <div class="modal" id="myModalPenjualan">
      <div class="modal-header">
      <a class="close" data-dismiss="modal">×</a>
      <h3>Nofikasi Penjualan</h3>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Tanggal</th>
              <th>Type Pembayaran</th>
              <th>Subtotal</th>
              <th>Total</th>
          </thead>
          <tbody class="notifikasi_body"></tbody>
        </table>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
    <!-- ### FOOTER ### -->
   <footer>
        <p>&copy; Company 2012</p>
   </footer>


    <!-- ### END FOOTER ### -->

  </div>

</body>
</html>