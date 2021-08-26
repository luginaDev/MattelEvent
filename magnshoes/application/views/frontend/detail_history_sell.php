<script>
  $(document).ready(function(){
    $(".btnPaypall").hide();
     $("#frm-type_pembayaran").change(function(){
      var data = $(this).val();
      if(data=="transfer"){
        $(".transfer").show();
        $("#procces").show();
        $(".btnPaypall").hide();
      }else if(data=="setor_tunai"){
        $(".transfer").show();
        $("#btn_finish").show();
        $(".btnPaypall").hide();
      }else if(data == "cod"){
        // var kota = $("#frm-kota_id").val();
        // if(kota==1){
        //   alert("cod dpt dilakukan");
        //   $(".transfer").hide();
        //   $("#btn_finish").show();
        //   $(".btnPaypall").hide();
        // }
      }else if(data == "paypall"){

        // $(".transfer").show();
        // $("#form-bank").hide();
        // $("#btn_finish").hide();
        $(".btnPaypall").show();
        $("#procces").hide();
        $(".btnPaypall").focus();
      }else{

      }
    });

    $(".btnPaypall").live("click",function(){
      $(this).hide();
      $(".loading").show();
      $.post("<?=base_url("checkout/new_proccess_ordering_paypal")?>",$("#form-transfer").serialize(),function(data){
        // console.log(data);
          $.colorbox({html:data});
          $(".loading").hide();
          $(this).show();
        });
      return false;
    });

    $(".curd_edit").click(function(){
      var id = $(this).attr("id");
      var nama = $("#nama-"+id).val();
      var deskripsi = $("#deskripsi-"+id).val();
      $("#frm-id").val(id);
      $("#frm-nama").val(nama);
      $("#frm-deskripsi").val(deskripsi);
      $('#myModal').modal('show');
    });
    var detail = function(){
      var id = $(this).attr("id");
      $.post("<?=base_url("sells/detail")?>", { id: id} ,function(data){
        console.log(data);
      });
    }
    $("#bank_div").hide();
    $("#rekening_asal").hide();
    $("#total_bayar").hide();
    $("#tanggal_bayar").hide();

    $("#update_payment").hide();
    $("#batal_payment").hide();
    $(".curd_detail").click(detail);
    $("#edit_payment").click(function(){
      $(this).hide();
      $("#info_bank_div").hide();
      $("#bank_div").show();
      // $("#update_payment").show();
      $("#batal_payment").show();
      $("#rekening_asal").show();
      $("#total_bayar").show();
      $("#tanggal_bayar").show();

      $("#total_cus_bayar").hide();
      $("#norek_cus_bayar").hide();
      $("#span_tanggal_bayar").hide();

    });
    $("#rekening_id").change(function(){
      var no_rek = $(this).attr("value").split("/");
      $("#info_rekening_div").html(no_rek[1]);
      $("#no_rek_tujuan").val(no_rek[1]);
    });

    $("#update_payment").hide();
    $(".validation_payment").hide();
    $("#total_bayar").keyup(function(){
      var input = $(this).val();total = $("#total_jual_js").val();
      // console.log(input +">="+total);
       if(parseInt(input) >= parseInt(total) ){
        $("#update_payment").show();
        $(".validation_payment").hide();
       }else{
        $("#update_payment").hide();
        $(".validation_payment").show();
       }
      //alert("1");
    });
  });
</script>
<?php
$this->load->model("rekening/rekening_model","rek");
$this->load->model("payments/payment_model","pm");
$data["rek"] = $this->rek->find_entity_by_id($data["jual"][0]->rekening_id);
$deliver = $this->dv->find_entity_by("pembelian_id",$data["jual"][0]->id);
$payment = $this->pm->find_entity_by("pembelian_id",$data["jual"][0]->id);

?>
<div class="checkout-heading" style="border-radius:6px 6px 0 0;">
  <div class="marker-chekout"><?=$title_form?></div>
</div>
<div class="checkout-content" style="border-bottom: 1px solid rgb(223, 225, 228); border-radius: 6px 6px 6px 6px; margin-top: 7px; display: block;" id="form-product">

  <div class="checkout-product">

    <table cellspacing="0" cellpadding="0" border="1" width="100%" id="cartContentsDisplay">
      <thead>
      <tr>
        <th>Invoice </th>
        <th><?=$data["jual"][0]->invoice?></th>
        <th style="width:30%">&nbsp;</th>
        <th>Nama Penerima</th>
        <th colspan="2"><?=(empty($deliver->nama) ? "-": $deliver->nama)?></th>
      </tr>
      <tr>
        <th> &nbsp;</th>
        <th>&nbsp;</th>
        <th style="width:30%">&nbsp;</th>
        <th>Alamat Penerima</th>
        <th colspan="2"><?=(empty($deliver->alamat) ? "-": $deliver->alamat)?></th>
      </tr>
      <tr>
        <th>No Ktp</th>
        <th><?=$data["jual"][0]->member_no_ktp?></th>
        <th style="width:30%">&nbsp;</th>
        <th>Tanggal</th>
        <th colspan="2"><?=date("d-m-Y",strtotime($data["jual"][0]->tanggal))?></th>
      </tr>
      <tr>
        <th>Nama </th>
        <th><?=$data["member"]->nama?></th>
        <th style="width:30%">&nbsp;</th>
        <th>Status Pembayaran</th>
        <th colspan="2"><?=$data["jual"][0]->status_pembayaran?></th>
      </tr>
      <tr>
        <th>Telp </th>
        <th><?=$data["member"]->telp?></th>
        <th style="width:30%">&nbsp;</th>
        <th>Type Pembayaran</th>
        <th colspan="2">
          <?php if($data["jual"][0]->type_pembayaran==""){?>
          
          <form method="post" action="<?=base_url("checkout/update_payment")?>" novalidate="validate" id="form-transfer">
            <select id="frm-type_pembayaran" class="required q1" name="type_pembayaran">
              <option value="">--Pilih--</option>
              <option value="transfer">Transfer</option>
              <option value="paypall">Paypal</option>
            </select>
            <input type="hidden" value="<?=$data["jual"][0]->id?>" name="id_pembelian" id="id_pembelian"> 
            <input type="submit" id="procces" value="Simpan"> 
            <input type="image" src="<?=base_url("assets/images/btn_paypal_checkout.gif")?>" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!" class="btnPaypall" width="100px">
              <img src="<?=base_url("assets/images/loading.gif")?>" class="loading"/>
             <br/>
          </form>
          <?php }else{?>
          <?=$data["jual"][0]->type_pembayaran?>
          <?php } ?>
          </th>
      </tr>
      <?php if($data["jual"][0]->type_pembayaran!=""){?>
      <form method="post" action="<?=base_url("checkout/save_payment")?>" novalidate="validate" id="form-validate">
      <?php if($data["jual"][0]->type_pembayaran != "paypall"){ ?>
        <input type="hidden" name="email" value="<?=$data["member"]->email?>" />
        <input type="hidden" name="invoice" value="<?=$data["jual"][0]->invoice?>" />
        <input type="hidden" name="status_pembayaran" value="konfirmasi" />
        <input type="hidden" class="input-xlarge" id="frm-id" name="pembelian_id" value="<?=$data["jual"][0]->id?>">
      <tr>
        <th>Bank  </th>
        <th>
          <div id="info_bank_div">
          <?=(empty($data["rek"]->bank) ? "-": $data["rek"]->bank) ?>
          </div>
          <div id="bank_div">
            <select  class="q1 required" name="rekening_id" id="rekening_id" required>
              <option>--pilih--</option>
              <?php
                 $rek = $this->rek->find(array(),0,-1);
                foreach($rek as $rk){
                  echo "<option value='".$rk->id."/$rk->rekening'> $rk->bank</option>";
                }
              ?>
            </select>
          </div>
        </th>
        <th style="width:30%">&nbsp;</th>
        <th>Rekening</th>
        <th>
            <input type="hidden" name="no_rek_tujuan" id="no_rek_tujuan" class="number" required/>
          <div id="info_rekening_div">
            <?=(empty($data["rek"]->rekening) ? "-": $data["rek"]->rekening)?>
          </div>
        </th>
        <th>
          <!-- <a id="">Edit</a> -->
          <?=($data["jual"][0]->status_pembayaran=="blom")? '<input type="button" value="Konfirmasi Pembayaran" id="edit_payment">' : '' ?>

          <input type="submit" value="Simpan" id="update_payment">
          <input type="reset" value="Batal" id="batal_payment">
        </th>
      </tr>
      <tr>
        <th>Total bayar </th>
        <th><input type="text" name="total" id="total_bayar" class="number" value="<?=(empty($payment->total) ? "0": $payment->total) ?>" required >
          <span id="total_cus_bayar"><?=(empty($payment->total) ? "0": $payment->total) ?> </span>
          <b style="color:red" class="validation_payment">** total bayar harus sesuai dengan total pembelian</b><br/>
        </th>
        <th style="width:30%">&nbsp;</th>
        <th><?= $data["jual"][0]->type_pembayaran=="setor_tunai" ? "No pembayaran": "No Rekening konsumen" ?></th>
        <th colspan="2">
          <span id="norek_cus_bayar"><?=(empty($payment->no_rekening) ? "0": $payment->no_rekening) ?> </span>

          <input type="text" name="no_rekening" id="rekening_asal" class="number" required value="<?=(empty($payment->no_rekening) ? "0": $payment->no_rekening) ?>"/>
        </th>
      </tr>
      <tr>
        <th>Tanggal Bayar</th>
        <th colspan="2">
          <span id="span_tanggal_bayar"><?=(empty($payment->tanggal_bayar) ? "0": date("d-m-Y",strtotime($payment->tanggal_bayar))) ?> </span>

          <input type="text" name="tanggal_bayar" id="tanggal_bayar" class="tanggal" value="<?=(empty($payment->tanggal_bayar) ? "0": $payment->tanggal_bayar) ?>"/>
        </th>
      </tr>
        <?php } ?>
    </form>
    <?php } ?>
    </thead>
    <tbody>
      <tr>
        <td colspan="6">
          <br/>
          <table cellspacing="0" cellpadding="0" border="0" width="100%" id="cartContentsDisplay">
            <thead>
              <tr style="border-top: 1px solid #E1E1E1">
                <td>#</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Qty</td>
                <td>Diskon</td>
                <td>Subtotal</td>
                <td>Retur</td>
              </tr>
            </thead>
            <tbody>
              <?php
                $qty=0;
                $ttl_diskon = 0;
              ?>
              <?php foreach($data["detail"] as $i => $val):

              $detail = $this->dp->find_entity_by_id($val->detail_produk_id);
              $harga = $this->dh->find_entity_by_id($val->daftar_harga_id);
              $kirim = $this->dv->find(array("pembelian_id"=>$val->pembelian_id),0,1);
              if(count($data["retur"]) > 0){
                $detail_retur  = $this->det_retur->find(array("retur_pembelian_id" => $data["retur"]->pembelian_id, "detail_pembelian_id" => $val->id),0,1);
              }else{
                $detail_retur = 0;
              }
              if(!empty($val->diskon_id)){
                $diskon = $this->dc->find_entity_by_id($val->diskon_id)->diskon;
              }else{
                $diskon = 0;
              }
              $qty += $val->quantity;
              $sub =  $harga->harga * $val->quantity;
              $diskon_rupiah = ((($diskon * $sub) * $val->quantity )/100) ;
              $ttl_diskon  += $diskon_rupiah ;

              if(count($deliver) > 0){
                if($deliver->status_pengiriman == "terkirim"){
                  if(is_array($detail_retur) and count($detail_retur) > 0){
                    if($detail_retur[0]->status == "cofirm"){
                      $status_kirim = "<b> <a class='ajax' href='".base_url("checkout/confirm_retur/".$val->id)."' title='Konfirmasi Retur'> Konfirmasi </a> </b>";
                    }elseif($detail_retur[0]->status == "disetujui"){
                      $status_kirim = "Disetujui";
                    }elseif($detail_retur[0]->status == "ditolak"){
                      $status_kirim = "Ditolak";
                    }elseif($detail_retur[0]->status == "accept_confirm"){
                      $status_kirim = "Menunggu Persetujuan";
                    }elseif($detail_retur[0]->status == "confirm"){
                      $status_kirim = "Disetujui";
                    }else{
                      $status_kirim = "proses";
                    }
                  }else{
                    $status_kirim = "<b> <a class='ajax' href='".base_url("checkout/add_retur/".$val->id."/".$val->detail_produk_id)."' title='Status Pengiriman'> Tambah Retur </a> </b>";
                    // $status_kirim = "<b> <input type='checkbox'> </b>";
                  }
                }else{
                  $status_kirim = "-";
                }
              }else{
                 $status_kirim = "-";
              }

              ?>
                <tr>
                  <td><?=($i+1)?></td>
                  <td><?=$detail->id?></td>
                  <td><?=$detail->nama?></td>
                  <td align="right">Rp.<?=number_format($harga->harga)?></td>
                  <td><?=$val->quantity?></td>
                  <td style="text-align: right !important;"><?=$diskon?>% (Rp.<?=number_format($diskon_rupiah)?>)</td>
                  <td align="right" style="text-align: right !important;">Rp.<?=number_format($sub)?></td>
                  <td><?=$status_kirim?><?=(empty($detail_retur[0]->keterangan_verifikasi)? "" : "(".$detail_retur[0]->keterangan_verifikasi.")" )?></td>
                </tr>
              <?php endforeach;?>
            </tbody>
            <tfoot>
              <!-- <form method="post" name="form" id="form-validate" action="<?=base_url("sells/save_payment")?>"> -->
               <tr>
                <td colspan="5">&nbsp;</td>
                <td>SubTotal</td>
                <td>Rp.<?=number_format($data["jual"][0]->subtotal)?></td>
              </tr>
              <tr>
                <td colspan="5">&nbsp;</td>
                <td>Diskon</td>
                <td>Rp.<?=number_format($ttl_diskon)?></td>
              </tr>
              <tr>

                <td colspan="5">&nbsp;</td>
                <td>Biaya Tambahan</td>
                <td>Rp.<?=number_format((empty($deliver->total_biaya) ? 0 : $deliver->total_biaya ) )?></td>
              </tr>
              <tr>
                <td colspan="5">&nbsp;</td>
                <td>Total</td>
                <input type="hidden" id="total_jual_js" value="<?=$data["jual"][0]->total?>" />
                <td>Rp.<?=number_format($data["jual"][0]->total)?></td>
              </tr>
              <tr>
                <td colspan="5">&nbsp;</td>
                <td></td>
                <td> </td>
              </tr>
            <!-- </form> -->
            </tfoot>
          </table>
          <br/>
        </td>
      </tr>
    </tbody>
  </table>
  <a href="<?=base_url("frontend/history_wish")?>" > Kembali </a>
  <a href="<?=base_url("frontend/history_wish")?>" > Retur </a>

  <?php if($data["jual"][0]->status_pembayaran=="blom"){ ?>
    <!-- <a href="<?=base_url("frontend/cancel_buy/".$data["jual"][0]->id."")?>" > Pembatalan Pembelian </a> -->
  <?php } ?>
</div>
</div>
