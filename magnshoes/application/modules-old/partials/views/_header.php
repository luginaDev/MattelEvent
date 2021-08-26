<div class="row-1">
      <div id="header">
        <div id="logo">
          <a href="#">
            <img src="" alt="">
          </a>
        </div>
        <ul class="links">
          <li><a href="#" id="wishlist_total">Wish List <span>(<?=count($cart)?>)</span></a></li>
          <li><a href="#">My Account</a></li>
          <li><a href="<?=base_url("frontend/shop_cart")?>">Shopping Cart</a></li>
          <li class="last"><a href="<?=base_url("frontend/checkout")?>">Checkout</a></li>
        </ul>
        <div id="cart">
          <div class="cart_inner">
            <div class="heading">
              <span class="sc-button"></span>
              <div class="right-bg">
                <div class="wrapper">
                 <h4>Shopping Cart</h4>
                 <span id="cart_total"><strong><?=count($cart)?> item(s)</strong></span>
                </div>
              </div>
            </div>
          </div>
          <div class="content" style="display: none; ">
            <div class="empty">
             <?php 
                $subtotal = 0;
                $diskon = 0;
                if(count($cart)>0){ 
                     foreach ($cart as $items): 
                      $jml = $items->qty * $items->harga; 
                      $subtotal = $jml + $subtotal;
                      if($items->min_quantity >= $items->qty){
                          $disk = (($items->diskon / 100) * $items->qty * $items->harga);
                        }else{
                          $disk = 0;    
                        }
                      $diskon = $disk + $diskon ;
                ?>
                <table class="cart">
                <tbody>
                  <tr class="item-cart-<?=$items->session_rowid?>">
                    <td class="image">
                      <a href="#">
                      <img src="<?=base_url("assets/uploads/products/".$items->gambar)?>" alt="<?=$items->gambar?>" title="<?=$items->gambar?>" height="40" width="40"/>
                      </a>
                    </td>
                    <td class="name">
                      <a href="#"><?=$items->name?></a>
                      <div/>
                      <span class="quantity">x <?=$items->qty?></span>
                      <span class="total">Rp <?=number_format($items->harga)?></span>
                    </td>
                    <td class="remove">
                      <span >
                      <a href="<?=base_url("frontend/remove_wish/".$items->rowid."/".$items->session_rowid."/".$items->qty."/".$items->detail_produk_id)?>" id="<?=$items->session_rowid?>" class="remove_wish_list"> X </a>
                      </span>
                    </td>
                  </tr>
                </tbody>
                </table>
                <?php endforeach;?>
                <table class="cart">
                <tbody>
                <tr>
                  <td align="right" style="text-align: right; padding-right: 0px; ">
                    <b>Sub-Total</b>
                  </td>
                  <td align="right" style="padding-right: 18px; ">
                    <span class="t-price">Rp. <?=$this->cart->format_number($subtotal)?></span>
                  </td>
                </tr>
                <tr>
                  <td align="right" style="text-align: right; padding-right: 0px; ">
                    <b>Diskon</b>
                  </td>
                  <td align="right" style="padding-right: 18px; ">
                    <span class="t-price">Rp <?=$this->cart->format_number($diskon)?></span>
                  </td>
                </tr>
                <tr>
                  <td align="right" style="text-align: right; padding-right: 0px; ">
                    <b>Total</b>
                  </td>
                  <td align="right" style="padding-right: 18px; ">
                    <span class="t-price">Rp. <?=$this->cart->format_number($subtotal - $diskon)?></span>
                  </td>
                </tr>
               <tr>
                  <td align="right" style="text-align: right; padding-right: 0px; ">&nbsp;
                    
                  </td>
                  <td align="right" style="padding-right: 18px; ">
                    <a href="<?=base_url("frontend/checkout")?>" class="button">
                      <span>Checkout</span></a>

                  </td>
                </tr>
                </tbody>
              </table> 
              <?php }else{ ?>
                Keranjang Belanja Anda Masih Kosong
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="menu-bg">
          <ul class="main-menu">
            <li class="item-1">
              <a href="<?=base_url()?>">Home  </a>
            </li>
            <li class="<?php echo ($this->uri->segment(2)=="products") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/products")?>">Products</a>
            </li>
            <li class="item-1">
              <a href="<?=base_url("frontend/specials")?>">Specials</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3)=="1") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/1")?>">About Us</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3)=="2") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/2")?>">Delivery</a>
            </li>
            <!-- <li class="<?php echo ($this->uri->segment(3)=="3") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/3")?>">Privacy Policy</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3)=="4") ? "first" : "item-1" ?>">
              <a href="<?=base_url("frontend/static_pages/4")?>">Terms &amp; Conditions</a> -->
            </li>              
            
            <li class="<?php echo ($this->uri->segment(3)=="5") ? "first" : "item-7" ?>">
              <a href="<?=base_url("frontend/contactus")?>">Contact Us</a>
            </li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="search-back">
          <form method="post" action="<?=base_url("frontend/search_page")?>">
          <div id="search">
            <div class="button-search"><input type="submit" value="cari"/></div>
            <span class="search-bg"> 
              
              <input type="text" name="filter_name" title="Enter search keywords here" />

            </span>
          </div>
        </form>
        </div>
        <div id="welcome">Selamat Datang <?=$this->session->userdata('member_login')?>,
        <?php if($this->session->userdata('member_login')!=""){ ?>
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