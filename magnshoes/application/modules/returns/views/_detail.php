<h2> Detail </h2>
<form method="post" action="returns/update_verifikasi" >
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
  <thead>
  <tr>
    <td>Gambar</td>
    <td>Alasan</td>
    <td>keterangan Verifikasi</td>
    <td>Verifikasi</td>
  </tr>
  </thead>
  <tbody>
  <?php 
  echo "<pre>";
  // print_r($detail);
  foreach($detail as $d): 
  if(!empty($d->status)){
    $status = $d->status;
  }else{
    $status = "";
  }
  $detail_f = $this->dp->find_entity_by_id($d->retur_detail_produk_id);
  $harga_f = $this->dh->find(array("detail_produk_id" => $detail_f->id),0,1,"id desc");
  $discount_f = $this->dc->find(array("produk_kode" => $detail_f->produk_kode,"berakhir >=" => date("Y-m-d H:i:s") ),0,1,"id desc");  
  ?>
    <tr>
      <input type="hidden" name="pembelian_id" value="<?=$d->retur_pembelian_id?>"> 
      <td><img src="<?=base_url("assets/uploads/returs/$d->gambar")?>" style='width: 88px;  height: 50px;' alt="<?=$d->gambar?>"/> </td>
      <td><?=$d->keterangan_retur?></td>
      <td><textarea name="keterangan_verifikasi[]" style="width:200px;height:100px"> <?=$d->keterangan_verifikasi?> </textarea> </td>
      <td>
      <?php 
      if(!empty($d->status) ){
        //if($d->status == "accept_confirm"){
      ?>
       <!-- <input type="hidden" name="status[]" value="disetujui"> accept_confirm 
        <input type="hidden" name="oldstatus[]" value="accept_confirm"> -->
       <?php   
      //  }else{ ?>
        <select name="status[]"> 
          <option value="" <?=($status=="" ? "selected" : "")?> >--Pilih--</option>
          <option value="ditolak" <?=($status=="ditolak" ? "selected" : "")?>>ditolak</option>
          <option value="disetujui" <?=($status=="disetujui" ? "selected" : "")?>>disetujui</option>
          <option value="cofirm" <?=($status=="cofirm" ? "selected" : "")?>>cofirm</option>
           <option value="accept_confirm" <?=($status=="accept_confirm" ? "selected" : "")?>>accept_confirm</option>
        </select>
        <input type="hidden" name="oldstatus[]" value="<?=$status?>">
      <?php 
        //  }
        }else{
        ?>
        <select name="status[]"> 
          <option value="" <?=($status=="" ? "selected" : "")?> >--Pilih--</option>
          <option value="ditolak" <?=($status=="ditolak" ? "selected" : "")?>>ditolak</option>
          <option value="disetujui" <?=($status=="disetujui" ? "selected" : "")?>>disetujui</option>
          <option value="cofirm" <?=($status=="cofirm" ? "selected" : "")?>>cofirm</option>
        </select>
        <input type="hidden" name="oldstatus[]" value="<?=$status?>">
      <?php } ?>
      </td>
    </tr>
    <?php 
      if(!empty($d->status)){
        if($d->status == "accept_confirm"){
    ?>
    <tr><th colspan="4"> Barang Pengganti Retur </th></tr>
    <?php 
          $new_image = explode(";",$d->retur_detail_produk_id);
          $qty = explode(";",$d->jumlah_pengganti);
          foreach ($new_image as $key => $value) {
            $detail = $this->dp->find_entity_by_id($value);
            $harga = $this->dh->find(array("detail_produk_id" => $detail->id),0,1,"id desc");
            $discount = $this->dc->find(array("produk_kode" => $detail->produk_kode,"berakhir >=" => date("Y-m-d H:i:s") ),0,1,"id desc"); 
    ?>
            <?php if($key > 0) { ?>
            <tr>
              <td> 
                <input type="hidden" name="ac_detail_produk_id[]" value="<?=$value?>"> 
                <input type="hidden" name="ac_daftar_harga_id[]" value="<?=$harga[0]->id?>">
                <input type="hidden" name="ac_diskon_id[]" value="<?=(empty($discount)? 0 : $discount[0]->id);?>">
                <!-- <input type="hidden" name="ac_qty[]" value="<?=$qty[$key]?>"> -->
                <input type="hidden" name="ac_qty[]" value="<?=$d->jumlah_pengganti?>">
                <input type="hidden" name="ac_harga[]" value="<?=$harga[0]->harga?>">
              </td>
              <td><img src="<?=base_url("assets/uploads/products/$detail->gambar")?>" style='width: 88px;  height: 50px;' alt="<?=$d->gambar?>"/> </td>
              <td>Harga : Rp. <?=number_format($harga[0]->harga)?> <br/> quantity : <?=$d->jumlah_pengganti?> pcs</td>
              <td>&nbsp;</td>
            </tr>
            <?php } ?>
    <?php   
          }
        }  
      } ?>
  <input type="hidden" name="id[]" value="<?=$d->id?>"  />
  <input type="hidden" name="detail_produk_id[]" value="<?=$d->retur_detail_produk_id?>"> 
  <input type="hidden" name="daftar_harga_id[]" value="<?=$harga_f[0]->id?>">
  <input type="hidden" name="diskon_id[]" value="<?=(empty($discount_f)? 0 : $discount_f[0]->id);?>">
  <input type="hidden" name="qty[]" value="<?=$d->jumlah?>">
  <input type="hidden" name="harga[]" value="<?=$harga_f[0]->harga?>">
  <?php endforeach; ?>
  </tbody>
</table>
<input type="submit" value="simpan"/>
</form>