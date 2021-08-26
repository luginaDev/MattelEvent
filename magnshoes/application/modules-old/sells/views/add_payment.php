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
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" >
      <thead>
      <tr>
        <th>No Ktp</th>
        <th><?=$data["jual"]->member_no_ktp?></th>
        <th style="width:50%">&nbsp;</th>
        <th>Tanggal</th>
        <th><?=$data["jual"]->tanggal?></th>
      </tr>
      <tr>
        <th>Nama </th>
        <th><?=$data["member"]->nama?></th>
        <th style="width:50%">&nbsp;</th>
        <th>Status Pembayaran</th>
        <th><?=$data["jual"]->status_pembayaran?></th>
      </tr>
      <tr>
        <th>Telp </th>
        <th><?=$data["member"]->telp?></th>
        <th style="width:50%">&nbsp;</th>
        <th>Type Pembayaran</th>
        <th><?=$data["jual"]->type_pembayaran?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="4">
          <br/>
          <table class="table"> 
            <thead>
              <tr>
                <td>#</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Qty</td>
                <td>Diskon</td>
                <td>Subtotal</td>
              </tr>
            </thead>
            <tbody>
              <?php $qty=0; ?>
              <?php foreach($data["detail"] as $i => $val):?>
              <?php 
              $detail = $this->dp->find_entity_by_id($val->detail_produk_id);  
              $harga = $this->dh->find_entity_by_id($val->daftar_harga_id); 
              $kirim = $this->dv->find(array("pembelian_id"=>$val->pembelian_id),0,1); 

              if(!empty($val->diskon_id)){
                $diskon = $this->dc->find_entity_by_id($val->diskon_id)->diskon; 
              }else{
                $diskon = 0;
              }
              $qty += $val->quantity;
              $sub =  $harga->harga * $val->quantity;
              $subtotal =$sub - (($diskon * $sub )/100) ;
              ?>
                <tr>
                  <td><?=($i+1)?></td>
                  <td><?=$detail->id?></td>
                  <td><?=$detail->nama?></td>
                  <td align="right">Rp.<?=number_format($harga->harga)?></td>
                  <td><?=$val->quantity?></td>
                  <td><?=$diskon?></td>
                  <td align="right">Rp.<?=number_format($subtotal)?></td>
                </tr>
              <?php endforeach;?>
            </tbody>
            <tfoot>
              <form method="post" name="form" id="form-validate" action="<?=base_url("sells/save_payment")?>"
               <tr>
                <td>No Rekening</td>
                <td colspan="2">:
                  <input type="text" class="input-xlarge" id="frm-nama" name="no_rekening">
                  <input type="hidden" class="input-xlarge" id="frm-id" name="pembelian_id" value="<?=$data["jual"]->id?>"></td>
                <td colspan="2">&nbsp;</td>
                <td>SubTotal</td>
                <td>Rp.<?=number_format($data["jual"]->subtotal)?></td>
              </tr>
              <tr>
                <td>No Rek Tujuan</td>
                <td colspan="2">:
                  <input type="text" class="input-xlarge" id="frm-nama" name="no_rek_tujuan">
                  </td>
                <td colspan="2">&nbsp;</td>
                <td>Biaya Tambahan</td>
                <td>Rp.<?=number_format(($kirim[0]->total_biaya*$qty))?></td>
              </tr>
              <tr>
                <td>Total</td>
                <td colspan="2">:
                  <input type="text" class="input-xlarge" id="frm-nama" name="total">
                  </td>
                <td colspan="2">&nbsp;</td>
                <td>Total</td>
                <td>Rp.<?=number_format($data["jual"]->total)?></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td colspan="2">:
                  <input type="text" class="input-xlarge tanggal" id="frm-tanggal" name="tanggal"  data-date-format="dd-mm-yyyy" value="<?=date("d-m-Y")?>">
                  </td>
                <td colspan="2">&nbsp;</td>
                <td></td>
                <td><input type="submit" value="Simpan" class="btn btn-primary"> </td>
              </tr>
            </form>
            </tfoot>
          </table>
          <br/>
        </td>
      </tr>
    </tbody>
  </table>
</div>
