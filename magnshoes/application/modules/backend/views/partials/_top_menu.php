<!-- BEGIN #navbar -->
<div class="navbar" id="navbar">
<div class="navbar-inner">
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-user icon-white"></span>
  </a>
  <a class="brand" href="#">
    <img src="<?=$this->template->get_img_path();?>logo.png" height="50" width="230"></a>
  <div class="nav-collapse collapse">
    <!-- <form class="navbar-search pull-left" action="">
      <input type="text" class="search-query span2" placeholder="Search">
    </form> -->
    <ul class="nav pull-right">
      <li>
        <a href="#" class="notifikasi_penjualan" >
          <i class="glyphicon-cart-out icon-white"></i> 
          Penjualan 
          <span class="notify"><?=$partials_data["count_sp"]?></span>
        </a>
      </li>
      <li>
        <a href="#" class="notifikasi_retur">
          <i class="glyphicon-cart-in icon-white"></i> 
          Retur 
          <span class="notify"><?=$partials_data["count_retur"]?></span>
        </a>
      </li>
      <li>
        <a href="<?=base_url("login_backend/logout")?>">
          <i class="icon-off icon-white"></i> 
          logout
        </a>
      </li>
    </ul>
  </div>
  <div class="clearfix"></div>
</div>
<div class="breadcrumb">
  <div class="logged pull-right">
    <span>logged:</span> 
    <a href="#"> <?=$this->session->userdata('user_login')?> </a>
  </div>
  <ul>
    <li class="active">Dashboard</li>
  </ul>
</div>
</div> <!-- END #navbar -->