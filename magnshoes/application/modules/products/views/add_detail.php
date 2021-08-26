<script type="text/javascript">
$(document).ready(function(){
  $('.file_upload_detail_product').uploadify({
      'uploader'  : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.swf")?>',
      'script'    : '<?=base_url("uploads/do_upload")?>',
      'cancelImg' : '<?=base_url("assets/js/uploadify-v2.1.4/cancel.png")?>',
      'folder'    : '<?=$this->config->item("path_upload_pages");?>assets/uploads/products',
      'auto'      : true,
      'onComplete'  : function(event, ID, fileObj, response, data) {
        // alert($(this).attr("id"));
        $("#thumb-gambar_detail_product").html("<img src='<?php echo $this->config->item("path_upload_pages"); ?>assets/uploads/products/"+fileObj['name']+"' width='100px'  height='80px' />");
        $("#frm-gambar_detail_product").val(fileObj['name']);
        // $("#tr_form_detail_produk-hide").clone(true).appendTo(".body_detail_produk");

        // $('#myModal').modal('hide');
      }
  });
});
</script>
<form class="form-vertical" method="post" action="<?=base_url("products/create_detail_product")?>" enctype="multipart/form-data">
<div class="span5">

 <div class="control-group">
      <label class="control-label" for="nama">Gambar</label>
      <div class="span1 thumbnail" id="thumb-gambar_detail_product">  <img src="http://placehold.it/100x80" alt=""> </div>
      <div class="controls">
       <input id="file_upload_detail_product" type="file" name="file_upload_detail_product" class="file_upload_detail_product" />
         <input id="frm-gambar_detail_product" type="hidden" name="gambar" />
         <a href="javascript:$('#file_upload_detail_product').uploadifyUpload();">Upload Files</a>
        <p class="help-block">Masukan Gambar</p>
      </div>
    </div>

<div class="control-group">
  <label class="control-label" for="nama">Nama</label>
  <div class="controls">
    <input type="text" class="input-xlarge" id="frm-detail_nama" name="nama">
    <input type="hidden" class="input-xlarge" id="frm-detail_produk_kode" name="produk_kode" value="<?=$data[0]->kode?>" >
    <p class="help-block">Masukan nama</p>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="nama">Warna</label>
  <div class="controls">
    <input type="text" class="input-xlarge" id="frm-detail_warna" name="warna">
    <p class="help-block">Masukan warna</p>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="nama">stok</label>
  <div class="controls">
    <input type="text" class="input-xlarge" id="frm-detail_stok" name="stok">
    <p class="help-block">Masukan stok</p>
  </div>
</div>

</div>
<div class="span4">

 <div class="control-group">
      <label class="control-label" for="nama">Berat</label>
      <div class="controls">

        <input type="hidden" name="status_produk" id="status_produk" class="input-xlarge" value="stok">
        <input type="text" name="berat" id="berat" class="input-xlarge">
        <!-- <select name="status_produk" id="status_produk" class="input-xlarge">
          <option value="preorder">preorder</option>
          <option value="stok">stok</option>
        </select> -->
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Ukuran</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-detail_ukuran" name="ukuran">
        <p class="help-block">Masukan ukuran</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Harga</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-detail_harga" name="harga">
        <p class="help-block">Masukan harga</p>
      </div>
    </div>

   <input type="submit" value="Simpan" class="btn btn-primary"> 

</div>
</form>
<div class="clear"></div>