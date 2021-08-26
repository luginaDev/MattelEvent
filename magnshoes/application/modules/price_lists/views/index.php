<script>
  $(document).ready(function(){
    $(".curd_edit").click(function(){
      var id = $(this).attr("id");
      var nama = $("#nama-"+id).val();
      var kode = $("#kode-"+id).val();
      var tujuan = $("#tujuan-"+id).val();
      var tarif = $("#tarif-"+id).val();
      var pola_perhitungan = $("#pola_perhitungan-"+id).val();
      $("#frm-id").val(id);
      $("#frm-nama").val(nama);
      $("#frm-kode").val(kode);
      $("#frm-tujuan").val(tujuan);
      $("#frm-tarif").val(tarif);
      $("#frm-pola_perhitungan").val(pola_perhitungan);
      $('#myModal').modal('show');
    });
  });
</script>
    <h2><?=$title_form?></h2>
    <br/>
    <!-- <a class="btn" data-toggle="modal" href="#myModal" >Tambah <?=$title_form?> </a>    <div id="demo"> -->
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Produk</th>
        <th>Revisi</th>
        <th>Harga</th>
        <!-- <th>Action</th> -->
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
    <?php $detail_product = $this->dp->find_entity_by_id($d->detail_produk_id)?>
    <?php // $product = $this->p->find_entity_by_id($detail_product[0]->produk_id)?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$detail_product->nama?>
          <input type="hidden" id="vendor-<?=$d->id?>" value="<?=$d->id?>"/></td>
        <td><?=$d->date_created?></td>
        <td>Rp.<?=number_format($d->harga)?><input type="hidden" id="nama-<?=$d->id?>" value="<?=$d->harga?>"/></td>
       <!--  <td>
          Detail
          <a href="#" class="curd_edit" id="<?=$d->id?>"> Edit</a> | 
          <a href="<?=base_url("price_lists/delete/$d->id")?>" > Hapus </a> 
        </td> -->
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form  id="form-validate" class="form-horizontal" method="post" action="<?=base_url("price_lists/save")?>">
<div class="modal" id="myModal" style="display:none">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Form <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    <div class="control-group">
      <label class="control-label" for="nama">Vendor</label>
      <div class="controls">
        <select name="vendor_id" id="frm-vendor_id" class="input-xlarge required">
         <?php //foreach($price_lists[0] as $v){ ?>
          <!-- <option value="<?=$v->id?>"><?=$v->nama?></option> -->
          <?php // } ?>
        </select>

        <input type="hidden" class="input-xlarge" id="frm-id" name="id">
        <p class="help-block">Masukan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-nama" name="nama">
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
      <label class="control-label" for="tujuan">tujuan</label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-tujuan" name="tujuan">
        <p class="help-block">Masukan tujuan</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="tarif">tarif</label>
      <div class="controls">
        <input type="text" class="input-xlarge required number" id="frm-tarif" name="tarif">
        <p class="help-block">Masukan tarif</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="pola_perhitungan">Pola Perhitungan</label>
      <div class="controls">
        <select name="pola_perhitungan" id="frm-pola_perhitungan" class="input-xlarge required">
          <option value="all">flat</option>
          <option value="satuan">Satuan</option>
        </select>
        <p class="help-block">Masukan pola_perhitungan</p>
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