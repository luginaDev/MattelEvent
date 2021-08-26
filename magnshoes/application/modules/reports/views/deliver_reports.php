<script>
  $(document).ready(function(){
    

  });
</script>
    <h2><?=$title_form?></h2>
    <br/>
    <form class="well" action="<?=base_url('reports/deliver_reports')?>" method="post">
    <?=$this->load->view("reports/_search_form")?>
    </form>
    <br/>
    <?=$pdf_link?>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="reports">
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
      foreach($data[0] as $i => $d):
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
      <tr>
        <td><?=($i+1)?></td>
        <td><input type="hidden" id="nama-<?=$d->id?>" value=""/></td>
        <td><?=$d->member_no_ktp?>
          <input type="hidden" id="member_no_ktp-<?=$d->id?>" value="<?=$d->member_no_ktp?>"/>
          <input type="hidden" id="invoice-<?=$kirim->id?>" value="<?=$d->invoice?>"/>
          <input type="hidden" id="email-<?=$kirim->id?>" value="<?=$member->email?>"/>
          <input type="hidden" id="vendor-<?=$kirim->id?>" value="<?=$vendor->nama?>"/>
        </td>
        <td><?=$d->tanggal?> <input type="hidden" id="tanggal-<?=$d->id?>" value="<?=$d->tanggal?>"/></td>
        <td>
          <?=($d->status_pembayaran=="blom")? "<span class='label label-important'>Belum</span>": "<span class='label label-success'>Sudah</span>"; ?>
          <input type="hidden" id="status_pembayaran-<?=$d->id?>" value="<?=$d->status_pembayaran?>"/></td>
        <td><?=$d->type_pembayaran?> <input type="hidden" id="type_pembayaran-<?=$d->id?>" value="<?=$d->type_pembayaran?>"/></td>
        <td> <?=$kirim->kode_pengiriman?> </td>
        <td> <?=$vendor->nama?> </td>
        <td> <?=$kirim->alamat?> </td>
        <td> <?=$btn_status?> </td>
        <td> Rp.<?=number_format($kirim->total_biaya)?>  </td>

        <td>Rp.<?=number_format($d->total)?> <input type="hidden" id="total-<?=$d->id?>" value="<?=$d->total?>"/></td>

      </tr>
    <?php } endforeach;?>
    </tbody>
  </table>
</div>
