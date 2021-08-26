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
    <h2>GRoups </h2>
    <br/>
    <a class="btn" data-toggle="modal" href="#myModal" >Tambah Groups</a>    <div id="demo">
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->nama?> <input type="hidden" id="nama-<?=$d->id?>" value="<?=$d->nama?>"/></td>
        <td><?=$d->deskripsi?> <input type="hidden" id="deskripsi-<?=$d->id?>" value="<?=$d->deskripsi?>"/></td>
        <td><?=$d->status?></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->id?>" > Edit</a> | 
          <a href="<?=base_url("groups/delete/$d->id")?>" > del </a> 
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form class="form-horizontal" method="post" action="<?=base_url("groups/save")?>">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Tambah </h3>
  </div>
  <div class="modal-body">
  <p>
    
      <div class="control-group">
      <label class="control-label" for="nama">Nama Group</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-nama" name="nama">
        <input type="hidden" class="" id="frm-id" name="id">
        <p class="help-block">Masukan nama group</p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="Deskripsi">Deskripsi</label>
      <div class="controls">
        <textarea class="input-xlarge" id="frm-deskripsi" name="deskripsi"> </textarea>
        <p class="help-block">Masukan keterangan </p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="status">Status</label>
      <div class="controls">
        <select name="status" id="status">
          <option value="aktif">aktif</option>
          <option value="nonaktif">nonaktif</option>
        </select>
        <p class="help-block">Masukan status group</p>
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