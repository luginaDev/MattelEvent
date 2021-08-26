<script type="text/javascript" src="<?php echo base_url();?>assets/js/uploadify-v2.1.4/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/uploadify-v2.1.4/jquery.uploadify.v2.1.4.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.file_upload_detail_product').uploadify({
      'uploader'  : '<?php echo base_url();?>assets/js/uploadify-v2.1.4/uploadify.swf',
      'script'    : '<?=base_url("uploads/do_upload")?>',
      'cancelImg' : '<?php echo base_url();?>assets/js/uploadify-v2.1.4/cancel.png',
      'folder'    : '<?=$this->config->item("path_upload_pages");?>assets/uploads/returs',
      'auto'      : true,
      'onComplete'  : function(event, ID, fileObj, response, data) {
        // $("#nama_barang_retur").html(fileObj['name']);
        // $("#image").val(fileObj['name']);
        var img_name = '<input id="image" type="hidden" name="gambar[]" value="'+fileObj['name']+'"/> <span id="nama_barang_retur" > '+fileObj['name']+'</span><br/>';
        $("#upload_tr").append(img_name);
        
      
      }
  });
  $("#jumlah_retur").change(function(){
    var data = $(this).val();
    for(i=1;i<data;i++){
      var tmpl = '<tr><th> Alasan Retur  </th><th> :</th><th> <input type="radio" name="keterangan_retur['+i+']" value="barang rusak" class="multiple_retur"> Barang Rusak   <input type="radio" name="keterangan_retur['+i+']" value="barang salah warna" class="multiple_retur"> Barang Salah warna       </th>';
      $("#table_retur").append(tmpl);
      // $(".multiple_retur").clone().appendTo("#table_retur");
    }
  });
});
</script>

<div style="width:600px;height:400px">
  <h2> Tambah Retur  </h2>
  <form method="post" action="<?=base_url("checkout/create_retur")?>" id="form_retur"> 
    <input type="hidden" name="detail_pembelian_id" value="<?=$detail->id?>"> 
    <input type="hidden" name="pembelian_id" value="<?=$detail->pembelian_id?>">
    <input type="hidden" name="detail_produk_id" value="<?=$detail->detail_produk_id?>">
  <table id="table_retur"> 
    <tr>
      <th> Jumlah </th>
      <th> :</th>
      <th>
        <select name="jumlah" id="jumlah_retur">
          <?php for($i= 1 ; $i <= $detail->quantity; $i++): ?>
            <option value="<?=$i?>"> <?=$i?> </option>
          <?php endfor; ?>
        </select>
      </th>
    </tr>

    <tr>
      <th> Upload gambar retur </th>
      <th> :</th>
      <th id="upload_tr"> <input id="file_upload_detail_product" type="file"  class="file_upload_detail_product" /> 
        <!-- <input id="image" type="hidden" name="gambar" /> 
      <span id="nama_barang_retur" ></span> -->
      </th>
    </tr>
    <tr>
      <th> Alasan Retur  </th>
      <th> :</th>
      <th>
        <input type="radio" name="keterangan_retur[0]" value="barang rusak" class="multiple_retur"> Barang Rusak
        <input type="radio" name="keterangan_retur[0]" value="barang salah warna" class="multiple_retur"> Barang Salah warna
      </th>
    </tr>
  </table>
  <input type="submit" value="simpan" id="simpan"/>
</form>
  
</div>