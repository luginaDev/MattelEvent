<script type="text/javascript">
$(document).ready(function(){
  $(".namex").click(function(){
    var kode = $(this).attr("id");
    var ip = "<?=$_SERVER["REMOTE_ADDR"]?>";
    var member = "<?=$this->session->userdata("member_login")?>";
    $.post($("#base_url").val()+"partials/add_temp_page",
        { 'produk_kode': kode , 'ip' : ip ,'member_email':member },
        function(data){
        }
      );
  });
});
</script>
<div id="content">
  <div class="breadcrumb">
    <a href="#">Home</a> » <a href="#" class="last">Semua Produk</a>
  </div>
  <div class="product-list">
    <ul>
    <?php
    if(count($rows["data"]) > 0){
      foreach($rows["data"] as $d){
        
        $discount = $this->dc->find(array("produk_kode" => $d->kode,"berakhir >=" => date("Y-m-d H:i:s") ),0,1,"id desc");
        $detail =  $this->dp->find_entity_by("produk_kode",$d->kode);
        $detail_p =  $this->dp->find(array("produk_kode" => $d->kode));
         $harga2 = $this->dh->find(array("detail_produk_id" => $detail->id),0,2,"id desc");
         $rating = $this->rat->find(array("detail_produk_id" => $detail->id),0,-1);
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
            <form method="post" action="<?=base_url("frontend/add_wish")?>" id="form_wish"> 
            <div class="price">
              <?php
              foreach ($detail_p as $p) {
                $harga = $this->dh->find(array("detail_produk_id" => $p->id),0,1,"id desc");
                $cek =($detail->id == $p->id)? 'checked="checked"' : '';
                echo "".$p->ukuran." : Rp.".number_format((empty($harga[0]->harga))? 0 : $harga[0]->harga )."</span> <br/>";
              }
              ?>
            </div> 
            
            
            <div class="cart">
              <div class="color">
              </div>
            </div> 
            </form> 

            <div class="wishlist"></div>  
          </div>
          <div class="left">
            <div class="image">
              <a class="display_image" href="<?=base_url("assets/uploads/products/".$d->gambar)?>" >
                <img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" title="<?=$d->gambar?>" alt="<?=$d->gambar?>">
                <link rel="image_src" href="<?=base_url("assets/uploads/products/".$d->gambar)?>" />
              </a>
              <br clear="all">
              <span>
                <input name="star-<?=$detail->id?>" type="radio" class="rating" <?=($ttl_rating==1)? 'checked="checked"'  : '' ?> value="1"/>
                <input name="star-<?=$detail->id?>" type="radio" class="rating" <?=($ttl_rating==2)? 'checked="checked"'  : '' ?> value="2"/>
                <input name="star-<?=$detail->id?>" type="radio" class="rating" <?=($ttl_rating==3)? 'checked' : '' ?> value="3"/>
                <input name="star-<?=$detail->id?>" type="radio" class="rating" <?=($ttl_rating==4)? 'checked="checked"'  : '' ?> value="4"/>
                <input name="star-<?=$detail->id?>" type="radio" class="rating" <?=($ttl_rating==5)? 'checked="checked"' : '' ?> value="5"/>
              </span>
              <br clear="all">
             
            </div>  

            <div class="name">
              <a id="<?=$d->kode?>" class="display_image namex" href="<?=base_url("frontend/detail_produk/$d->kode")?>"><?=$d->nama?></a>
              <br/>

            </div>  
            <div class="description">
              <div class="size">
                <label>Warna </label>
                :<?=$detail->warna?>
              </div>
              <div class="size">
                <label>Stok </label>
                :<?=$detail->stok?> pcs
              </div>
              <div class="size">
                <label>Berat </label>
                :<?=$detail->berat?> kg
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
              <div class="color">
                <label>Deskripsi</label>
                <?=word_limiter($d->deskripsi,10)?>
              </div>
              <div class="color"> 
                <?//S=$this->load->view("frontend/_social_share");?>
              </div>
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
     <?=$this->pagination->create_links();?>
    </div>
  </div>
</div>