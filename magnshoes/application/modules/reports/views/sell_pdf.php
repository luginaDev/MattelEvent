<?php 
$data["title"]=$title;
$data["title_header"]="laporan penjualan";
$this->load->view("reports/header_pdf",$data);
?>
  <table cellpadding="0" cellspacing="0" border="1" id="reports" width="100%" >
    <thead>
    <tr>
        <th>No</th>
        <th>No Invoice</th>
        <th>Nama</th>
        <th>No KTP</th>
        <th>Tanggal</th>
        <th>Status Pembayaran</th>
        <th>Type Pembayaran</th>
        <th>Subtotal</th>
        <th>Total</th>

      </tr>
  </thead>
  <tbody>
  <?php
  if(count($rows)>0){
    foreach($rows as $i => $d):
      $member = $this->m->find_entity_by("no_ktp",$d->member_no_ktp);
    ?>
      <tr class="data_content">
        <td><?=($i+1)?></td>
        <td><?=$d->invoice?></td>
        <td><input type="hidden" id="nama-<?=$d->id?>" value=""/><?=(empty($member->nama)? "-" : $member->nama )?></td>
        <td><?=$d->member_no_ktp?></td>
        <td><?=date("d-m-Y",strtotime($d->tanggal))?></td>
        <td>
          <?=($d->status_pembayaran=="blom")? "<span class='label label-important'>Belum</span>": "<span class='label label-success'>Sudah</span>"; ?>
          </td>
        <td><?=$d->type_pembayaran?> </td>
        <td>Rp.<?=number_format($d->subtotal)?></td>
        <td>Rp.<?=number_format($d->total)?></td>
      </tr>
    <?php endforeach;?>
  <?php } ?>
  </tbody>
</table>
</body>
</html>