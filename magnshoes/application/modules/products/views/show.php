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
  });
</script>
    <h2><?=$title_form?></h2>
    <br/>
    <!-- <a class="btn" href="<?=base_url("products/add")?>" >Tambah <?=$title_form?> </a>    -->
    <div id="demo">
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Ukuran</th>
        <th>warna</th>
        <th>Status</th>
        <th>Harga </th>
        <th>Edit</th>  
      </tr>
    </thead>
    <tbody>
    <?php foreach($data["detail_product"] as $i => $d): ?>
    <?php $harga = $this->dh->find( array("detail_produk_id" => $d->id),0,1,"id desc"); ?>

      <tr>
        <td><?=($i+1)?></td>
        <td><img src="<?=base_url()?>/assets/uploads/products/<?=$d->gambar?>" height="40" width="60" /></td>

        <td><?=$d->id?></td>
        <td><?=$d->nama?></td>
        <td><?=$d->ukuran?></td>
        <td><?=$d->warna?></td>
        <td><?=$d->status_produk?></td>
        <td><?=number_format($harga[0]->harga)?></td>
        <td><a href="<?=base_url("products/edit_detail/$d->id")?>" class="curd_edit" id="<?=$d->id?>"> Edit</a></td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>
<!-- 
<form class="form-horizontal" method="post" action="<?=base_url("categories/save")?>">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Tambah <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-nama" name="nama">
        <input type="hidden" class="input-xlarge" id="frm-id" name="id">
        <p class="help-block">Masukan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="Deskripsi">Deskripsi</label>
      <div class="controls">
        <textarea class="input-xlarge" id="frm-deskripsi" name="deskripsi"> </textarea>
        <p class="help-block">Masukan Keterangan / Deskripsi </p>
      </div>
    </div>
  </p>
  </div>
  <div class="modal-footer">
  <a href="#" class="btn close-modal">Close</a>
  <input type="submit" value="Save changes" class="btn btn-primary"> 
  </div>
</div>
</form> -->