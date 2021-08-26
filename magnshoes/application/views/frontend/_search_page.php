<h1 id="newProductsDefaultHeading"> </h1>

<div class="breadcrumb">
<a href="#">Pencarian Produk</a> » <a href="#" class="last"><?=$search_page["keyword"]?></a>
</div>

<div class="product-list">
        <ul>
        <?php
        if(count($rows["data"]) > 0){
          foreach($rows["data"] as $d){
            $harga = $this->dh->find(array("detail_produk_id" => $d->id),0,1,"id desc");
            $discount = $this->dc->find(array("produk_kode" =>$d->produk_kode,"berakhir >=" => date("Y-m-d H:i:s") ),0,1,"id desc");
             $harga2 = $this->dh->find(array("detail_produk_id" => $d->id),0,2,"id desc");
             $rating = $this->rat->find(array("detail_produk_id" => $d->id),0,-1);
             // $ttl_sell = $this->sell->find(array("detail_produk_id"=>$d->id),0,-1);
             $rat = 0;
             foreach ($rating  as $val) {
              $rat += $val->rating;
             }
             if($rat >0){
              $ttl_rating = round($rat / count($rating));
             }else{
              $ttl_rating = 0;
             }

        ?>
            <li>
            <div>
              <div class="right">  
                <div class="price">
                  <span class="price-new">Rp.<?=number_format((empty($harga[0]->harga))? 0 : $harga[0]->harga )?></span>
                </div> 
                
                <form method="post" action="<?=base_url("frontend/add_wish")?>" id="form_wish-<?=$d->id?>"> 
                <div class="cart">
                  <div class="color">
                    <label>Quantity</label>
                    : 
                    <select name="quantity" >
                    <?php for($i=1; $i <=$d->stok;$i++): ?>
                      <option value="<?=$i?>" /> <?=$i?> </option>
                    <?php endfor;?>
                  </select>
                  </div>
                  <input type="hidden" name="id" value="<?=$d->id?>">
                  <input type="hidden" name="id_harga" value="<?=$harga[0]->id?>">
                  <input type="hidden" name="harga" value="<?=$harga[0]->harga?>">
                  <input type="hidden" name="url_wish" value="<?=base_url()?>">
                  <input type="hidden" name="nama" value="<?=$d->nama?>">
                  <input type="hidden" name="gambar" value="<?=$d->gambar?>">
                  <input type="hidden" name="stok" value="<?=$d->stok?>">
                  <input type="hidden" name="diskon_id" value="<?=(!empty($discount[0]))? $discount[0]->id : 0 ?>">
                  <input type="hidden" name="diskon" value="<?=(!empty($discount[0]))? $discount[0]->diskon : 0 ?>">
                  <input type="hidden" name="min_quantity" value="<?=(!empty($discount[0]))? $discount[0]->min_quantity : 0 ?>">
                  
                  <input type="submit" value="Tambah Keranjang">
                 <!--  <a href="#" class="button add_to_wish" id="<?=$d->id?>" title="<?=$rows['url_wish']?>" >
                    <span>Tambah ke keranjang</span>
                  </a> -->
                </div> 
                </form> 

                <div class="wishlist">
                  <!-- <a class="tip" href="#">Add to Wish List</a> -->
                  <!-- <span class="tooltip">Wishlist</span> -->
                </div>  
                <!-- <div class="compare">
                  <a class="tip2" href="#">Add to Compare</a>
                  <span class="tooltip2">Compare</span>
                </div> -->
              </div>
              <div class="left">
                <div class="image">
                  <a class="display_image" href="<?=base_url("assets/uploads/products/".$d->gambar)?>">
                    <img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" title="$d->gambar" alt="$d->gambar">
                  </a>
                  <br clear="all">
                  <span>
                    <input name="star-<?=$d->id?>" type="radio" class="rating" <?=($ttl_rating==1)? 'checked="checked"'  : '' ?> value="1"/>
                    <input name="star-<?=$d->id?>" type="radio" class="rating" <?=($ttl_rating==2)? 'checked="checked"'  : '' ?> value="2"/>
                    <input name="star-<?=$d->id?>" type="radio" class="rating" <?=($ttl_rating==3)? 'checked' : '' ?> value="3"/>
                    <input name="star-<?=$d->id?>" type="radio" class="rating" <?=($ttl_rating==4)? 'checked="checked"'  : '' ?> value="4"/>
                    <input name="star-<?=$d->id?>" type="radio" class="rating" <?=($ttl_rating==5)? 'checked="checked"' : '' ?> value="5"/>
                  </span>
                  <br clear="all">
                 
                </div>  

                <div class="name">
                  <a class="display_image" href="detail.html"><?=$d->nama?></a>
                  <br/>

                </div>  
                <div class="description">
                  <div class="size">
                    <label>Size</label>
                    : <?=$d->ukuran?>
                  </div>
                  <div class="color">
                    <label>Color</label>
                    : <?=$d->warna?>
                  </div>
                  <div class="color">
                    <label>Stok</label>
                    : <?=$d->stok?>
                  </div>
                  <div class="size">
                    <label>berat </label>
                    :<?=$d->berat?> kg
                  </div>
                  <?php if(count($discount)>0){  ?>
                  <div class="color">
                    <label>Discount</label>
                    : <?=$discount[0]->diskon?> %
                  </div>
                  <div class="color">
                    <label>Min Quantity</label>
                    : <?=$discount[0]->min_quantity?>
                  </div>
                  <?php }?>
                </div>
              </div>
            </div>
            </li>
            <?php 
                }
              }
            ?>
    
        </ul>
        
         <div class="pagination">
          <!-- <div class="links"> 
            <b>1</b>  
            <a href="#">2</a>  
            <a href="#">&gt;</a> 
            <a href="#">&gt;|</a> 
          </div> -->
          <!-- <div class="results">Menampilkan 1 sampai 12 dari 13 (2 Halaman)</div> -->
        </div>
      </div>