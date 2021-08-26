<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Invoice</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Tanggal</th>
      <th>Type Pembayaran</th>
      <th>Subtotal</th>
      <th>Total</th>
  </thead>
  <tbody class="notifikasi_body">
  <?php
  if(count($data)>0){
    foreach($data as $i => $d){
      $deliver = $this->dv->find_entity_by("pembelian_id",$d->id);
     echo "<tr> 
          <td>".($i+1)."</td>
          <td>$d->invoice  </td>
          <td>".(empty($deliver->nama)? '-' : $deliver->nama)."</td>
      <td>".(empty($deliver->alamat)? '-' : $deliver->alamat) ." </td>
          <td>$d->tanggal</td>
          <td><a href='".base_url("sells/add_payment/$d->id")."' class='btn btn-info'>$d->type_pembayaran </a></td>
          <td>Rp.".number_format($d->subtotal)."</td>
          <td>Rp.".number_format($d->total)."</td> 
          </tr>";
  }
}
  ?>
  </tbody>
</table>