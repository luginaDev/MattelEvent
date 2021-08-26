<script>
  $(document).ready(function(){
    $(".curd_edit").click(function(){
      var id =  $(this).attr("id");
      var produk_kode =  $("#produk_kode-"+id).val();
      var diskon =  $("#diskon-"+id).val();
      var min_quantity = $("#min_quantity-"+id).val();
      var berawal = $("#berawal-"+id).val();
      var berakhir = $("#berakhir-"+id).val();
      console.log(id);
      $("#frm-id").val(id);
      $("#frm-produk_kode").val(produk_kode);
      $("#frm-diskon").val(diskon);
      $("#frm-min_quantity").val(min_quantity);
      $("#frm-berawal").val(berawal);
      $("#frm-berakhir").val(berakhir);

      $('#myModal').modal('show');
    });

    $("#frm-propinsi_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kota")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kota_id").html(data);

          } 
        });
      }
    });

    
    $("#frm-kota_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kecamatan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kecamatan_id").html(data);
          } 
        });
      }
    });

    $("#frm-kecamatan_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kelurahan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kelurahan_id").html(data);
          } 
        });
      }
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
        <th>Alamat</th>
        <th>Kelurahan</th>
        <th>Agama</th>
        <th>Telp</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
    <?php
      if($d->status=="new"){
          $status = "<span class='label label-warning'>New</span>";
        }elseif($d->status=="aktif"){
          $status = "<span class='label label-success'>Aktif</span>";
        }else{
          $status = "<span class='label label-danger'>NonAktif</span>";
        }
    ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->nama?><input type="hidden" id="nama-<?=$d->no_ktp?>" value="<?=$d->nama?>"/></td>
        <td><?=$d->alamat?> <input type="hidden" id="alamat-<?=$d->no_ktp?>" value="<?=$d->alamat?>"/></td>
        <td><?=$this->kl->find_entity_by_id($d->kelurahan_id)->nama?> <input type="hidden" id="email-<?=$d->no_ktp?>" value="<?=$d->email?>"/></td>
        <td><?=$this->a->find_entity_by_id($d->agama_id)->nama?> <input type="hidden" id="status-<?=$d->no_ktp?>" value="<?=$d->status?>"/></td>
        <td><?=$d->telp?></td>
        <td><?=$d->email?></td>
        <td><?=$status?></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->no_ktp?>"> Edit</a> | 
          <!-- <a href="<?=base_url("categories/delete/$d->no_ktp")?>" > Hapus </a>  -->
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form id="form-validate" class="form-horizontal" method="post" action="<?=base_url("members/save")?>">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Form <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    <div class="control-group">
      <label class="control-label" for="nama">No-ktp</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-no_ktp" name="no_ktp">
        <p class="help-block">Masukan diskon</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-nama" name="nama">
        <p class="help-block">Masukan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Agama</label>
      <div class="controls">
        <select id="frm-agama_id" name="agama_id" class="input-xlarge">
          <option value="--">--pilih--</option>
          <?php
            foreach($data["agama"] as $a){
              echo "<option value='".$a->id."' > $a->nama</option>";
            }
          ?>
        </select>
        <p class="help-block">Masukan Agama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Alamat</label>
      <div class="controls">
        <textarea class="input-xlarge" id="frm-alamat" name="alamat"></textarea>
        <p class="help-block">Masukan alamat</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="nama">Propinsi</label>
      <div class="controls">
        <select id="frm-propinsi_id" class="input-xlarge">
          <option value="--">--pilih--</option>
          <?php
            foreach($data["prop"] as $pr){
              echo "<option value='".$pr->id."' > $pr->nama</option>";
            }
          ?>
        </select>
        <p class="help-block">Masukan Propinsi</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Kota</label>
      <div class="controls">
        <select id="frm-kota_id" class="input-xlarge">
        </select>
        <p class="help-block">Masukan Kota</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Kecamatan</label>
      <div class="controls">
        <select id="frm-kecamatan_id" name="kecamatan_id" class="input-xlarge">
        </select>
        <p class="help-block">Masukan Kecamatan</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Kelurahan</label>
      <div class="controls">
        <select id="frm-kelurahan_id" name="kelurahan_id" class="input-xlarge">
        </select>
        <p class="help-block">Masukan kelurahan</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Telp</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-telp" name="telp">
        <p class="help-block">Masukan Telp</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Email</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-email" name="email">
        <p class="help-block">Masukan Email</p>
      </div>
    </div>
     <div class="control-group">
      <label class="control-label" for="nama">Password</label>
      <div class="controls">
        <input type="password" class="input-xlarge" id="frm-password" name="password">
        <p class="help-block">Masukan Password</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Confirm Password</label>
      <div class="controls">
        <input type="password" class="input-xlarge" id="frm-confirm_password" name="confirm_password">
        <p class="help-block">Masukan confirm_password</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="status">Status</label>
      <div class="controls">
        <select id="frm-status" name="status" class="input-xlarge">
          <option value="new">New</option>
          <option value="aktif">Aktif</option>
          <option value="nonaktif">NonAktif</option>
        </select>
        <p class="help-block">Masukan status</p>
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