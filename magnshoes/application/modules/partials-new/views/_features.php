<div class="centerBoxWrapper" id="specialsDefault">
  <h2 class="centerBoxHeading">Produk</h2>
<?php
if(count($produk_baru)>0):
  foreach($produk_baru as $d) :
    $harga = $this->dh->find(array("detail_produk_id" => $d->id),0,2,"id desc");
  ?>
   <div class="centerBoxContentsSpecials centeredContent back  first" style="width: 25%;">
    <div class="product-col">
      <div class="img">
        <a class="img_detail" href="<?=base_url("assets/uploads/products/".$d->gambar)?>">
          <img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" alt="<?=$d->gambar?>" />
        </a>
      </div>
      <div class="prod-info">
        <a class="prod_detail name" href="#"><?=$d->nama?></a>
        <div class="wrapper">
          <div class="price">
            <strong>
              <span class="normalprice">Rp <?=number_format((empty($harga[1]->harga)? 0 : $harga[1]->harga) )?></span>
              <span class="productSpecialPrice">Rp <?=number_format($d->harga)?></span>
            </strong>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
  endforeach;
endif;
 ?>
  <br class="clearBoth">
</div>