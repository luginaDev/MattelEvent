<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Gambar Retur</th>
        <th>Invoice</th>
        <th>Tanggal pembelian</th>
        <th>Tanggal retur</th>
      <!--  <th>Type Pembayaran</th> -->
        <th>Jumlah retur</th>
<!--        <th>Keterangan retur</th>
        <th>Keterangan Verifikasi</th> -->
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($pembelian as $i => $d):
      $pem = $this->s->find_entity_by_id($d->pembelian_id);
      $detail_retur  = $this->drt->find(array("retur_pembelian_id" => $d->pembelian_id),0,-1);
      $gambar   = "<ul>";
      $ket      = "<ul>";
      $jumlah   = "<ul>";
      $ket_ver  = "<ul>";
      $status   = "<ul>";
      foreach($detail_retur as $dr){
        $gambar   .="<li> <img src='".base_url("assets/uploads/returs/$dr->gambar")."' style='width: 88px;  height: 50px;' alt='".$dr->gambar."'/> </li>";
        $ket      .= "<li>&nbsp; $dr->keterangan_retur </li>";
        $jumlah   .= "<li>&nbsp; $dr->jumlah </li>";
        $ket_ver  .= "<li>&nbsp; $dr->keterangan_verifikasi </li>";
        $status   .= "<li>&nbsp; $dr->status </li>";
        $view = "off";
        if($dr->status == "cofirm" || $dr->status == "baru" ){
          $view = "on";
        }
      }

      $gambar   .= "</ul>";
      $ket      .= "</ul>";
      $jumlah   .= "</ul>";
      $ket_ver  .= "</ul>";
      $status   .= "</ul>";
      if($view == "on" ){
    ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$gambar?></td>
        <td><?=$pem->invoice?><input type="hidden" id="member_no_ktp-<?=$pem->id?>" value="<?=$pem->member_no_ktp?>"/></td>
        <td><?=date("d-m-Y",strtotime($pem->tanggal))?> </td>
        <td><?=date("d-m-Y",strtotime($d->tanggal_retur))?> </td>
        <td><?=$jumlah?></td>
        <td><?=$status?></td>
        <td>
          <a href="<?=base_url("returns/index#detail_notification/".$d->pembelian_id."")?>"   id="<?=$d->pembelian_id?>" >
           Detail
          </a>
        </td>
      </tr>
    <?php } endforeach;?>
    </tbody>
  </table>
