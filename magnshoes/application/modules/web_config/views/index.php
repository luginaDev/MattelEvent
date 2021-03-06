<script>
  $(document).ready(function(){
    $(".curd_edit").click(function(){

      var id = $(this).attr("id");
      var nama = $("#nama-"+id).val();
      var slogan = $("#slogan-"+id).val();
      var telp = $("#telp-"+id).val();
      var alamat = $("#alamat-"+id).val();
      var email = $("#email-"+id).val();
      var facebook = $("#facebook-"+id).val();
      var twiter = $("#twiter-"+id).val();

      $("#frm-id").val(id);
      $("#frm-nama").val(nama);
      $("#frm-slogan").val(slogan);
      $("#frm-telp").val(telp);
      $("#frm-alamat").val(alamat);
      $("#frm-email").val(email);
      $("#frm-facebook").val(facebook);
      $("#frm-twiter").val(twiter);

      $('#myModal').modal('show');
    });
  });
</script>
    <h2>Web Konfigurasi </h2>
    <br/>
    <!-- <a class="btn" data-toggle="modal" href="#myModal" >Tambah Web Konfigurasi</a>    <div id="demo"> -->
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Slogan</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Facebook</th>
        <th>Twiter</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->nama?> <input type="hidden" id="nama-<?=$d->id?>" value="<?=$d->nama?>"/></td>
        <td><?=$d->slogan?> <input type="hidden" id="slogan-<?=$d->id?>" value="<?=$d->slogan?>"/></td>
        <td><?=$d->telp?> <input type="hidden" id="telp-<?=$d->id?>" value="<?=$d->telp?>"/></td>
        <td><?=$d->alamat?> <input type="hidden" id="alamat-<?=$d->id?>" value="<?=$d->alamat?>"/></td>
        <td><?=$d->email?> <input type="hidden" id="email-<?=$d->id?>" value="<?=$d->email?>"/></td>
        <td><?=$d->facebook?> <input type="hidden" id="facebook-<?=$d->id?>" value="<?=$d->facebook?>"/></td>
        <td><?=$d->twiter?> <input type="hidden" id="twiter-<?=$d->id?>" value="<?=$d->twiter?>"/></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->id?>" > Edit</a> |
          <a href="<?=base_url("web_config/delete/$d->id")?>" > del </a>
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form class="form-horizontal" method="post" action="<?=base_url("web_config/save")?>" id="form-validate">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">??</a>
  <h3>Form Web Konfigurasi</h3>
  </div>
  <div class="modal-body">
  <p>

      <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-nama" name="nama">
        <input type="hidden" class="" id="frm-id" name="id">
        <p class="help-block">Masukan nama</p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="slogan">Slogan</label>
      <div class="controls">
        <textarea class="input-xlarge required" id="frm-slogan" name="slogan"> </textarea>
        <p class="help-block">Masukan Slogan </p>
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="telp">telp</label>
      <div class="controls">
        <input type="text" class="input-xlarge required number" id="frm-telp" name="telp">
        <p class="help-block">Masukan telp</p>
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="alamat">alamat</label>
      <div class="controls">
        <textarea class="input-xlarge required" id="frm-alamat" name="alamat"> </textarea>        <p class="help-block">Masukan alamat</p>
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input type="text" class="input-xlarge required email" id="frm-email" name="email">
        <p class="help-block">Masukan email</p>
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="facebook">facebook</label>
      <div class="controls">
        <input type="text" class="input-xlarge  required" id="frm-facebook" name="facebook">
        <p class="help-block">Masukan facebook</p>
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="twiter">twiter</label>
      <div class="controls">
        <input type="text" class="input-xlarge  required" id="frm-twiter" name="twiter">
        <p class="help-block">Masukan twiter</p>
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
