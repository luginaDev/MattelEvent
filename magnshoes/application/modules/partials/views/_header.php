<div class="row-1">
      <div id="header">
        <div id="logo">
          <a href="#">
            <img src="<?=$this->template->get_images_path();?>logo.png" alt="" height="83" width="256">
          </a>
        </div>
        <ul class="links">
          <!-- <li><a href="#" id="wishlist_total">Testimonial <span>(<?=count($cart)?>)</span></a></li> -->
          <?php if($this->session->userdata("member_login")!=""){?>
          <li><a href="#">Testimonial</a></li>
          <li><a href="<?=base_url("frontend/history_wish")?>">History Belanja</a></li>
          <li class="last"><a href="<?=base_url("frontend/checkout")?>">Keranjang Belanja</a></li>
          <?php } ?>
        </ul>
        <div id="cart">
          <a href="<?=base_url("frontend/checkout")?>">
          <div class="cart_inner">
            <div class="heading">
              <span class="sc-button"></span>
              <div class="right-bg">
                <div class="wrapper">
                 <h4>Shopping Cart</h4>
                 <span id="cart_total">
                  <strong>
                   <?php if($this->session->userdata("member_login")!=""){?>
                    <?=count($cart)?> barang</a>
                  <?php }else{ ?>
                    <?=$this->cart->total_items()?> barang</a>
                  <?php } ?>
                  </strong>
                </span>
                </div>
              </div>
            </div>

          </div>

          <div class="content" style="display: none; ">
            <div class="empty">
             <?php
              if($this->session->userdata("member_login")==""){
                $this->load->view("frontend/_cart_header_nonlog");
              }else{
                $this->load->view("frontend/_cart_header_log");
              }
             ?>


            </div>
          </div>
        </div>
        <div class="menu-bg">
          <ul class="main-menu">
            <li class="item-1">
              <a href="<?=base_url()?>">Home  </a>
            </li>
            <li class="<?php echo ($this->uri->segment(2)=="products") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/products")?>">Produk</a>
            </li>
            <!--<li class="item-1">
              <a href="<?=base_url("frontend/specials")?>">Specials</a>
            </li>-->
            <li class="<?php echo ($this->uri->segment(3)=="1") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/1")?>">Tentang Kami</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3)=="2") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/2")?>">Cara Pengiriman</a>
            </li>
            <!-- <li class="<?php echo ($this->uri->segment(3)=="3") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/3")?>">Privacy Policy</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3)=="4") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/4")?>">Terms &amp; Conditions</a> -->
            </li>

            <li class="<?php echo ($this->uri->segment(3)=="5") ? "first" : "item-7" ?>">
              <a href="<?=base_url("frontend/contactus")?>">Hubungi kami</a>
            </li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        
        <div class="search-back">
          <form method="post" action="<?=base_url("frontend/search_page")?>">
          <div id="search">
            <div class="button-search"><input type="submit" value="cari"/> cari</div>
            <span class="search-bg">
              <input type="text" name="keyword" title="Enter search keywords here" />
            </span>
          </div>
        </form>
        </div>
        <div id="welcome">Selamat Datang,
        <?php if($this->session->userdata('member_login')!=""){ ?>
            <a href ="<?=base_url("frontend/registrasi_member")?>" class="register">
              <?=$this->session->userdata('member_name')?>
            </a>
            <a href="<?=base_url("frontend/member_logout")?>" class="logout">logout</a>
        <?php }else{ ?>
           Anda dapat
            <a href="<?=base_url("frontend/checkout")?>" class="">login</a>
            atau
            <a class="register" href="<?=base_url("frontend/registrasi_member")?>">buat account baru</a>
         <?php } ?>
        </div>
      </div>
    </div>
