<?php
$this->load->model("kota/kota_model","k");
$this->load->model("propinsi/propinsi_model","prop");
$this->load->model("kecamatan/kecamatan_model","kc");
$this->load->model("kelurahan/kelurahan_model","kl");

$member = $this->mem->find_entity_by("email",$this->session->userdata("member_login"));
$val_kelurahan = $this->kl->find_entity_by_id($member->kelurahan_id);
$val_kecamatan= $this->kc->find_entity_by_id($val_kelurahan->kecamatan_id) ;
$val_kota = $this->k->find_entity_by_id($val_kecamatan->kota_id) ;
$val_prop =  $this->prop->find_entity_by_id($val_kota->propinsi_id) ;
?>
<script type="text/javascript">
$(document).ready(function(){
  var default_html = '<option value="pilih" > -- Pilih -- </option> <option value="transfer" > -- Transfer -- </option><option value="paypall" > -- Paypall -- </option><option value="setor_tunai" > -- Setor Tunai-- </option>';
  var cod_html = '<option value="pilih" > -- Pilih -- </option> <option value="transfer" > -- Transfer -- </option> <option value="cod" > -- Cash On Deliver -- </option><option value="paypall" > -- Paypall -- </option><option value="setor_tunai" > -- Setor Tunai-- </option>';
  // val_kelurahan("<?=$member->kelurahan_id?>");
  // val_kecamatan("<?=$member->kelurahan_id?>");
  // val_kota("<?=$member->kelurahan_id?>");
  // val_prop("<?=$member->kelurahan_id?>");

  $("#frm-nama").val("<?=$member->nama?>");
  $("#frm-alamat").val("<?=$member->alamat?>");
  $("#frm-telp").val("<?=$member->telp?>");

  $("#btn-proses").hide();
  // $("#checkout").hide();
  $("#form-pembayaran").slideUp("slow");
  $(".btnPaypall").hide();
  $(".loading").hide();
  // $("#form-product").hide();
  $("#info-member").hide();
  $("#checkout").hide();
  $("#btn_confirm").click(function(){
    $("#checkout").show();
   });

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
    $("#frm-kelurahan_id").change(function(){
      if($(this).val()!=""){
        $("#frm-kelurahan_id2").val($(this).val());
      }
    });

    $("#frm-vendor").change(function(){
      var id=$(this).val();
      if($("#kirimke").val()=="AL"){
        var kota = "null";
        $("#frm-kota_id").show();
        $("#frm-kota_id2").hide();
      }else{
        $("#frm-kota_id").hide();
        $("#frm-kota_id2").show();
        var kota = $("#frm-kota_id2").val();
      }
      // console.log(kota);
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
           var input_wieght= parseInt($("#total_berat").val());
           var wieght = (qty * parseInt(input_wieght));

           if(input_wieght < 1){
            var newWieght = (input_wieght * 1).toFixed();
           }else{
            var newWieght = input_wieght.toFixed();
           }
           var biaya_tambahan = data * newWieght ;
           console.log(biaya_tambahan+"="+data+"*"+input_wieght);
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

    $("#kirimke").change(function(){
      var val = $(this).val();
      if(val=="AM"){
        $("#info-member").show();
        $("#frm-nama").val("<?=$member->nama?>");
        $("#frm-alamat").val("<?=$member->alamat?>");
        $("#frm-telp").val("<?=$member->telp?>");
        $(".input-text").hide();
        $(".field-text").show();
      }else if(val=="AL"){
        $("#info-member").show();
        $("#frm-nama").val("");
        $("#frm-alamat").val("");
        $("#frm-telp").val("");
        $(".input-text").show();
        $(".field-text").hide();
      }else{
        $("#info-member").hide();
        $(".field-text").hide();
      }
    });
    // $(".transfer").hide();

    $("#frm-type_pembayaran").change(function(){
      var data = $(this).val();
      if(data=="transfer"){
        $(".transfer").show();
        $("#btn_finish").show();
        $(".btnPaypall").hide();
      }else if(data=="setor_tunai"){
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
           var wieght = (parseInt(input_wieght));

           if(input_wieght < 1){
            var newWieght = (input_wieght * 1).toFixed();
           }else{
            var newWieght = input_wieght.toFixed();
           }
           var biaya_tambahan = data * input_wieght ;

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
        $("#label_kirimke").hide();
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
<?php $invoice = mt_rand(1, 1000);?>
<div id="checkout">
  <div class="checkout-heading" style="border-radius:6px 6px 0 0;">
    <div class="marker-chekout">Detail Shop</div>
  </div>
  <div id="label_kirimke">
    Kirim Ke :
    <select id="kirimke" >
      <option value="">--Tujuan Pengiriman--</option>
      <option value="AM">Alamat member</option>
      <option value="AL">Alamat Lain</option>
    </select>
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
              <input type="text" class="required input-text" name="nama" id="frm-nama" />
              <span id="text-nama" class="field-text"><?=$member->nama?> </span>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required">*</span>Propinsi:
            </td>
            <td>
            <span class="field-text"><?=$val_prop->nama?> </span>
             <select id="frm-prop_id" class="q1 required input-text">
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
              <span id="text-kota" class="field-text"><?=$val_kota->nama?> </span>
              <input type="hidden" id="frm-kota_id2" value="<?=$val_kota->id?>">
              <select id="frm-kota_id" class="q1 required input-text">
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required">*</span> Kecamatan :
            </td>
            <td><span id="text-kecamatan" class="field-text"><?=$val_kecamatan->nama?> </span>
              <select id="frm-kecamatan_id" class="q1 required input-text">
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required">*</span> Kelurahan :
            </td>
            <td><span id="text-kelurahan" class="field-text"><?=$val_kelurahan->nama?> </span>
              <select id="frm-kelurahan_id" class="required q1 input-text">
              </select>
              <input type="hidden" id="frm-kelurahan_id2" name="kelurahan_id" value="<?=$val_kelurahan->id?>">
            </td>
          </tr>
          <tr>
            <td>
              <span class="required ">*</span> Alamat Lengkap:
            </td>
            <td><span id="text-alamat" class="field-text"><?=$member->alamat?> </span>
              <textarea id="frm-alamat" class="q1 required input-text" name="alamat" style="width:200px; height:70px"> </textarea>
            </td>
          </tr>
          <tr>
            <td>
              <span class="required ">*</span> No Telp :
            </td>
            <td><span id="text-alamat" class="field-text"><?=$member->telp?> </span>
              <input type="text" class="q1 required input-text" name="telp"  id="frm-telp"/>
            </td>
          </tr>
          </tbody>
          </table>
         <!-- <b style="color:red">** Silahkan ubah formulir diatas untuk merubah alamat pengriman/tujuan anda</b><br/> -->
          <input type="button" value="selanjutnya >>" class="button-red" id="btn-lanjut-pembayaran">
        </fieldset>
         <fieldset id="form-pembayaran">
          <legend> Informasi Pengiriman </legend>
            <table>
              <tbody>
              <tr>
                <td>
                  <!-- <span class=" ">*</span> Type Pembayaran : -->
                </td>
                <td>
                  <input type="hidden" name="type_pembayaran">
                 <!--  <select id="frm-type_pembayaran" class="required q1" name="type_pembayaran">

                  </select> -->
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
                  <input type='hidden' name='tarif_id' value='99999' id='tarif_id_input'/>
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
  <?php if(count($cart)>0){ ?>
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
          // echo "<pre>";
          // print_r($cart);
         foreach ($cart as $items):
          $jml = $items->qty * $items->harga;
          $subtotal = $jml + $subtotal;
          $qty +=$items->qty;
          if($items->min_quantity <= $items->qty){
              $disk = (($items->diskon / 100) * $items->qty * $items->harga);
            }else{
              $disk = 0;
            }
          $diskon = $disk + $diskon ;
          $berat = $this->dp->find_entity_by("id",$items->detail_produk_id);
          $ttl_brt += $berat->berat * $items->qty ;
        ?>
      <tr>
        <td class="name"><a href="#"><?=$items->name?></a>
        </td>
        <td class="model">
          <?=$berat->berat?>
          <input type="hidden" name="detail_produk_id[]" id="detail_produk_id" value="<?=$items->detail_produk_id?>">
          <input type="hidden" name="daftar_harga_id[]" id="harga_id" value="<?=$items->daftar_harga_id?>">
          <input type="hidden" name="diskon_id[]" id="diskon_id" value="<?=$items->diskon_id?>">
          <input type="hidden" name="dquantity[]" id="dquantity" value="<?=$items->qty?>">
        </td>
        <td class="quantity"><?=$items->qty?></td>
        <td class="price" style="text-align: right !important;"><?=$this->cart->format_number($items->harga)?></td>
        <td class="total"  style="text-align: right !important;"><?=$this->cart->format_number($items->qty*$items->harga)?></td>
      </tr>
      <?php endforeach; ?>
    <?php } ?>

    </tbody>
    <tfoot>
      <tr>
        <td class="price" colspan="4"><b>Sub-Total:</b></td>
        <td class="total" style="text-align: right !important;">Rp.<?=$this->cart->format_number($subtotal)?></td>
      </tr>
      <tr>
        <td class="price" colspan="4"><b>Diskon ():</b></td>
        <td class="total" style="text-align: right !important;">Rp.<?=$this->cart->format_number($diskon)?></td>
      </tr>
      <tr id="tr-tambahan_biaya">
        <td class="price" colspan="4"><b>Total <span id="ket_total"> </span>:</b></td>
        <td class="total" id="biaya_tambahan" style="text-align: right !important;"></td>
      </tr>
      <tr>
        <td class="price" colspan="4"><b>Total:</b>
          <input type="hidden" name="subtotal" id="subtotal" value="<?=$subtotal?>">
          <input type="hidden" name="total_keseluruhan" id="total_keseluruhan" value="<?=($subtotal - $diskon)?>">
          <input type="hidden" name="quantity" id="quantity" value="<?=$qty?>">
          <input type="hidden" name="tambahan_biaya" id="tambahan_biaya" value="0">
          <input type="hidden" id="total_berat" value="<?=$ttl_brt?>">

        </td>
        <td class="total" id="total_biaya" style="text-align: right !important;">Rp.<?=$this->cart->format_number($subtotal - $diskon)?>
           </td>
      </tr>

    </tfoot>
  </table>

  <div class="payment">
    <div class="buttons">
      <div class="right">
        <a href="<?=base_url("checkout/cancel_order")?>" class="button" id="button-confirm"><span>Reset</span></a>
        <?php
         if($this->session->userdata('member_login')!=""){
            echo '<a class="button" id="btn_confirm"><span>Konfirmasi Pesanan</span></a>';
          }else{
            echo ' <a href="'.base_url("checkout/checkout").'"  class="button" id="button-continu"><span>Konfirmasi Pesanan</span></a>';
          }
        ?>
         
        <input type="image" src="<?=base_url("assets/images/btn_paypal_checkout.gif")?>" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!" class="btnPaypall">
        <img src="<?=base_url("assets/images/loading.gif")?>" class="loading"/>
             <br/>
         <!-- <input type="submit"  value="proses" class="button" /> -->
      </div>
    </div>
  </div>
  <?php }?>
</form>

</div>
</div>
