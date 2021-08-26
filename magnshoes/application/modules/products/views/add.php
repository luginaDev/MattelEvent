<style>
::-webkit-validation-bubble-message {
    color: #eee;
    background: #000;
    border-color: #444;
    -webkit-box-shadow: 4px 4px 4px rgba(100,100,100,0.5);
}

::-webkit-validation-bubble-message:before {
    content: "";
    display: inline-block;
    width: 16px;
    height: 16px;
    margin-right: 4px;
    background: url(http://trac.webkit.org/export/90202/trunk/Source/WebCore/inspector/front-end/Images/errorMediumIcon.png)
}

::-webkit-validation-bubble-arrow {
    background: #000;
    border-color: #444;
    -webkit-box-shadow: 0 0 0 0;
}
</style>
<script>
$(document).ready(function(){
   $('#file_upload_product').uploadify({
      'uploader'  : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.swf")?>',
      'script'    : '<?=base_url("uploads/do_upload")?>',
      'cancelImg' : '<?=base_url("assets/js/uploadify-v2.1.4/cancel.png")?>',
      'folder'    : '<?=$this->config->item("path_upload_pages");?>assets/uploads/products',
      'auto'      : false,
      'onComplete'  : function(event, ID, fileObj, response, data) {
        $("#gambar").html("<img src='<?php echo $this->config->item("path_upload_pages"); ?>assets/uploads/products/"+fileObj['name']+"' width='100px'  height='80px' />");
        $("#frm-gambar").val(fileObj['name']);
      }
  });

  $('.file_upload_detail_product').uploadify({
      'uploader'  : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.swf")?>',
      'script'    : '<?=base_url("uploads/do_upload")?>',
      'cancelImg' : '<?=base_url("assets/js/uploadify-v2.1.4/cancel.png")?>',
      'folder'    : '<?=$this->config->item("path_upload_pages");?>assets/uploads/products',
      'auto'      : true,
      'onComplete'  : function(event, ID, fileObj, response, data) {
        // alert($(this).attr("id"));
        $("#thumb-gambar_detail_product").html("<img src='<?php echo $this->config->item("path_upload_pages"); ?>assets/uploads/products/"+fileObj['name']+"' width='100px'  height='80px' />");
        // $("#frm-gambar_detail_product").val(fileObj['name']);
        // $("#tr_form_detail_produk-hide").clone(true).appendTo(".body_detail_produk");

        // $('#myModal').modal('hide');
      }
  });

  $("#btn_tambah_detail_produk").click(function(){
    $("#0").clone(true).appendTo(".body_detail_produk");
  //  $(".tr_form_detail_produk").each(function(idx){
//       var nama = $("#frm-detail_nama").attr("id");
//       var warna = $("#frm-detail_warna").attr("id");
//       var status = $("#frm-detail_status_produk").attr("id");
//       var stok = $("#frm-detail_stok").attr("id");
//       var ukuran = $("#frm-detail_ukuran").attr("id");
//       var harga = $("#frm-detail_harga").attr("id");
//       var nama = $("#frm-detail_nama").attr("id");
// thumb-gambar_detail_product
// file_upload_detail_product
//       $("#frm-detail_nama").attr("id",nama+"-"+idx);

    //});
     $(".tr_form_detail_produk ").each(function(ind){
      var id_tr = $(this).attr("id");
      $(this).attr("id",ind);
      $("#"+ind).children().find("input").each(function(idx){
        var explode = $(this).attr("id").split("-");
        var id_attr = explode[0]+"-"+explode[1];
        $("#"+id_attr).attr("id",id_attr+"-"+ind);

      });
      // $("#"+ind).children().find("file").each(function(idx){
      //   var explode = $(this).attr("id").split("-");
      //   var id_attr = explode[0];
      //   $("#"+id_attr).attr("id",id_attr+"-"+ind);
      //  console.log(idx+"-"+ind);
      // });
      $("#"+ind).children().find("select").each(function(idx){
        var explode = $(this).attr("id").split("-");
        var id_attr = explode[0]+"-"+explode[1];
        $("#"+id_attr).attr("id",id_attr+"-"+ind);
        //console.log(idx+"-"+ind);
      });

      $("#"+ind).children().find(".form-detai_uploadify").each(function(idx){
         var explode = $(this).attr("id").split("-");
         var href_new = "javascript:$('#frm-file_upload_detail_product-"+ind+"').uploadifyUpload();";
         var id_attr = explode[0]+"-"+explode[1];
         $(this).attr("href",href_new);

      });
    });
  });
// $(".hide").hide();
});
</script>

<form class="form-horizontal" method="post" action="<?=base_url("products/create_product")?>" enctype="multipart/form-data" id="form-validate">

<div class="" id="">
  <div class="modal-header">
  <h3><?=$title_form?></h3>
  </div>
  <div class="">
  <div class="span4">
    <div class="">
      <label class="" for="kode">Kode</label>
      <div class="">
        <input type="text" class="input-xlarge " id="frm-kode" name="kode" required> *
      </div>
    </div>
    <div class="">
      <label class="" for="nama">Nama</label>
      <div class="">
        <input type="text" class="input-xlarge " id="frm-nama" name="nama" required> *
      </div>
    </div>
    <div class="">
      <label class="" for="Deskripsi">Deskripsi</label>
      <div class="">
        <textarea class="input-xlarge required" id="frm-deskripsi" name="deskripsi" required> </textarea> *
      </div>
    </div>
  </div>

  <div class="span5">
    <div class="control-group">
      <div class="span1 thumbnail" id="gambar">  <img src="http://placehold.it/100x80" alt=""> </div>
      <div class="span3">
        <label class="" for="nama">Gambar</label>
        <div class="">
         <input id="file_upload_product" type="file" name="file_upload" />
         <input id="frm-gambar" type="hidden" name="gambar" />
         <a href="javascript:$('#file_upload_product').uploadifyUpload();">Upload Files</a>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="" for="nama">kategori</label>
      <div class="">
        <select name="kategori_id" id="kategori_id" class="input-xlarge required" required>
          <?php foreach($data[0] as $d): ?>
            <option value="<?=$d->id?>"><?=$d->nama?></option>
          <?php endforeach; ?>
        </select> *
      </div>
    </div>
    <div class="control-group">
      <label class="" for="nama" required>status_produk</label>
      <div class="">
        <select name="status_produk" id="status_produk" class="input-xlarge required">
          <option value="preorder">preorder</option>
          <option value="stok">stok</option>
        </select> *
      </div>
    </div>
  </div>


  </div>
  <div class="modal-footer">
 <input type="submit" value="Simpan" class="btn btn-primary">
  </div>
</div>
 </form>
