<!-- <div class="navbar navbar-fixed-top">
  <div class="header-backend navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">Doni Sepatu Online</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active"><a href="#">&nbsp;</a></li>
          <li><a href="#about">&nbsp;</a></li>
          <li><a href="#contact">&nbsp;</a></li>
        </ul>
      </div>
    </div>
  </div>
</div> -->
<?php
  $nav_val = $this->uri->segment(1);
  $nav_val3 = $this->uri->segment(3);
  $status_pembayaran = $this->sell_model->find(array("status_pembayaran" => "blom"));
  $count_sp=count($status_pembayaran);
?>
<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
  <div class="container-fluid">
    <a class="brand" href="#">Mag N Shoes | Admin Site</a>
    <div class="nav-collapse">
      <ul class="nav">
        <li class="active">
          <a href="<?=base_url("backend")?>">Dashboard</a>
        </li>
        <li class="active">
          <a class="notifikasi_penjualan" >Penjualan &nbsp;
            <?=(empty($count_sp) ? "&nbsp;" : '<span class="badge badge-success">'.$count_sp.'</span> '); ?>
          </a>
        </li>
      </ul>
      <p class="navbar-text pull-right"> Logged in as <a href="#"><?=$this->session->userdata('user_login')?> </a> | <a href="<?=base_url("login_backend/logout")?>">Logout</a></p>
    </div>
  </div>
  <div class="subnav subnav-fixed new-subnav-fixed">
    <ul class="nav nav-pills">
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            Master User
            <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li <?=($nav_val == "groups") ? "class='active'" : ""; ?>>
                  <a href="<?=base_url("groups")?>">Groups</a>
                </li>
                <li <?php echo ($nav_val == "users") ? "class='active'" : ""; ?>>
                  <a href="<?=base_url("users")?>">Users</a>
                </li>
                <li><a href="#">Web Konfigurasi</a></li>
                <li <?php echo ($nav_val == "members") ? "class='active'" : ""; ?>>
                  <a href="<?=base_url("members")?>">Member</a>
                </li>
            </ul>
        </li>
        <li class="dropdown" id="menu1">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
            Pages
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li <?=($nav_val3 == "aboutus") ? "class='active'" : ""; ?>>
              <a href="<?=base_url("pages/index/aboutus")?>">About Us</a>
            </li>
            <li <?=($nav_val3 == "delivery") ? "class='active'" : ""; ?>>
              <a href="<?=base_url("pages/index/delivery")?>">Delivery</a>
            </li>
            <li <?=($nav_val3 == "payment") ? "class='active'" : ""; ?>>
              <a href="<?=base_url("pages/index/payment")?>">Payment</a>
            </li>
            <li class="divider"></li>
            <li <?=($nav_val3 == "TransferPage") ? "class='active'" : ""; ?>>
              <a href="<?=base_url("pages/index/TransferPage")?>">Cara Pembayaran</a>
            </li>
            <li <?=($nav_val3 == "cara_anggota") ? "class='active'" : ""; ?>>
              <a href="<?=base_url("pages/index/cara_anggota")?>">Cara Menjadi Anggota</a>
            </li>
            <li <?=($nav_val3 == "pemesanan_online") ? "class='active'" : ""; ?>>
              <a href="<?=base_url("pages/index/pemesanan_online")?>">Cara konfirmasi Pengiriman</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              Data Master<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li <?php echo ($nav_val == "agama") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("agama")?>">Master Agama</a>
              </li>
              <li <?php echo ($nav_val == "propinsi") ? "class='active'" : ""; ?>> 
                <a href="<?=base_url("propinsi")?>">Master Propinsi</a>
              </li>
              <li <?php echo ($nav_val == "kota") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("kota")?>">Master Kota/Kab</a>
              </li>
              <li <?php echo ($nav_val == "kecamatan") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("kecamatan")?>">Master Kecamatan</a>
              </li>
              <li <?php echo ($nav_val == "kelurahan") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("kelurahan")?>">Master Kelurahan</a>
              </li>
              <li class="divider"></li>
              <li <?php echo ($nav_val == "vendors") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("vendors")?>">Vendor Pengiriman</a>
              </li>
              <li <?php echo ($nav_val == "fares") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("fares")?>">Tarif Pengiriman</a>
              </li>
            </ul>
        </li>
         <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              Data Produk<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li <?php echo ($nav_val == "categories") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("categories")?>">Categories</a>
              </li>
              <li <?php echo ($nav_val == "products") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("products")?>">Products</a>
              </li>
              <li <?php echo ($nav_val == "discounts") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("discounts")?>">Diskon</a>
              </li>
              <li <?php echo ($nav_val == "price_lists") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("price_lists")?>">Daftar Harga</a>
              </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              Data Penjualan<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li <?php echo ($nav_val == "sells") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("sells")?>">Penjualan</a>
              </li>
              <li <?php echo ($nav_val == "pembayaran") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("pembayaran")?>">pembayaran</a>
              </li>
              <li <?php echo ($nav_val == "pengiriman") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("pengiriman")?>">pengiriman</a>
              </li>
               <li <?php echo ($nav_val == "pengiriman") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("pengiriman")?>">Retur</a>
              </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Report</a>
            <ul class="dropdown-menu">
              <li <?php echo ($nav_val == "penjualan") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("penjualan")?>">laporan Penjualan</a>
              </li>
              <li <?php echo ($nav_val == "pembayaran") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("pembayaran")?>">Laporan pembayaran</a>
              </li>
              <li <?php echo ($nav_val == "pengiriman") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("pengiriman")?>">Laporan pengiriman</a>
              </li>
              <li <?php echo ($nav_val == "pengiriman") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("pengiriman")?>">Laporan Stok</a>
              </li>
              <li <?php echo ($nav_val == "pengiriman") ? "class='active'" : ""; ?> >
                <a href="<?=base_url("pengiriman")?>">Laporan Retur</a>
              </li>
              <li class="divider"></li>
              <li <?php echo ($nav_val == "penjualan") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("penjualan")?>">Grafik Penjualan</a>
              </li>
              <li <?php echo ($nav_val == "pemesanan") ? "class='active'" : ""; ?>>
                <a href="<?=base_url("pemesanan")?>">Grafik Stok</a>
              </li>
            </ul>
        </li>
    </ul>
  </div>
  </div> 
</div>