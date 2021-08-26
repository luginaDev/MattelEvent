<script>
  $(document).ready(function(){
     

  });
</script>
    <h2><?=$title_form?></h2>
    <br/>
    <form class="well" action="<?=base_url('reports/stok_reports')?>" method="post">
    <?=$this->load->view("reports/_search_form")?>
    </form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="reports">
      <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>ukuran</th>
        <th>Stok</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($data[0] as $i => $d):
    ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" alt="<?=$d->gambar?>" title="<?=$d->gambar?>" width="50" height="50"></td>
        <td><?=$d->produk_kode?> - <?=$d->id?> </td>
        <td><?=$d->nama?></td>
        <td><?=$d->ukuran?></td>
        <td><?=$d->stok?></td>
      <td><?=$d->date_created?></td>
      </tr>
    <?php  endforeach;?>
    </tbody>
  </table>
</div>
