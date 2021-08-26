<div class="checkout-heading" style="border-radius:6px 6px 0 0;">
  <div class="marker-chekout">Histori Belanja</div>
</div>
<div class="checkout-content" style="display: block; ">
  <div id="detail_deliver">

<div class="checkout-product">
  <table cellspacing="0" cellpadding="0" border="0" width="100%" id="cartContentsDisplay">
    <thead>
      <tr>
        <th>No</th>

        <th>Invoice</th>
        <th>Tanggal</th>
        <th>Status Pembayaran</th>
        <th>Status Pengiriman</th>
        <th>Type Pembayaran</th>
        <th>Subtotal</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php
        $this->load->model("returns/return_model","retur");
        foreach($rows["data"] as $i => $d):

        $deliver = $this->deliver->find_entity_by("pembelian_id",$d->id);

        if(count($deliver) > 0){
          if($deliver->status_pengiriman == "belum"){
           $status_kirim = "belum";
          }else{
             $status_kirim = "<b> <a class='ajax' href='".base_url("partials/detail_kirim/".$d->id)."' title='Status Pengiriman'> ".$deliver->status_pengiriman." </a> </b>";
          }
        }else{
           $status_kirim = "belum";
        }
        if($d->status_pembayaran=="blom"){
          $status_pembayaran = "belum";
        }elseif($d->status_pembayaran=="konfirmasi"){
          $status_pembayaran = "Konfirmasi";
        }else{
          $status_pembayaran = "sudah";
        }
      ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->invoice?></td>
        <td><?=date("d-m-Y",strtotime($d->tanggal))?></td>
        <td>
          <?=$status_pembayaran?>
        </td>
        <td>  <?=$status_kirim?></td>
        <td><?=$d->type_pembayaran?> <input type="hidden" id="type_pembayaran-<?=$d->id?>" value="<?=$d->type_pembayaran?>"/></td>
        <td style="text-align: right !important;">Rp.<?=number_format($d->subtotal)?> <input type="hidden" id="subtotal-<?=$d->id?>" value="<?=$d->subtotal?>"/></td>
        <td style="text-align: right !important;">Rp.<?=number_format($d->total)?> <input type="hidden" id="total-<?=$d->id?>" value="<?=$d->total?>"/></td>
        <td class="detail_td">
          <a href="<?=base_url('frontend/add_payment/'.$d->id)?>" class="curd_detail" id="<?=$d->id?>" > Detail  </a>
        </td>
      </tr>
      <div id="divDetailKirim-<?=$d->id?>" style="display:none">
        <h4>Detail Pengiriman </h4>

      </div>
      <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
</div>
