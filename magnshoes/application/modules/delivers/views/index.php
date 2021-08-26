<script>
  $(document).ready(function(){
    $(".curd_edit").click(function(){
      var id = $(this).attr("id");
      var email = $("#email-"+id).val();
      var invoice = $("#invoice-"+id).val();
      var paket = $("#vendor-"+id).val();
     
      $("#frm-id").val(id);
      $("#frm-email").val(email);
      $("#frm-invoice").val(invoice);
      $("#frm-paket").val(paket);
      
      $('#myModal').modal('show');
    });
    var detail = function(){
      var id = $(this).attr("id");
      $.post("<?=base_url("sells/detail")?>", { id: id} ,function(data){
        console.log(data);
      });
    }

    $(".curd_detail").live("click",detail);

  });
</script>
    <h2><?=$title_form?></h2>
    <br/>
    <!-- <a class="btn" data-toggle="modal" href="#myModal" >Tambah <?=$title_form?> </a>    <div id="demo"> -->
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Invoice</th>
        <th>Kode Pengiriman</th>
        <th>Vendor</th>
        <th>Alamat</th>
        <th>Status Pengiriman</th>
        <th>Tanggal Penerimaan</th>
        <th>Biaya Pengiriman</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 

      foreach($data[0] as $i => $d):
      if($d->type_pembayaran !="cod"){
       $kirim = $this->dv->find_entity_by("pembelian_id",$d->id);
       if(!empty($kirim->id)){
       $tarif = $this->f->find_entity_by_id($kirim->tarif_id);
       $vendor = $this->v->find_entity_by_id($kirim->vendor_id);
       $member = $this->mem->find_entity_by("no_ktp",$d->member_no_ktp);
       if($kirim->status_pengiriman == "belum"){
          $btn_status = "<span class='label label-important'>Belum</span>";
       }else if($kirim->status_pengiriman == "mengirim"){
          $btn_status = "<span class='label label-warning'>Mengirim</span>";
       }else if($kirim->status_pengiriman =="terkirim"){
          $btn_status = "<span class='label label-success'>Terkirim </span>";
       }else{

       }
    ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->invoice?></td>
          <input type="hidden" id="member_no_ktp-<?=$d->id?>" value="<?=$d->member_no_ktp?>"/>
          <input type="hidden" id="invoice-<?=$kirim->id?>" value="<?=$d->invoice?>"/>
          <input type="hidden" id="email-<?=$kirim->id?>" value="<?=$member->email?>"/>
          <input type="hidden" id="vendor-<?=$kirim->id?>" value="<?=$vendor->nama?>"/>
        <td> <?=$kirim->kode_pengiriman?> </td>
        <td> <?=$vendor->nama?> </td>
        <td> <?=$kirim->alamat?> </td>
        <td> <?=$btn_status?> </td>
        <td> <?=$kirim->tanggal_penerimaan?><?//php echo ($kirim->tanggal_penerimaan=="0000-00-00 00:00:00" ? "N/A" : date("d-m-Y H:i:s",$kirim->tanggal_penerimaan)); ?> </td>
        <td> Rp.<?=number_format($kirim->total_biaya)?>  </td>

        <td>Rp.<?=number_format($d->total)?> <input type="hidden" id="total-<?=$d->id?>" value="<?=$d->total?>"/></td>
        <td>
          <div class="btn-group">
            <a class="btn btn-primary" href="#"><i class="icon-th-large icon-white"></i> Action</a>
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#" class="curd_edit" id="<?=$kirim->id?>">
                  <i class="icon-edit"></i>
                  Pengiriman
                </a>
              </li>
              <?php if(!empty($kirim->kode_pengiriman)){ ?>
              <li>
                  <a href="<?=base_url("delivers/check_deliveries/$kirim->id/$vendor->id")?>" id="<?=$kirim->id?>"> <i class="icon-search"></i>Tracking</a>
              </li>
              <?php } ?>
              
              <li>
                <a href="#" id="btnPrintPage" class="btnPrintPage" kode="<?=$kirim->id?>">
                  <i class="icon-print"></i> 
                  label
                </a>
              </li>
            </ul>
          </div>
        </td>
      </tr>
    <?php } } endforeach;?>
    </tbody>
  </table>
</div>

<form class="form-horizontal" method="post" action="<?=base_url("delivers/save")?>" id="form-validate">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Tambah <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    <div class="control-group">
      <label class="control-label" for="nama">Kode Pengiriman</label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-kode_pengiriman" name="kode_pengiriman">
        <input type="hidden" class="input-xlarge" id="frm-id" name="id">
        <input type="hidden" class="input-xlarge" id="frm-email" name="email">
        <input type="hidden" class="input-xlarge" id="frm-invoice" name="invoice">
        <input type="hidden" class="input-xlarge" id="frm-paket" name="vendor">
        <p class="help-block">Masukan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="nama">Tanggal Pengiriman</label>
      <div class="controls">
        <input type="text" class="input-xlarge tanggal" id="frm-tanggal" name="tanggal" value="2012-08-08" data-date-format="yyyy-mm-dd">
        <p class="help-block">Masukan tanggal pengiriman</p>
      </div>
    </div>
    <input type="hidden" name="status_pengiriman" value="mengirim">
    <!-- <div class="control-group">
      <label class="control-label" for="nama">Status Pengiriman</label>
      <div class="controls">
        <select name="status_pengiriman"  class="input-xlarge required" >
          <option value="mengirim">mengirim</option>
          <option value="terkirim">terkirim</option>
        </select>
        <p class="help-block">Masukan tanggal pengiriman</p>
      </div>
    </div> -->
  </p>
  </div>
  <div class="modal-footer">
  <a href="#" class="btn close-modal">Close</a>
  <input type="submit" value="Save changes" class="btn btn-primary"> 
  </div>
</div>
</form>

<div id="divPrintPage">
  
</div>