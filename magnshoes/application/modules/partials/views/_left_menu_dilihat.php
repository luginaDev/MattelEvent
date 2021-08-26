<div class="box  bestsellers">
<div class="box-heading">Rekomendasi</div>
  <div class="box-content">
    <div class="box-product-2">
      <ul>
        <?php
        if(count($most_view)>0):
          foreach($most_view as $d):
            // $harga=$this->daftar_harga->find_entity_by("detail_produk_id",$d->detail_produk_id);
          ?>
        <li>
          <div class="image">
            <a href="#">
              <img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" alt="<?=$d->gambar?>" />
            </a>
          </div>
          <div class="extra-wrap">
            <div class="name maxheight-best">
              <a href="#"><?=$d->nama?></a>
            </div>
            <br/>
            <div class="price">
              <span class="price-new">Rp.<?=number_format($d->harga)?></span>
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