<!-- BEGIN #main-nav -->
<div class="navigation" id="main-nav">
  <ul class="nav">
    <li class="active">
      <a href="<?=base_url("backend")?>">
        <span class="label label-inverse">
          <i class="icon-home icon-white"></i>
        </span> Dashboard 
        <span class="badge badge-warning">30</span>
      </a>
    </li>

    <li>
      <a href="#" data-toggle="collapse" data-target="#setting">
        <span class="label label-inverse">
          <i class="icon-list icon-white"></i>
        </span> 
        Setting 
        <span class="badge badge-info">5</span>
      </a>
      <ul class="collapse out" id="setting">
        <?php if(in_array("groups",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "groups") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("groups")?>">Groups</a>
        </li>
        <?php } ?>

        <?php if(in_array("users",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "users") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("users")?>">Users</a>
        </li>
        <?php } ?>
        <?php if(in_array("settings",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li><a href="#">settings</a></li>
        <?php } ?>

        <?php if(in_array("members",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "members") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("members")?>">Member</a>
        </li>
        <?php } ?>

        <?php if(in_array("web_config",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "web_config") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("web_config")?>">Konfigurasi Web</a>
        </li>
         <li <?=($partials_data["nav_val"] == "backup") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("web_config/backup")?>">Backup</a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <li>
      <a href="#" data-toggle="collapse" data-target="#pages">
        <span class="label label-inverse">
          <i class="icon-list icon-white"></i>
        </span> 
        Halaman 
        <span class="badge badge-info">7</span>
      </a>
      <ul class="collapse out" id="pages">
        <?php if(in_array("pages",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val3"] == "aboutus") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("pages/index/aboutus")?>">About Us</a>
        </li>
        <?php } ?>

        <?php if(in_array("pages",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val3"] == "delivery") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("pages/index/delivery")?>">Delivery</a>
        </li>
        <?php } ?>

        <?php if(in_array("pages",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val3"] == "payment") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("pages/index/payment")?>">Payment</a>
        </li>
        <?php } ?>

        <?php if(in_array("pages",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val3"] == "payment") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("pages/index/faq")?>">FAQ</a>
        </li>
        <?php } ?>
        <?php if(in_array("pages",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val3"] == "TransferPage") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("pages/index/TransferPage")?>">Cara Pembayaran</a>
        </li>
        <?php } ?>

        <?php if(in_array("pages",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val3"] == "cara_anggota") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("pages/index/cara_anggota")?>">Cara Menjadi Anggota</a>
        </li>
        <?php } ?>

        <?php if(in_array("pages",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val3"] == "pemesanan_online") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("pages/index/pemesanan_online")?>">Cara konfirmasi Pengiriman</a>
        </li>
        <?php } ?>
      </ul>
    </li>

    <li>
      <a href="#" data-toggle="collapse" data-target="#master">
        <span class="label label-inverse">
          <i class="icon-list icon-white"></i>
        </span> 
        Master 
        <span class="badge badge-info">6</span>
      </a>
      <ul class="collapse out" id="master">
       <?php if(in_array("agama",$partials_data["roles"][$partials_data["group"]])){ ?>
       <!-- <li <?=($partials_data["nav_val"] == "agama") ? "class='active'" : ""; ?>> -->
        <!-- <a href="<?=base_url("agama")?>">Master Agama</a> -->
      <!-- </li> -->
      <?php } ?>

      <?php if(in_array("propinsi",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "propinsi") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("propinsi")?>">Master Propinsi</a>
      </li>
      <?php } ?>

      <?php if(in_array("kota",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "kota") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("kota")?>">Master Kota/Kab</a>
      </li>
      <?php } ?>

      <?php if(in_array("kecamatan",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "kecamatan") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("kecamatan")?>">Master Kecamatan</a>
      </li>
      <?php } ?>

      <?php if(in_array("kelurahan",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "kelurahan") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("kelurahan")?>">Master Kelurahan</a>
      </li>
      <?php } ?>

      <li class="divider"></li>
      <?php if(in_array("vendors",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "vendors") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("vendors")?>">Vendor Pengiriman</a>
      </li>
      <?php } ?>

      <?php if(in_array("fares",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "fares") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("fares")?>">Tarif Pengiriman</a>
      </li>
      <?php } ?>
      </ul>
    </li>

    <li>
      <a href="#" data-toggle="collapse" data-target="#products">
        <span class="label label-inverse">
          <i class="icon-list icon-white"></i>
        </span> 
        Produk 
        <span class="badge badge-info">4</span>
      </a>
      <ul class="collapse out" id="products">
        <?php if(in_array("categories",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "categories") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("categories")?>">Kategori</a>
        </li>
        <?php } ?>
        <?php if(in_array("products",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "products") ? "class='active'" : ""; ?>>
          <a href="<?=base_url("products")?>">Produk</a>
        </li>
        <?php } ?>
        <?php if(in_array("discounts",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "discounts") ? "class='active'" : ""; ?> >
          <a href="<?=base_url("discounts")?>">Diskon</a>
        </li>
        <?php } ?>
        <?php if(in_array("price_lists",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "price_lists") ? "class='active'" : ""; ?> >
          <a href="<?=base_url("price_lists")?>">Daftar Harga</a>
        </li>
        <?php } ?>
      </ul>
    </li>

    <li>
      <a href="#" data-toggle="collapse" data-target="#selling">
        <span class="label label-inverse">
          <i class="icon-list icon-white"></i>
        </span> 
        Penjualan 
        <span class="badge badge-info">4</span>
      </a>
      <ul class="collapse out" id="selling">
        <?php if(in_array("sells",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "sells") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("sells")?>">Penjualan</a>
      </li>
      <?php } ?>
      <?php if(in_array("payments",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "payments") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("payments")?>">pembayaran</a>
      </li>
      <?php } ?>
      <?php if(in_array("delivers",$partials_data["roles"][$partials_data["group"]])){ ?>
      <li <?=($partials_data["nav_val"] == "delivers") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("delivers")?>">pengiriman</a>
      </li>
      <?php } ?>
      <?php if(in_array("returns",$partials_data["roles"][$partials_data["group"]])){ ?>
       <li <?=($partials_data["nav_val"] == "returns") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("returns")?>">Retur</a>
      </li>
      <?php } ?>
      </ul>
    </li>

    <li>
      <a href="#" data-toggle="collapse" data-target="#report">
        <span class="label label-inverse">
          <i class="icon-list icon-white"></i>
        </span> 
        Laporan 
        <span class="badge badge-info">4</span>
      </a>
      <ul class="collapse out" id="report">
        <?php if(in_array("penjualan",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "penjualan") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("reports/sell_report")?>">penjualan</a>
        </li>
        <?php } ?>

        <?php if(in_array("pengiriman",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "pengiriman") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("reports/deliver_reports")?>">pengiriman</a>
        </li>
        <?php } ?>
        <?php if(in_array("penjualan",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "penjualan") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("reports/stok_reports")?>">Stok</a>
        </li>
        <?php } ?>
        <?php if(in_array("penjualan",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "penjualan") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("reports/return_reports")?>">retur</a>
        </li>
        <?php } ?>
        <?php if(in_array("penjualan",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "penjualan") ? "class='active'" : ""; ?> >
        <!--<a href="<?=base_url("penjualan")?>">Grafik penjualan</a> -->
        </li>
        <?php } ?>
        <?php if(in_array("penjualan",$partials_data["roles"][$partials_data["group"]])){ ?>
        <li <?=($partials_data["nav_val"] == "penjualan") ? "class='active'" : ""; ?> >
        <!--<a href="<?=base_url("penjualan")?>">grafik stok</a>-->
        </li>
        <?php } ?>
      </ul>
    </li>
  </ul>
</div> 
<!-- END #main-nav -->