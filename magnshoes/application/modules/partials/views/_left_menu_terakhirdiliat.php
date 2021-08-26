<div class="box  bestsellers">
<div class="box-heading">Terakhir Dilihat</div>
  <div class="box-content">
    <div class="box-product-2">
      <ul>
        <?php
        if(count($last_view)>0):
          foreach($last_view as $d):
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