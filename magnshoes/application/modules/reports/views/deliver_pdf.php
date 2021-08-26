<?php 
$data["title"]=$title;
$data["title_header"]="laporan pengiriman";
$this->load->view("reports/header_pdf",$data);
?>
  <table cellpadding="0" cellspacing="0" border="1" id="reports" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>No KTP</th>
        <th>Tanggal</th>
        <th>Status Pembayaran</th>
        <th>Type Pembayaran</th>
        <th>Kode Pengiriman</th>
        <th>Vendor</th>
        <th>Alamat</th>
        <th>Status Pengiriman</th>
        <th>Biaya Pengiriman</th>
        <th>Total</th>
      </tr>
  </thead>
  <tbody>
  <?php
  if(count($rows)>0){
    foreach($rows as $i => $d):
       $kirim = $this->dv->find_entity_by("pembelian_id",$d->id);
       if(!empty($kirim->id)){
       $tarif = $this->f->find_entity_by_id($kirim->tarif_id);
       $vendor = $this->v->find_entity_by_id($kirim->vendor_id);
       $member = $this->m->find_entity_by("no_ktp",$d->member_no_ktp);
       if($kirim->status_pengiriman == "belum"){
          $btn_status = "<span class='label label-important'>Belum</span>";
       }else if($kirim->status_pengiriman == "mengirim"){
          $btn_status = "<span class='label label-warning'>Mengirim</span>";
       }else if($kirim->status_pengiriman =="terkirim"){
          $btn_status = "<span class='label label-success'>Terkirim </span>";
       }else{

       }
    ?>
      <tr class="data_content">
        <td><?=($i+1)?></td>
        <td></td>
        <td><?=$d->member_no_ktp?></td>
        <td><?=$d->tanggal?></td>
        <td>
          <?=($d->status_pembayaran=="blom")? "<span class='label label-important'>Belum</span>": "<span class='label label-success'>Sudah</span>"; ?>
          </td>
        <td><?=$d->type_pembayaran?></td>
        <td> <?=$kirim->kode_pengiriman?> </td>
        <td> <?=$vendor->nama?> </td>
        <td> <?=$kirim->alamat?> </td>
        <td> <?=$btn_status?> </td>
        <td> Rp.<?=number_format($kirim->total_biaya)?>  </td>

        <td>Rp.<?=number_format($d->total)?></td>

      </tr>
    <?php } endforeach;?>
  <?php } ?>
  </tbody>
</table>
