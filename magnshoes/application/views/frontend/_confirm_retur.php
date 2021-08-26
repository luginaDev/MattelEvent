<script type="text/javascript" src="<?php echo base_url();?>assets/js/uploadify-v2.1.4/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/uploadify-v2.1.4/jquery.uploadify.v2.1.4.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.file_upload_detail_product').uploadify({
      'uploader'  : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.swf")?>',
      'script'    : '<?=base_url("assets/js/uploadify-v2.1.4/uploadify.php")?>',
      'cancelImg' : '<?=base_url("assets/js/uploadify-v2.1.4/cancel.png")?>',
      'folder'    : '<?=$this->config->item("path_upload_pages");?>assets/uploads/returs',
      'auto'      : true,
      'onComplete'  : function(event, ID, fileObj, response, data) {
        $("#nama_barang_retur").html(fileObj['name']);
        $("#image").val(fileObj['name']);
      }
  });

  $(".jumlah_pengganti").live("keyup",function(){
    // console.log(1);
    var isi = $(this).val();
    if(isNaN(isi)==false){
      new_number = parseInt(isi) + parseInt($("#inputan").val());
      console.log(new_number)
      $("#inputan").val(new_number);

    }
    
  });
  $("#btn_ganti_brg").hide();
  $(".add_link_retur").click(function(){
    var id = $(this).attr("id"); detail=id.split("|");
    var nama = "<input type='text' name='' /> ";
    var label = "<label > nama : "+detail[1]+"</label> <br/>";
    var stok = "<label > quantity : <input type='text' name='jumlah[]' value='1' class='jumlah_pengganti' readonly /><input type='hidden' name='kode[]' value='"+detail[0]+"' /> <br/>";
    var sisa = parseInt($("#inputan").val()) - parseInt(detail[3]);
    //console.log(sisa);
    if(sisa >= 0){
      $("#inputan").val(sisa);
      $(".barang_pengganti").append(label+""+stok); 
      $("#btn_ganti_brg").show(); 
    }else{
      alert("jumlah retur tidak mencukupi");
    }
    
  });

});
</script>
<style type="text/css">
.detail_retur{
  float : left;
  margin: 10px;
  border: 1px solid black;
}
</style>
<div style="width:700px;height:500px">
  <input type="hidden" id="inputan" value="<?=($harga[0]->harga*$detail_retur->jumlah)?>" />
  <h2> Konfirmasi Retur  </h2>
  <!-- <form method="post" action="<?=base_url("checkout/create_retur")?>" id="form_retur">  -->
    <input type="hidden" name="detail_pembelian_id" value="<?=$detail->id?>"> 
    <input type="hidden" name="pembelian_id" value="<?=$detail->pembelian_id?>">detail_retur
    <input type="hidden" id="frm-harga" value="<?=($harga[0]->harga*$detail_retur->jumlah)?>">
  <table width="100%" border="1"> 
    <thead>
      <tr>
        <th>Gambar</th>
        <th>Alasan Retur</th>
        <th>Jumlah</th>
        <th>total</th>
        <th>Verifikasi</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="<?=base_url()."assets/uploads/products/".$detail_produk->gambar?>" alt="<?=$detail_produk->nama?>" width="40px" height="30px"/></td>
        <td><?=$detail_retur->keterangan_retur?></td>
        <td><?=$detail_retur->jumlah?></td>
        <td><?=($harga[0]->harga*$detail_retur->jumlah)?></td>
        <td><?=$detail_retur->keterangan_verifikasi?></td>
        <td><?=$detail_retur->status?></td>
      </tr>
      <tr>
        <td colspan="5">
          <h3> Barang Pengganti </h3>
          <form method="post" action="<?=base_url("checkout/update_retur")?>" > 
           <input type="hidden" name="detail_retur_id" value="<?=$detail_retur->id?>">
          <div class="barang_pengganti">

          </div>
          <input type="submit" value="simpan pengganti barang" id="btn_ganti_brg">
        </td> 
      </tr> 
    </tbody>
    <tfoot>
     <tr>
      <td colspan="5" style="width:700px;">
        <ul>
        <?php 
          foreach($products as $d){
            $harga = $this->dh->find(array("detail_produk_id" => $d->id),0,1,"id desc"); 
            $discount = $this->dc->find(array("produk_kode" => $d->produk_kode,"berakhir >=" => date("Y-m-d H:i:s") ),0,1,"id desc"); 
            $harga2 = $this->dh->find(array("detail_produk_id" => $d->id),0,2,"id desc");
            $harga_akhir = $harga2[0]->harga - ( (empty($discount[0]->diskon)? 0 : $discount[0]->diskon) * $harga2[0]->harga);
            // $rating = $this->rat->find(array("detail_produk_id" => $d->id),0,-1);
        ?>
        <li class="detail_retur">
        <table class="table_confirm_retur">
          <tr>
            <td> 
              <strong>
                <a href="#" id="<?=$d->id?>|<?=$d->nama?>|<?=$d->stok?>|<?=$harga_akhir?>" class="add_link_retur" > 
                  <?=$d->nama?> 
                </a>
              </strong>
              <br/>
            </td>
          </tr>
          <tr>
            <td><img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" alt="<?=$d->gambar?>" title="<?=$d->gambar?>" width="97px" height="69px"></td>
          </tr>
          <tr>
            <td>
                <strong>Detail: </strong>
                <br>Size: <?=$d->ukuran?>
                <br>Color: <?=$d->warna?>
                <?php if(count($discount)>0){  ?>
                <br>Diskon: <?=$discount[0]->diskon?> %
                <br>Min Quantity: <?=$discount[0]->min_quantity?>
                <?php } ?> 
                <br/>Harga:Rp. <?=number_format($harga2[0]->harga)?>
                <br/> Stok : <?=$d->stok?> pc
            </td>
          </tr>
        </table>
        </li>
        <?php
          }
        ?>
        <ul>
      </td>
     </tr>
      <tr>
      <th colspan="3"> <input type="submit" value="simpan" id="simpan"/></th>
    </tr>
    </tfoot>

    
  </table>
<!-- </form> -->
  
</div>