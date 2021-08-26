<script>
  $(document).ready(function(){
    $(".curd_edit").click(function(){
      var id = $(this).attr("id");
      var nama = $("#nama-"+id).val();
      var propinsi = $("#propinsi_id-"+id).val();
      var kota = $("#kota_id-"+id).val();

      $("#frm-id").val(id);
      $("#frm-nama").val(nama);
      // $("#frm-deskripsi").val(deskripsi);
      $('#myModal').modal('show');
      $("#frm-propinsi_id option").each(function(){
        if($(this).val()==propinsi){
          $(this).attr("selected","selected");
        }
      });

      if(kota!=""){
        $.ajax({
          url :'<?=base_url("partials/select_option_kota")?>',
          data :"id="+propinsi+"&kota="+kota ,
          type :"POST",
          success : function(data){
            $("#frm-kota_id").html(data);

          } 
        });
      }
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
        <th>Propinsi</th>
        <th>Kota</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?><input type="hidden" id="kota_id-<?=$d->id?>" value="<?=$d->kota_id?>"/> </td>
        <td><?=$d->nama?><input type="hidden" id="nama-<?=$d->id?>" value="<?=$d->nama?>"/></td>
        <td><?=$d->propinsi?><input type="hidden" id="propinsi_id-<?=$d->id?>" value="<?=$d->propinsi_id?>"/></td>
        <td><?=$d->kota?><input type="hidden" id="id-<?=$d->id?>" value="<?=$d->id?>"/></td>
        
        <td>
          <a href="#" class="curd_edit" id="<?=$d->id?>"> Edit</a> | 
          <a href="<?=base_url("kecamatan/delete/$d->id")?>" > Hapus </a> 
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form class="form-horizontal" method="post" action="<?=base_url("kecamatan/save")?>">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Form <?=$title_form?></h3>
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
      <label class="control-label" for="nama">Propinsi</label>
      <div class="controls">
        <select id="frm-propinsi_id" class="input-xlarge">
          <option value="--">--pilih--</option>
          <?php
            foreach($prop[0] as $pr){
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
        <select id="frm-kota_id" name="kota_id" class="input-xlarge">
          <?php
            // foreach($kota[0] as $pr){
            //   echo "<option value='".$pr->id."' > $pr->nama</option>";
            // }
          ?>
        </select>
        <p class="help-block">Masukan Kota</p>
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