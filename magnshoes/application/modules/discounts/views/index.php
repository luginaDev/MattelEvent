<link type="text/css" href="<?=base_url()?>assets/js/jquery-ui-bootstrap/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
<script src="<?=base_url()?>assets/js/jquery-ui-bootstrap/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/jquery-ui-bootstrap/js/google-code-prettify/prettify.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    $(".curd_edit").live("click",function(){
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
    

    $("#v-slider").slider({
      orientation: "horizontal",
      range: "min",
      min: 5,
      max: 71,
      value: 20,
      slide: function (event, ui) {
      $("#frm-diskon").val(ui.value);
      $("#diskon_text").html(ui.value);
    }
    });
    $("#frm-diskon").val($("#v-slider").slider("value"));

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
        <th>Produk</th>
        <th>Diskon</th>
        <th>Min-quantity</th>
        <th>Tanggal Awal</th>
        <th>Tanggal Akhir</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->produk_kode?><input type="hidden" id="produk_kode-<?=$d->id?>" value="<?=$d->produk_kode?>"/></td>
        <td><?=$d->diskon?> <input type="hidden" id="diskon-<?=$d->id?>" value="<?=$d->diskon?>"/></td>
        <td><?=$d->min_quantity?> <input type="hidden" id="min_quantity-<?=$d->id?>" value="<?=$d->min_quantity?>"/></td>
        <td><?=$d->berawal?> <input type="hidden" id="berawal-<?=$d->id?>" value="<?=$d->berawal?>"/></td>
        <td><?=$d->berakhir?> <input type="hidden" id="berakhir-<?=$d->id?>" value="<?=$d->berakhir?>"/></td>
        <td><?=$d->status?> <?//=(strtotime(date("Y-m-d H:i:s")) <= strtotime($d->berakhir) )? "<span class='label label-success'>Aktif</span>": "<span class='label label-important'>NonAktif</span>";?></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->id?>"> Edit</a> | 
          <!-- <a href="<?=base_url("categories/delete/$d->id")?>" > Hapus </a>  -->
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form class="form-horizontal" method="post" action="<?=base_url("discounts/save")?>" id="add_discount">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Tambah <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>

    <div class="control-group">
      <label class="control-label" for="nama">Kode Produk</label>
      <div class="controls">
        <!-- <input type="text" class="input-xlarge" id="frm-nama" name="produk_kode"> -->
        <select name="produk_kode" id="frm-produk_kode" class="input-xlarge">
        <?php foreach($data[1] as $p):?>
          <option value="<?=$p->kode?>"><?=$p->nama?></option>
        <?php endforeach;?>
        </select> 
        <input type="hidden" class="input-xlarge" id="frm-id" name="id">
        <p class="help-block">Masukan Kode Produk</p>
      </div>
    </div>
    <?php ?>
    <div class="control-group">
      <label class="control-label" for="nama">Diskon</label>
      <div class="controls"><span id="diskon_text"></span>% 
        <input type="hidden" class="input-xlarge" id="frm-diskon" name="diskon" min="1" max="5" number>
        <div id="v-slider"></div>
        <p class="help-block">Masukan diskon</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">tanggal awal</label>
      <div class="controls">
        <input type="text" class="input-xlarge tanggal" id="frm-berawal" name="berawal"  value="02-02-2012" data-date-format="dd-mm-yyyy">
        <p class="help-block">Masukan tanggal awal</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">tanggal akhir</label>
      <div class="controls">
        <input type="text" class="input-xlarge tanggal" id="frm-berakhir" name="berakhir"  value="02-02-2012" data-date-format="dd-mm-yyyy">
        <p class="help-block">Masukan tanggal akhir</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Min-quantity</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-min_quantity" name="min_quantity">
        <p class="help-block">Masukan Min-quantity</p>
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