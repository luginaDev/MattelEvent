<?php
$member = $this->mem->find_entity_by("email",$this->session->userdata("member_login"));
?>
<script type="text/javascript">
$(document).ready(function(){
  var default_html = '<option value="pilih" > -- Pilih -- </option> <option value="transfer" > -- Transfer -- </option><option value="paypall" > -- Paypall -- </option>';
  var cod_html = '<option value="pilih" > -- Pilih -- </option> <option value="transfer" > -- Transfer -- </option> <option value="cod" > -- Cash On Deliver -- </option><option value="paypall" > -- Paypall -- </option>';                   
  val_kelurahan("<?=$member->kelurahan_id?>");
  val_kecamatan("<?=$member->kelurahan_id?>");
  val_kota("<?=$member->kelurahan_id?>");
  val_prop("<?=$member->kelurahan_id?>");

  $("#frm-nama").val("<?=$member->nama?>");
  $("#frm-alamat").val("<?=$member->alamat?>");
  $("#frm-telp").val("<?=$member->telp?>");

  $("#btn-proses").hide();
  // $("#checkout").hide();
  $("#form-pembayaran").slideUp("slow");
  $(".btnPaypall").hide();
  $(".loading").hide();
  $("#form-product").hide();
  // $("#btn_confirm").click(function(){
  //   $("#checkout").show();
  // });

  $("#btn_confirm").click(function(){
    $("#checkout").show();
    $(this).hide();
    $("#btn-proses").show();
    $("#frm-propinsi_id").focus();
    $("#form-product").slideUp("slow");
    $("#form-pembayaran").hide();
  });

  $("#form-validate").validate({
      rules: {
        password: "required",
        confirm: {
          equalTo: "#password"
        }
        
      }
    });

    $("#frm-prop_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kota")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kota_id").html(data);

          } 
        });
      }
    });

    
    $("#frm-kota_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kecamatan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kecamatan_id").html(data);
        
          } 
        });
        var check_cod2 = $(this).val(); check_prop2 = $("#frm-prop_id").val();
        console.log(check_cod2+" == "+check_prop2);
          if(check_cod2 == 1){
          $("#frm-type_pembayaran").html(cod_html);

        }else{
          $("#frm-type_pembayaran").html(default_html);

        }
      }
    });

    $("#frm-kecamatan_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kelurahan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kelurahan_id").html(data);
          } 
        });
      }
    });

    $("#frm-vendor").change(function(){
      var id=$(this).val();
      var kota = $("#frm-kota_id").val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_tarif")?>',
          data :{id:id,kota_id:kota},
          type :"POST",
          success : function(data){
            $("#frm-tujuan").html(data);
            reload_tarif();
          } 
        });
      }
    });

    function reload_tarif(){
      var id=$("#tarif_id_input").val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/check_tarif")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
           $("#ket_total").html("Kirim/Paket");
           var qty = $("#quantity").val();
           var tts = $("#total_keseluruhan").val();
           var input_wieght= $("#total_berat").val();
           var wieght = (qty * parseInt(input_wieght));
        
           if(wieght < 1){
            var newWieght = (qty * 1).toFixed();   
           }else{
            var newWieght = wieght.toFixed(); 
           }
           var biaya_tambahan = data * newWieght ;

           // var biaya_tambahan = data * (qty * 0.5);
           var biaya_tambahan_f = (biaya_tambahan).toFixed();
           var total = parseInt($("#total_keseluruhan").val())+parseInt(biaya_tambahan);
           var total_f =  (total).toFixed();
           $("#biaya_tambahan").html("Rp."+biaya_tambahan_f);
           $("#tambahan_biaya").val(biaya_tambahan);
           $("#total_keseluruhan").val(total);
           $("#total_biaya").html("Rp."+total_f);
          } 
        });
      }
    }


    $(".transfer").hide();
    
    $("#frm-type_pembayaran").change(function(){
      var data = $(this).val();
      if(data=="transfer"){
        $(".transfer").show();
        $("#btn_finish").show();
        $(".btnPaypall").hide();
      }else if(data == "cod"){
        var kota = $("#frm-kota_id").val();
        if(kota==1){
          alert("cod dpt dilakukan");
          $(".transfer").hide();
          $("#btn_finish").show();
          $(".btnPaypall").hide();
        }
      }else if(data == "paypall"){

        $(".transfer").show();
        $("#form-bank").hide();
        $("#btn_finish").hide();
        $(".btnPaypall").show();
        $("#btn-proses").hide();   
        $(".btnPaypall").focus();      
      }else{

      }
    });
    
    $("#frm-tujuan").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/check_tarif")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
           $("#ket_total").html("Kirim/Paket");
           var qty = $("#quantity").val();
           var tts = $("#total_keseluruhan").val();
           var input_wieght= $("#total_berat").val();
           var wieght = (qty * parseInt(input_wieght));
        
           if(wieght < 1){
            var newWieght = (qty * 1).toFixed();   
           }else{
            var newWieght = wieght.toFixed(); 
           }
           var biaya_tambahan = data * newWieght ;

           // var biaya_tambahan = data * (qty * 0.5);
           var biaya_tambahan_f = (biaya_tambahan).toFixed();
           var total = parseInt($("#total_keseluruhan").val())+parseInt(biaya_tambahan);
           var total_f =  (total).toFixed();
           $("#biaya_tambahan").html("Rp."+biaya_tambahan_f);
           $("#tambahan_biaya").val(biaya_tambahan);
           $("#total_keseluruhan").val(total);
           $("#total_biaya").html("Rp."+total_f);
          } 
        });
      }
    });
  $("#btn-lanjut-pembayaran").click(function(){
      $("#info-member").slideUp(function(){
        $("#form-pembayaran").slideDown("slow");  
      });
    });
  $("#btn-kembali-produk").click(function(){
        $("#info-member").slideUp(function(){
        $("#form-product").slideDown("slow");
      });
    });
    
  $("#btn-lanjut-produk").click(function(){
    $("#form-pembayaran").slideUp(function(){
      $("#form-product").slideDown("slow");
    });
  });
    
  $("#btn-kembali-pembayaran").click(function(){
    $("#form-pembayaran").slideUp(function(){
      $("#info-member").slideDown("slow");  
    });

  });
  $(".btnPaypall").live("click",function(){
    $(this).hide();
    $(".loading").show();
    $.post("<?=base_url("checkout/proccess_ordering_paypal")?>",$("#form-validate").serialize(),function(data){
      // console.log(data);
        $.colorbox({html:data});
        $(".loading").hide();
        $(this).show();
      });
    return false;
  });
  var check_cod = $("#frm-kota_id").val(); check_prop = $("#frm-prop_id").val();
  if(check_cod == 1 ){
    $("#frm-type_pembayaran").html(default_html);
  }else{
    $("#frm-type_pembayaran").html(cod_html);
  }
});
 </script>
<!-- <a href="#"  class="btnPaypall">
      <img src="<?=base_url("assets/images/btn_paypal_checkout.gif")?>" alt="PayPal – The safer, easier way to pay online!">
    </a>
 --> <?php $invoice = mt_rand(1, 1000);?>
<div id="checkout">
  <div class="checkout-heading" style="border-radius:6px 6px 0 0;">
    <div class="marker-chekout">Detail Shop</div>
  </div>
<form method="post" action="<?=base_url("checkout/proccess_ordering")?>" id="form-validate">
  <div class="checkout-content" style="display: block; ">
   <div id="detail_deliver">
    <fieldset id="info-member">
      <legend> Data Member/Pengiriman  </legend>
      <table class="form">
        <tbody>
          <tr>
            <td>
              <span class="required ">*</span> Nama:
            </td>
            <td>
              <input type="text" class="required" name="nama" id="frm-nama" /> 
            </td>
          </tr>
          <tr>
            <td>
              <span class="required">*</span>Propinsi:
            </td>
            <td>
             <select id="frm-prop_id" class="q1 required">
              <option value="--">--pilih--</option>
              <?php
                 $prop = $this->pr->find(array(),0,-1);
                foreach($prop as $pr){
                  echo "<option value='".$pr->id."' > $pr->nama</option>";
                }
              ?>
            </select>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required">*</span> Kota :
            </td>
            <td>
              <select id="frm-kota_id" class="q1 required">
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required">*</span> Kecamatan :
            </td>
            <td>
              <select id="frm-kecamatan_id" class="q1 required">
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required">*</span> Kelurahan :
            </td>
            <td>
              <select id="frm-kelurahan_id" name="kelurahan_id" class="required q1">
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required ">*</span> Alamat Lengkap:
            </td>
            <td>
              <textarea id="frm-alamat" class="q1 required" name="alamat" style="width:200px; height:70px"> </textarea>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required ">*</span> No Telp :
            </td>
            <td>
              <input type="text" class="q1 required" name="telp"  id="frm-telp"/>
            </td>
          </tr>
          </tbody>
          </table>
          <b style="color:red">** Silahkan ubah formulir diatas untuk merubah alamat pengriman/tujuan anda</b><br/>
          <input type="button" value="selanjutnya >>" class="button-red" id="btn-lanjut-pembayaran">
        </fieldset>
         <fieldset id="form-pembayaran">
          <legend> Informasi Pembayaran </legend>
            <table>
              <tbody>
              <tr>
                <td>
                  <span class=" ">*</span> Type Pembayaran :
                </td>
                <td>
                  <select id="frm-type_pembayaran" class="required q1" name="type_pembayaran">
                    
                  </select>
                </td>
              </tr>
              <tr class="transfer" id="form-bank">
                <td>
                  <span class=""></span>
                </td>
                <td>
                  <input type="hidden" name="rekening_id" >
                   <!-- <select  class="q1 required" name="rekening_id">
                    <option value="--">--pilih--</option>
                    <?php
                       $rek = $this->rek->find(array(),0,-1);
                      foreach($rek as $rk){
                        echo "<option value='".$rk->id."' > $rk->bank ($rk->rekening)</option>";
                      }
                    ?>
                  </select> -->
                </td>
              </tr>
              <tr class="transfer">
                <td>
                  <span class="">*</span>Vendor Pengiriman:
                </td>
                <td>

                   <select id="frm-vendor" class="q1 required" name="vendor_id">
                    <option value="--">--pilih--</option>
                    <?php
                       $vendor = $this->v->find(array(),0,-1);
                      foreach($vendor as $vr){
                        echo "<option value='".$vr->id."' > $vr->nama ($vr->kode)</option>";
                      }
                    ?>
                  </select>
                </td>
              </tr>
              <tr class="transfer">
                <td>
                  <span class=""></span>
                </td>
                <td>
                  <div id="frm-tujuan" ></div>
                  <!--  <select id="frm-tujuan" class="q1 required" name="tarif_id">
                    <option value="--">--pilih--</option>
                    
                  </select> -->
                </td>
              </tr>
            </tbody>
          </table>
          <input type="button" value="<< sebelumnya" class="button-red" id="btn-kembali-pembayaran">
          <input type="button" value="selanjutnya >>" class="button-red" id="btn-lanjut-produk">
        </fieldset>
        <input type="hidden" name="invoice" id="invoice" value="<?=$invoice?>">
   </div>
  </div>
</div>

<div class="checkout-content" style="border-bottom: 1px solid rgb(223, 225, 228); border-radius: 6px 6px 6px 6px; margin-top: 7px; display: block;" id="form-product">

  <div class="checkout-product">
  <table>
    <thead>
      <tr>
        <td class="name">Produk</td>
        <td class="model">Berat</td>
        <td class="quantity">Jumlah</td>
        <td class="price">Harga</td>
        <td class="total">Total</td>
      </tr>
    </thead>
    <tbody>
      <?php 
        $subtotal = 0;
        $diskon = 0;
        $qty = 0;
        $ttl_brt= 0;
        if(count($cart)>0){ 
             foreach ($cart as $items): 
              $jml = $items->qty * $items->harga; 
              $subtotal = $jml + $subtotal;
              $qty +=$items->qty;
              if($items->min_quantity >= $items->qty){
                  $disk = (($items->diskon / 100) * $items->qty * $items->harga);
                }else{
                  $disk = 0;    
                }
              $diskon = $disk + $diskon ;
              $berat = $this->dp->find_entity_by("id",$items->detail_produk_id);
              $ttl_brt += $berat->berat;
        ?>
      <tr>
        <td class="name"><a href="#"><?=$items->name?></a>
        </td>
        <td class="model">
          <?=$berat->berat?>
          <input type="hidden" name="detail_produk_id[]" id="detail_produk_id" value="<?=$items->detail_produk_id?>"> 
          <input type="hidden" name="daftar_harga_id[]" id="harga_id" value="<?=$items->daftar_harga_id?>">
          <input type="hidden" name="diskon_id[]" id="diskon_id" value="<?=$items->diskon_id?>">
          <input type="hidden" name="dquantity[]" id="quantity" value="<?=$items->qty?>">
        </td>
        <td class="quantity"><?=$items->qty?></td>
        <td class="price"><?=$this->cart->format_number($items->harga)?></td>
        <td class="total"><?=$this->cart->format_number($items->qty*$items->harga)?></td>
      </tr>
    <?php endforeach; }?>
    </tbody>
    <tfoot>
      <tr>
        <td class="price" colspan="4"><b>Sub-Total:</b></td>
        <td class="total">Rp.<?=$this->cart->format_number($subtotal)?></td>
      </tr>
      <tr>
        <td class="price" colspan="4"><b>Diskon ():</b></td>
        <td class="total">Rp.<?=$this->cart->format_number($diskon)?></td>
      </tr>
      <tr id="tr-tambahan_biaya">
        <td class="price" colspan="4"><b>Total <span id="ket_total"> </span>:</b></td>
        <td class="total" id="biaya_tambahan"></td>
      </tr>
      <tr>
        <td class="price" colspan="4"><b>Total:</b>
          <input type="hidden" name="subtotal" id="subtotal" value="<?=$subtotal?>"> 
          <input type="hidden" name="total_keseluruhan" id="total_keseluruhan" value="<?=($subtotal - $diskon)?>"> 
          <input type="hidden" name="quantity" id="quantity" value="<?=$qty?>"> 
          <input type="hidden" name="tambahan_biaya" id="tambahan_biaya" value="0"> 
          <input type="hidden" id="total_berat" value="<?=$ttl_brt?>"> 

        </td>
        <td class="total" id="total_biaya">Rp.<?=$this->cart->format_number($subtotal - $diskon)?> 
           </td>
      </tr>

    </tfoot>
  </table>
  <div class="payment">
    <div class="buttons">
      <div class="right">
        <a href="<?=base_url("checkout/cancel_order")?>" class="button" id="button-confirm"><span>Cancel Order</span></a>
        <?php
         if($this->session->userdata('member_login')!=""){ 
            echo '<a class="button" id="btn_confirm"><span>Confirm Order .</span></a>';
          }else{
            echo ' <a href="'.base_url("checkout/checkout").'"  class="button" id="button-continu"><span>Confirm Order</span></a>';  
          }    
        ?>
         <input type="submit" value="proses" class="button-red" id="btn-proses">
          <a href="<?=base_url("frontend/checkout")?>" class="button-red"> Ulangi </a>
     &nbsp; 
    
        <input type="image" src="<?=base_url("assets/images/btn_paypal_checkout.gif")?>" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!" class="btnPaypall">
        <img src="<?=base_url("assets/images/loading.gif")?>" class="loading"/>
             <br/> 
         <input type="submit"  value="proses" class="button" />
      </div>
    </div>
  </div>
</form>
</div>
</div>