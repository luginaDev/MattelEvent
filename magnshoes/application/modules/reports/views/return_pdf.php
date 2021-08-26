<?php 
$data["title"]=$title;
$data["title_header"]="laporan retur";
$this->load->view("reports/header_pdf",$data);
?>
  <table cellpadding="0" cellspacing="0" border="1" id="reports" width="100%">
    <thead>
    <tr >
      <th>No</th>
      <th>Gambar Retur</th>
      <th>No Ktp</th>
      <th>Tanggal pembelian</th>
      <th>Tanggal retur</th>
      <th>Type Pembayaran</th>
      <th>Jumlah retur</th>
      <th>Keterangan retur</th>
      <th>Keterangan Verifikasi</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(count($rows)>0){
    foreach($rows as $i => $d):
    $pem = $this->c->find_entity_by_id($d->pembelian_id);
    $detail_retur  = $this->drt->find(array("retur_pembelian_id" => $d->pembelian_id),0,-1);
    $gambar   = "<ul>";
    $ket      = "<ul>";
    $jumlah   = "<ul>";
    $ket_ver  = "<ul>";
    $status   = "<ul>";
    foreach($detail_retur as $dr){
      $gambar   .="<li> </li>";
      $ket      .= "<li>&nbsp; $dr->keterangan_retur </li>";
      $jumlah   .= "<li>&nbsp; $dr->jumlah </li>";
      $ket_ver  .= "<li>&nbsp; $dr->keterangan_verifikasi </li>";
      $status   .= "<li>&nbsp; $dr->status </li>";
    }
    $gambar   .= "</ul>";
    $ket      .= "</ul>";
    $jumlah   .= "</ul>";
    $ket_ver  .= "</ul>";
    $status   .= "</ul>";
  ?>
    <tr class="data_content">
      <td><?=($i+1)?></td>
      <td><?=$gambar?></td>
      <td><?=$pem->member_no_ktp?></td>
      <td><?=date("d-m-Y",strtotime($pem->tanggal))?> </td>
      <td><?=date("d-m-Y",strtotime($d->tanggal_retur))?> </td>
      <td><?=$pem->type_pembayaran?> </td>
      <td><?=$jumlah?></td>
      <td><?=$ket?></td>
      <td><?=$ket_ver?></td>
      <td><?=$status?></td>
    </tr>
  <?php endforeach;?>
  <?php } ?>
  </tbody>
</table>
