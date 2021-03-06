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
    var detail = function(){
      var id = $(this).attr("id");
      $.post("<?=base_url("sells/detail")?>", { id: id} ,function(data){
        console.log(data);
      });
    }

    $(".curd_detail").click(detail);

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
        <th>No KTP</th>
        <th>Tanggal</th>  
        <th>Status Barang</th>
        <th>Status Pembayaran</th>
        <th>Type Pembayaran</th>
        <th>Subtotal</th>
        <th>Total</th>                 
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><input type="hidden" id="nama-<?=$d->id?>" value=""/></td>
        <td><?=$d->member_no_ktp?><input type="hidden" id="member_no_ktp-<?=$d->id?>" value="<?=$d->member_no_ktp?>"/></td>
        <td><?=$d->tanggal?> <input type="hidden" id="tanggal-<?=$d->id?>" value="<?=$d->tanggal?>"/></td>
        <td><?=$d->status_barang?><input type="hidden" id="status_barang-<?=$d->id?>" value="<?=$d->status_barang?>"/></td>
        <td>
          <?=($d->status_pembayaran=="blom")? "<span class='label label-important'>Belum</span>": "<span class='label label-success'>Sudah</span>"; ?>
          <input type="hidden" id="status_pembayaran-<?=$d->id?>" value="<?=$d->status_pembayaran?>"/></td>
        <td><?=$d->type_pembayaran?> <input type="hidden" id="type_pembayaran-<?=$d->id?>" value="<?=$d->type_pembayaran?>"/></td>
        <td>Rp.<?=number_format($d->subtotal)?> <input type="hidden" id="subtotal-<?=$d->id?>" value="<?=$d->subtotal?>"/></td>
        <td>Rp.<?=number_format($d->total)?> <input type="hidden" id="total-<?=$d->id?>" value="<?=$d->total?>"/></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->id?>"> Edit</a> | 
          <a href="#" class="curd_detail" id="<?=$d->id?>" > Detail  </a> 
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form class="form-horizontal" method="post" action="<?=base_url("sells/save")?>">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">??</a>
  <h3>Tambah <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-nama" name="nama">
        <input type="hidden" class="input-xlarge" id="frm-id" name="id">
        <p class="help-block">Masukkan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="Deskripsi">Deskripsi</label>
      <div class="controls">
        <textarea class="input-xlarge" id="frm-deskripsi" name="deskripsi"> </textarea>
        <p class="help-block">Masukkan Keterangan / Deskripsi </p>
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