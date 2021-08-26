
<script>
  $(document).ready(function(){
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

    $(".curd_detail").click(detail);
   
    
    $("#commentForm").validate();
    <?php if($data["jual"]->type_pembayaran=="cod"){ ?>
    	$("#frm-no_rekening").val('0');
    	$("#frm-no_rekening").hide();
    	$("#frm-total").hide();
    	$(".label_hide").hide();
    <?php 	}else{ ?>
    		$("#frm-no_rekening").show();
    	$("#frm-total").show();
    	<?php } 	?> 
  });
</script>
<?php 
$this->load->model("rekening/rekening_model","rek");
$data["rek"] = $this->rek->find_entity_by_id($data["jual"]->rekening_id);
$deliver = $this->dv->find_entity_by("pembelian_id",$data["jual"]->id);

?>
    <h2><?=$title_form?></h2>
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" >
      <thead>
      <tr>
        <th>Invoice </th>
        <th><?=$data["jual"]->invoice?></th>
        <th style="width:30%">&nbsp;</th>
        <th>Nama Penerima</th>
        <th><?=(empty($deliver->nama) ? '-' : $deliver->nama )?></th>
      </tr>
      <tr>
        <th> &nbsp;</th>
        <th>&nbsp;</th>
        <th style="width:30%">&nbsp;</th>
        <th>Alamat Penerima</th>
        <th><?=(empty($deliver->alamat) ? '-' : $deliver->alamat )?></th>
      </tr>
      <tr>
        <th>No Ktp</th>
        <th><?=$data["jual"]->member_no_ktp?></th>
        <th style="width:50%">&nbsp;</th>
        <th>Tanggal</th>
        <th><?=date("d-m-Y",strtotime($data["jual"]->tanggal))?></th>
      </tr>
      <tr>
        <th>Nama </th>
        <th><?=$data["member"]->nama?></th>
        <th style="width:50%">&nbsp;</th>
        <th>Status Pembayaran</th>
        <th><?php 
          if($data["jual"]->status_pembayaran=="blom"){
          $status_pembayaran = "belum";
        }elseif($data["jual"]->status_pembayaran=="konfirmasi"){
          $status_pembayaran = "Konfirmasi";
        }else{
          $status_pembayaran = "sudah";
        }
        ?>
        <?=$status_pembayaran?></th>
      </tr>
      <tr>
        <th>Telp </th>
        <th><?=$data["member"]->telp?></th>
        <th style="width:50%">&nbsp;</th>
        <th>Type Pembayaran</th>
        <th><?=$data["jual"]->type_pembayaran?></th>
      </tr>
      <?php if($data["jual"]->type_pembayaran != "paypall"){ ?>
      <tr>
        <th>Bank </th>
        <th><?=(empty($data["rek"]->bank) ? '-' : $data["rek"]->bank ) ?></th>
        <th style="width:50%">&nbsp;</th>
        <th>Rekening</th>
        <th><?=(empty($data["rek"]->rekening) ? '-' : $data["rek"]->rekening ) ?></th>
      </tr>
      <?php } ?>
    </thead>
    <tbody>
      <tr>
        <td colspan="5">
          <br/>
          <table class="table"> 
            <thead>
              <tr>
                <td>#</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Qty</td>
                <td>Diskon</td>
                <td>Subtotal</td>
              </tr>
            </thead>
            <tbody>
              <?php $qty=0; ?>
              <?php foreach($data["detail"] as $i => $val):?>
              <?php 
              $detail = $this->dp->find_entity_by_id($val->detail_produk_id);  
              $harga = $this->dh->find_entity_by_id($val->daftar_harga_id); 
              $kirim = $this->dv->find(array("pembelian_id"=>$val->pembelian_id),0,1); 
              $payment = $this->pm->find_entity_by("pembelian_id",$val->pembelian_id);

              if(!empty($val->diskon_id)){
                $diskon = $this->dc->find_entity_by_id($val->diskon_id)->diskon; 
              }else{
                $diskon = 0;
              }
              $qty += $val->quantity;
              $sub =  $harga->harga * $val->quantity;
              $subtotal =$sub - (($diskon * $sub )/100) ;
              ?>
                <tr>
                  <td><?=($i+1)?></td>
                  <td><?=$detail->id?></td>
                  <td><?=$detail->nama?></td>
                  <td align="right">Rp.<?=number_format($harga->harga)?></td>
                  <td><?=$val->quantity?></td>
                  <td><?=$diskon?></td>
                  <td align="right">Rp.<?=number_format($subtotal)?></td>
                </tr>
              <?php endforeach;?>
            </tbody>
            <tfoot>
              <form method="post" name="form" id="commentForm" action="<?=base_url("sells/save_payment")?>"/>
               <?php if($data["jual"]->type_pembayaran != "paypall"){ 
                 $tipenya = "text";
               }else{
                  $tipenya ="hidden";
               }?>
               <tr>
                <td> 
                <?php
                  if($status_pembayaran!="sudah"){
                    if($data["jual"]->type_pembayaran != "paypall"){ ?>
                  <span class="label_hide">  
                    <?= ($data["jual"]->type_pembayaran == "setor_tunai")? "No Pembayaran" : "No Rekening" ?>
                    * </span> 
                  <?php } 
                    } ?>
                </td>
                <td colspan="2">:
                 <?php if($status_pembayaran!="sudah"){ ?>
                  <input type="<?=$tipenya?>" class="input-xlarge required" id="frm-no_rekening" name="no_rekening" required placeholder="masukan data valid" value="<?=((empty($payment->no_rekening) ? 0 : $payment->no_rekening ) ) ?>">
                  <?php } ?>
                  <input type="hidden" class="input-xlarge" id="frm-id" name="pembelian_id" value="<?=$data["jual"]->id?>">
                  <input type="hidden" class="input-xlarge" id="frm-id" name="invoice" value="<?=$data["jual"]->invoice?>">
                  <input type="hidden" class="input-xlarge" id="frm-id" name="email" value="<?=$data["member"]->email?>">
                </td>
                <td colspan="2">&nbsp;</td>
                <td>SubTotal</td>
                <td>Rp.<?=number_format($data["jual"]->subtotal)?></td>
              </tr>
              <tr>
                <td> <?php if($status_pembayaran!="sudah"){ ?><span class="label_hide"> Total *</span><?php } ?></td>
                <td colspan="2">
                  <?php if($status_pembayaran!="sudah"){ ?>:
                  <input type="text" class="input-xlarge required" id="frm-total" name="total" required placeholder="masukan data valid" value="<?=((empty($payment->total) ? 0 : $payment->total ) ) ?>">
                  <?php } ?>
                  </td>
                <td colspan="2">&nbsp;</td>
                <td>Biaya Tambahan</td>
                <td>Rp.<?=number_format((empty($kirim[0]->total_biaya) ? 0 : $kirim[0]->total_biaya ) *$qty)?></td>
              </tr>
              <tr>
                <td><?php if($status_pembayaran!="sudah"){ ?>Tanggal<?php } ?></td>
                <td colspan="2"><?php if($status_pembayaran!="sudah"){ ?>
                 : <input type="text" class="input-xlarge tanggal" id="frm-tanggal" name="tanggal"  data-date-format="dd-mm-yyyy" value="<?=date("d-m-Y")?>">
                 <?php } ?>
               </td>
                <td colspan="2">&nbsp;</td>
                <td>Total</td>
                <td>Rp.<?=number_format($data["jual"]->total)?></td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="2">
                  <?php if(!isset($data["jual"]->type_pembayaran)){ ?>
                  <?php if(($data["jual"]->type_pembayaran != "paypall") || ($data["jual"]->type_pembayaran != "cod") ){ ?>
                  Status Pembayaran : 
                  <?php if($payment->total >=$data["jual"]->total){
                    echo "Approve";
                    echo "<input type='hidden' value='sudah' name='status_pembayaran'> ";
                  }else{
                    echo "Tolak";
                    echo "<input type='hidden' value='blom' name='status_pembayaran'> ";
                  } ?> 
                  <?php } ?>
                  <?php } ?>
                </td>
                <td></td>
                <td>
                  <?php if($status_pembayaran!="sudah"){ ?>
                  <input type="submit" value="Simpan" class="btn btn-primary submit"> 
                  <?php } ?>
                </td>
              </tr>
            </form>
            </tfoot>
          </table>
          <br/>
        </td>
      </tr>
    </tbody>
  </table>
</div>
