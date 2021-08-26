<?php
  $nav_val = $this->uri->segment(1);
  $nav_val2 = $this->uri->segment(2);
  $nav_val3 = $this->uri->segment(3);
?>
<div id="header">
  <div class="wrapper top1">
    <div class="menu fleft">
      <div id="navEZPagesTop"> 
        <ul> 
          <li <?php echo ($nav_val == "") ? "class='selected first'" : ""; ?> > 
            <a href="<?=base_url("frontend")?>">Beranda </a> 
          </li> 
          <li <?php echo ($nav_val2 == "products") ? "class='selected first'" : ""; ?>> 
            <a href="<?=base_url("frontend/products")?>">Product</a> 
          </li> 
          <!-- <li <?php echo ($nav_val2 == "specials") ? "class='selected first'" : ""; ?>> 
            <a href="<?=base_url("frontend/specials")?>">Specials</a> 
          </li>  -->
          <li <?php echo ($nav_val2 == "static_pages" && $nav_val3 == "1") ? "class='selected first'" : ""; ?>> 
            <a href="<?=base_url("frontend/static_pages/1")?>">Tentang Kami</a> 
          </li> 
          <li <?php echo ($nav_val2 == "contactus") ? "class='selected first'" : ""; ?>> 
            <a href="<?=base_url("frontend/contactus")?>">Kontak Kami</a> 
          </li>
          <li <?php echo ($nav_val2 == "faq") ? "class='selected first'" : ""; ?>> 
            <a href="<?=base_url("frontend/static_pages/10")?>">FAQ</a> 
          </li> 
          <?php if($this->session->userdata("member_login")!=""){?>

          <li <?php echo ($nav_val2 == "testimonial") ? "class='selected first'" : ""; ?>> 
            <a href="<?=base_url("frontend/testimonial")?>">Testimonial</a> 
          </li> 
          <li <?php echo ($nav_val2 == "history_wish") ? "class='selected first'" : ""; ?>> 
            <a href="<?=base_url("frontend/history_wish")?>">history belanja</a> 
          </li> 
          <?php } ?>
        </ul> 
      </div>
    </div>
    <div class="navigation fright">         
      <?php if($this->session->userdata("member_login")!=""){?>
         <a href ="<?=base_url("frontend/registrasi_member")?>">
            <?=$this->session->userdata("member_login")?>
          </a> 
          <a href="<?=base_url("frontend/member_logout")?>">Log out</a>  
      <?php }else{ ?>
        <a href="<?=base_url("frontend/checkout")?>">Log In</a>  
      <?php } ?>
      

    </div>
  </div>
  <div class="wrapper box2">
    <div class="logo">
      <a href="#">
        <img src="<?=$this->template->get_images_path();?>logo.jpg" alt="" height="56" width="283" />
      </a>
    </div>
    <div class="right-head">
      <div class="search">
        <form name="quick_find_header" action="<?=base_url("frontend/search_page")?>" method="post">           
          <input name="keyword" value="Masukkan kata kunci" class="input1" onblur="if(this.value=='') this.value='Masukkan kata kunci'" onfocus="if(this.value =='Masukkan kata kunci' ) this.value=''" type="text">
          <input class="input2" type="submit" value="Search" />           
        </form>
      </div>
      <div class="cart">
        <span class="cart1">Sekarang di keranjang anda:</span>
        <a href="<?=base_url("frontend/checkout")?>">
          <?php if($this->session->userdata("member_login")!=""){?>
            <?=count($cart)?> barang</a> 
          <?php }else{ ?>
            <?=$this->cart->total_items()?>barang</a> 
          <?php } ?>
      </div>
    </div>
  </div>

  <div class="horizontal-cat">
    <div id="dropMenuWrapper">
      
    </div>
    <div class="clearBoth"></div>
  </div>
</div>