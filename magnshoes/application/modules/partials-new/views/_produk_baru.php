<div class="centerBoxWrapper" id="featuredProducts">
<h2 class="centerBoxHeading">Product Mendatang</h2>
 <?php
if(count($produk_baru)>0):
  foreach($produk_baru as $d) :
  ?>
  <div class="centerBoxContentsFeatured centeredContent back first" style="width: 25%;">
    <div class="product-col">
      <div class="img">
        <a class="img_detail" href="<?=$this->template->get_images_path();?>full-shirt.png">
          <img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" alt="<?=$d->gambar?>" />
        </a>
      </div>
      <div class="prod-info">
        <a class="prod_detail name" href="pop-details.html"><?=$d->nama?></a>
        <div class="wrapper">
          <div class="price">
            <strong>Rp.<?=number_format($d->harga)?></strong>
          </div>
          <div class="button">
            <a href="#">
              <img src="<?=$this->template->get_images_path();?>button_add_to_cart.gif" class="add_to_cart" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  endforeach;
endif;
 ?> 