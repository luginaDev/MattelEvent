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
    <a class="btn" data-toggle="modal" href="#myModal" >Tambah <?=$title_form?></a>    <div id="demo">
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Group</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->username?> <input type="hidden" id="username-<?=$d->username?>" value="<?=$d->username?>"/></td>
        <td><?=$d->email?> <input type="hidden" id="email-<?=$d->username?>" value="<?=$d->email?>"/></td>
        <td><?=$d->nama?></td>
        <td><?=$d->status?></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->username?>" > Edit</a> | 
          <a href="<?=base_url("users/delete/$d->username")?>" > del </a> 
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
  <h3>Form <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    
      <div class="control-group">
      <label class="control-label" for="nama">Username </label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-username" name="username">
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