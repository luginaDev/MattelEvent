
<script src="<?=base_url("assets/js/slides.min.jquery.js")?>"></script>
<script src="<?=base_url("assets/js/star-rating/jquery.rating.js")?>"></script>
<link rel="stylesheet" href="<?=base_url("assets/css/global.css")?>">
<link rel="stylesheet" href="<?=base_url("assets/js/star-rating/jquery.rating.css")?>" > 
  <script>
    $(function(){

      $('#products').slides({
        preload: true,
        preloadImage: 'img/loading.gif',
        effect: 'slide, fade',
        crossfade: true,
        slideSpeed: 350,
        fadeSpeed: 500,
        generateNextPrev: true,
        generatePagination: false
      });
      $(".content_detail").hide();
      var id = $(".current").attr("id");
      $("#content_det_"+id).show();
      $(".nav_det").click(function(){
        var nes = $(this).attr("id");
        $(".content_detail").hide();
        $("#content_det_"+nes).show();
      });
    $('.rating').rating({
    callback: function(value, link){
      var id=$(this).attr("name");
      var detail_produk_id = id.split('-');
      $.post($("#base_url").val()+"partials/add_rating",
        { 'detail_produk_id': detail_produk_id[1] , 'rating' : value },
        function(data){
          var pesan = data.split("|");
          if(pesan[0] == "success"){
            $().message(pesan[1]);
            window.location.reload();
          }else if(pesan[0] == "error"){
            $().message(pesan[1]);
          }
          console.log(data);
        }
      );
    }
  });
    });

  </script>
  
<style type="text/css">

#image_detail{
  float: left;
  background: none repeat scroll 0 0 #DFDFDF;
}
.content_detail{
  float: left;
  margin: 12px 20px;
  width: 235px
}
.content_detail .name_detail{
    background: none repeat scroll 0 0 #000000;
    color: #FFFFFF;
    font-family: "MuseoSans500",Tahoma;
    font-size: 25px;
    font-weight: bold;
    padding-left: 10px;
    text-transform: uppercase;
    width: 100%;
}
.content_detail p {
    font-family: "MuseoSans500",Tahoma;
    font-size: 17px;
    text-transform: uppercase;
}
.content_detail label {
    font-family: "MuseoSans500",Tahoma;
    font-size: 15px;
}
.content_detail .color {
    float: left;
    margin-right: 10px;
}
.content_detail .cart {
  margin-top: 10px
}
.tableWrapper {
  height: 135px;
}
.tableWrapper > div {
    float: left;
    height: 125px;
    width: 150px;
}
.tableWrapper table {
    height: 125px;
    width: 110px;
}
#products .pagination li.current a {
    border: 1px solid #AAAAAA;
    margin: 0;
}
#search .button-search input[type=submit] {
  width: 100px !important;
}
.tableWrapper table td {
    border-left: 1px solid #CCCCCC;
    color: #A4381F;
    font-family: "MuseoSans500",Tahoma;
    font-size: 25px;
    padding-left: 15px;
    text-align: center;
    vertical-align: middle;
}
.container{
    width: 800px;
}
</style>
<?php foreach ($data as $val) { 
 
 } ?>

  <div class="container">
    <div id="image_detail">
      <div id="products">
        <div class="slides_container">
          <?php foreach ($data as $val) { ?>
             <a href="#" target="_blank"><img src="<?=base_url("assets/uploads/products/".$val->gambar."")?>" width="366" height="293px" alt="<?=$val->nama?>"></a>
          <?php } ?>
        </div>
        <ul class="pagination">
          <?php foreach ($data as $val) { ?>
            <li id="<?=$val->id?>">
              <a href="#" class="nav_det" id="<?=$val->id?>">
                <img src="<?=base_url("assets/uploads/products/".$val->gambar."")?>" width="55" alt="<?=$val->nama?>">
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php 
    foreach ($data as $val) { 
      $discount = $this->dc->find(array("produk_kode" => $val->produk_kode,"berakhir >=" => date("Y-m-d H:i:s"),"status"=> "aktif" ),0,1,"id desc");
      $rating = $this->rat->find(array("detail_produk_id" => $val->id),0,-1);
         $rat = 0;
         foreach ($rating  as $valx) {
          $rat += $valx->rating;
         }
         if($rat >0){
          $ttl_rating = round($rat / count($rating));
         }else{
          $ttl_rating = 0;
         }

      ?>
    <form method="post" action="<?=base_url("frontend/add_wish")?>" id="form_wish"> 
    <div class="content_detail" id="content_det_<?=$val->id?>">
      <h1 class="name_detail"> <?=$val->nama?> </h1> <br/>
      <div class="tableWrapper">
        <div>
          <p>Warna : <?=$val->warna?> </p>
          <p>Ukuran :  <?=$val->ukuran?> </p>
          <p>Berat :  <?=$val->berat?> </p>
          <p>Stok :  <?=$val->stok?> </p>
          <?php 
            $harga = $this->dh->find(array("detail_produk_id" => $val->id),0,2,"id desc" );
          ?>
          <p>Harga : <?= number_format((empty($harga[0]->harga))? 0 : $harga[0]->harga )?></p>
        </div>

        <table>
          <tbody>
            <?php if(count($discount)>0){  ?>
            <tr><td>Discount <?=$discount[0]->diskon?> %</td></tr>
            <tr><td>Min qty:<?=$discount[0]->min_quantity?></td></tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="cart">
        <div class="color">
          <label>Quantity</label>
          :<select class="stok_selected" id="quantity_k01" name="quantity">
            <?php for($i=1; $i <=$val->stok;$i++): ?>
              <option value="<?=$i?>" > <?=$i?> </option>
            <?php endfor;?>
          </select>
        </div>
          <input type="hidden" name="id" value="<?=$val->id?>">
          <input type="hidden" name="produk_kode" value="<?=$val->produk_kode?>">
          <input type="hidden" name="id_harga" value="<?=$harga[0]->id?>">
          <input type="hidden" name="harga" value="<?=$harga[0]->harga?>">
          <input type="hidden" name="url_wish" value="<?=base_url("frontend/products")?>">
          <input type="hidden" name="nama" value="<?=$val->nama?>">
          <input type="hidden" name="gambar" value="<?=$val->gambar?>">
          <input type="hidden" name="stok" value="<?=$val->stok?>">
          <input type="hidden" name="diskon_id" value="<?=(!empty($discount[0]))? $discount[0]->id : 0 ?>">
          <input type="hidden" name="diskon" value="<?=(!empty($discount[0]))? $discount[0]->diskon : 0 ?>">
          <input type="hidden" name="min_quantity" value="<?=(!empty($discount[0]))? $discount[0]->min_quantity : 0 ?>">

        <input type="submit" value="Tambah Keranjang" />
      </div>
    </form>
      <span>
      <input name="star-<?=$val->id?>" type="radio" class="rating" <?=($ttl_rating==1)? 'checked="checked"'  : '' ?> value="1"/>
      <input name="star-<?=$val->id?>" type="radio" class="rating" <?=($ttl_rating==2)? 'checked="checked"'  : '' ?> value="2"/>
      <input name="star-<?=$val->id?>" type="radio" class="rating" <?=($ttl_rating==3)? 'checked' : '' ?> value="3"/>
      <input name="star-<?=$val->id?>" type="radio" class="rating" <?=($ttl_rating==4)? 'checked="checked"'  : '' ?> value="4"/>
      <input name="star-<?=$val->id?>" type="radio" class="rating" <?=($ttl_rating==5)? 'checked="checked"' : '' ?> value="5"/>
    </span>
    </div>
   
     
    <?php } ?>

  </div>
