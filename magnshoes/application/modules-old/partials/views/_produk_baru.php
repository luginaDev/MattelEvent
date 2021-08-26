<div class="box new-products">
<div class="box-heading">Product Baru</div>
  <div class="box-content">
    <div class="box-product">
      <ul>
        <?php
      if(count($produk_baru)>0):
        foreach($produk_baru as $d) :
        ?>
          <li>
          <div class="padd-both">
            <div class="image2">
              <a href="#">
                <img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" alt="<?=$d->gambar?>" />
              </a>
            </div>
            <div class="name maxheight" style="height: 38px; ">
              <a href="#"><?=$d->nama?></a>
            </div>
            <div class="price">
              <span class="price-new">Rp.<?=number_format($d->harga)?></span>
            </div>
            <div class="cart">
              <a href="#" class="button addToCart">
                <span>Tambah ke keranjang</span>
              </a>
            </div>
          </div>
        </li>
      <?php
        endforeach;
      endif;
       ?>      
      </ul>
    </div>
  </div>
</div>