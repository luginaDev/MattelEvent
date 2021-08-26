<script>
$(document).ready(function(){
   $('#file_upload_product').uploadify({
      'uploader'  : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.swf")?>',
      'script'    : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.php")?>',
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
      'script'    : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.php")?>',
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

<form class="form-horizontal" method="post" action="<?=base_url("products/update_product")?>" enctype="multipart/form-data">
  
<div class="" id="">
  <div class="modal-header">
  <h3><?=$title_form?></h3>
  </div>
  <div class="">
  <div class="span4">
    <div class="">
      <label class="" for="kode">Kode</label>
      <div class="">
        <input type="hidden" class="input-xlarge" id="frm-kode" name="kode" value="<?=$data["product"]->kode?>">
      </div>
    </div>
    <div class="">
      <label class="" for="nama">Nama</label>
      <div class="">
        <input type="text" class="input-xlarge" id="frm-nama" name="nama" value="<?=$data["product"]->nama?>">
      </div>
    </div>
    <div class="">
      <label class="" for="Deskripsi">Deskripsi</label>
      <div class="">
        <textarea class="input-xlarge" id="frm-deskripsi" name="deskripsi">
          <?=$data["product"]->deskripsi?>
        </textarea>
      </div>
    </div>
  </div>

  <div class="span5">
    <div class="control-group">
      <div class="span1 thumbnail" id="gambar">  <img src="<?=base_url()?>/assets/uploads/products/<?=$data["product"]->gambar?>" alt=""> </div>
      <div class="span3"> 
        <label class="" for="nama">Gambar</label>
        <div class="">
         <input id="file_upload_product" type="file" name="file_upload" />
         <input id="frm-gambar" type="hidden" name="gambar" value="<?=$data["product"]->gambar?>"/>
         <a href="javascript:$('#file_upload_product').uploadifyUpload();">Upload Files</a>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="" for="nama">kategori</label>
      <div class="">
        <select name="kategori_id" id="kategori_id" class="input-xlarge">
          <?php foreach($data["kategori"] as $d): ?>
            <option value="<?=$d->id?>" <?=($d->id==$data["product"]->kategori_id)? 'selected="true"' : '' ;?>><?=$d->nama?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="" for="nama">status_produk</label>
      <div class="">
        <select name="status_produk" id="status_produk" class="input-xlarge">
          <option value="preorder" <?=($data["product"]->status_produk == "preorder")? 'selected="true"' : '' ;?>> preorder </option>
          <option value="stok"  <?=($data["product"]->status_produk == "stok")? 'selected="true"' : '' ;?>>stok</option>
        </select>
      </div>
    </div>
  </div>
 

  </div>
  <div class="modal-footer">
 <input type="submit" value="Simpan" class="btn btn-primary"> 
  </div>
</div>
 </form> 
 <!-- <a class="btn" data-toggle="modal" href="#myModal" >Tambah Detail Produk </a> 
 <input type="button" value="Tambah Detial Produk" class="btn btn-primary" id="btn_tambah_detail_produk"> 
 +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
<div class="modal-header">
  <h3>Detail <?=$title_form?></h3>
</div>
<div class="well"> -->
  <!-- <form class="form-vertical" method="post" action="<?=base_url("kelurahan/save")?>"> -->

  <!-- <table class="table table-striped table-bordered" id="table_form_detail_produk">
    <thead>
    <tr>
      <th width="5%"> # </th>
      <th width="35%">  </th>
      <th width="35%">  </th>
    </tr>
  </thead>
  <tbody class="body_detail_produk">
    <tr class="tr_form_detail_produk-hide" id="tr_form_detail_produk-hide">
      <td> # </td>
      <td> 
        <p>
          <div class="control-group">
              <label class="control-label" for="nama">Nama</label>
              <div class="controls">
               <input id="frm-file_upload_detail_product" type="file" name="frm-detail_file_upload_detail_product[]" class="input-mini" />
                <p class="help-block">Masukan Gambar</p>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="nama">Nama</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="frm-detail_nama" name="frm-detail_nama[]">
                <input type="hidden" class="input-xlarge" id="frm-detail_produk_kode" name="frm-detail_produk_kode">
                <p class="help-block">Masukan nama</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nama">Warna</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="frm-detail_warna" name="frm-detail_warna[]">
                <p class="help-block">Masukan warna</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nama">stok</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="frm-detail_stok" name="frm-detail_stok[]">
                <p class="help-block">Masukan stok</p>
              </div>
            </div>
          </p>
      </td>
       <td> 
        <p>
         <div class="control-group">
              <label class="control-label" for="nama">status_produk</label>
              <div class="controls">
                <select name="frm-detail_status_produk[]" id="frm-detail_status_produk" class="input-xlarge">
                  <option value="preorder">preorder</option>
                  <option value="stok">stok</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nama">Ukuran</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="frm-detail_ukuran" name="frm-detail_ukuran[]">
                <p class="help-block">Masukan ukuran</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nama">Harga</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="frm-detail_harga" name="frm-detail_harga[]">
                <p class="help-block">Masukan harga</p>
              </div>
            </div>
          </p>
      </td>
    </tr>
  </tbody>
  </table>
  <input type="submit" value="Simpan" class="btn btn-primary"> 
</div>
</form>
 -->

--------------------------------------------
<!-- <div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Form <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p> -->
    <!-- <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-detail_nama" name="nama">
        <input type="hidden" class="input-xlarge" id="frm-detail_produk_kode" name="produk_kode">
        <p class="help-block">Masukan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Warna</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-detail_warna" name="detail-warna">
        <p class="help-block">Masukan warna</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">stok</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-detail_stok" name="stok">
        <p class="help-block">Masukan stok</p>
      </div>
    </div> -->
   <!--  <div class="control-group">
      <label class="control-label" for="nama">Gambar</label>
      <div class="span1 thumbnail" id="thumb-gambar_detail_product">  <img src="http://placehold.it/100x80" alt=""> </div>
      <div class="controls">
       <input id="file_upload_detail_product" type="file" name="file_upload_detail_product" class="file_upload_detail_product" />
         <input id="frm-gambar_detail_product" type="hidden" name="gambar_detail_product" />
         <a href="javascript:$('#file_upload_detail_product').uploadifyUpload();">Upload Files</a>
        <p class="help-block">Masukan Gambar</p>
      </div>
    </div> -->
   <!--  <div class="control-group">
      <label class="control-label" for="nama">status_produk</label>
      <div class="controls">
        <select name="detail-status_produk" id="frm-detail_status_produk" class="input-xlarge">
          <option value="preorder">preorder</option>
          <option value="stok">stok</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Ukuran</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-detail_ukuran" name="detail-ukuran">
        <p class="help-block">Masukan ukuran</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Harga</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-detail_harga" name="detail-harga">
        <p class="help-block">Masukan harga</p>
      </div>
    </div> -->

<!--   </p>
  </div>
  <div class="modal-footer">
  <a href="#" class="btn close-modal">Close</a>
  <input type="button" value="Save changes" class="btn btn-primary"> 
  </div>
</div>
 
 <div class="hide">
  
  </div> -->