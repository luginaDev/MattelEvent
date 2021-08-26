<script>
  $(document).ready(function(){
    $(".curd_edit").click(function(){
      var id = $(this).attr("id");
      var nama = $("#nama-"+id).val();
      var kode = $("#kode-"+id).val();
      var deskripsi = $("#deskripsi-"+id).val();
      var site = $("#site-"+id).val();
      $("#frm-id").val(id);
      $("#frm-nama").val(nama);
      $("#frm-kode").val(kode);
      $("#frm-deskripsi").val(deskripsi);
      $("#frm-site").val(site);
      $('#myModal').modal('show');
    });
  });
</script>
    <h2><?=$title_form?></h2>
    <br/>
    <a class="btn" data-toggle="modal" href="#myModal" >Tambah <?=$title_form?> </a>    <div id="demo">
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kode</th>
        <th>Url Tracking</th>
        <th>Deskripsi</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->nama?><input type="hidden" id="nama-<?=$d->id?>" value="<?=$d->nama?>"/></td>
        <td><?=$d->kode?><input type="hidden" id="kode-<?=$d->id?>" value="<?=$d->kode?>"/></td>
        <td><?=$d->site?><input type="hidden" id="kode-<?=$d->id?>" value="<?=$d->site?>"/></td>
        <td><?=$d->deskripsi?><input type="hidden" id="deskripsi-<?=$d->id?>" value="<?=$d->deskripsi?>"/></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->id?>"> Edit</a> | 
          <a href="<?=base_url("vendors/delete/$d->id")?>" > Hapus </a> 
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form  id="form-validate" class="form-horizontal" method="post" action="<?=base_url("vendors/save")?>">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Form <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    <div class="control-group">
      <label class="control-label" for="nama">Parent </label>
      <div class="controls">
        <select name="parent_id">
          <option value="0">Parent</option>
          <?php foreach ($parent[0] as $val) {
              echo "<option value='".$val->id."' > $val->nama</option> ";
          }?>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-nama" name="nama">
        <input type="hidden" class="input-xlarge" id="frm-id" name="id">
        <p class="help-block">Masukan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="kode">Kode</label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-kode" name="kode">
        <p class="help-block">Masukan kode</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="site">Url traking </label>
      <div class="controls">
        <textarea class="input-xlarge required" id="frm-site" name="site"></textarea>
        <p class="help-block">Masukan Url traking</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="deskripsi">Deskripsi</label>
      <div class="controls">
        <textarea class="input-xlarge required" id="frm-deskripsi" name="deskripsi"></textarea>
        <p class="help-block">Masukan deskripsi</p>
      </div>
    </div>
  </p>
  </div>
  <div class="modal-footer">
  <a href="#" class="btn close-modal">Close</a>
  <input type="submit" value="Save changes" class="btn btn-primary"> 
  </div>
</div>
</form>