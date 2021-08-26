<script>
  $(document).ready(function(){
    var detail = function(){
      var id = $(this).attr("id");
      $.post("<?=base_url("returns/show")?>", { id: id} ,function(data){
        $('#myDetail').html(data);
        $('#myDetail').modal('show');
      });

    }

    $(".curd_detail").click(detail);

  });
</script>
  
     <form class="well" action="<?=base_url('reports/return_reports')?>" method="post">
    <?=$this->load->view("reports/_search_form")?>
    </form>

    <br/>
    <?=$pdf_link?>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="reports">
    <caption> <?=$title_form?> </caption>
      <thead>
      <tr>
        <th>No</th>
        <th>Gambar Retur</th>
        <th>No Ktp</th>
        <th>Tanggal pembelian</th>
        <th>Tanggal retur</th>
        <th>Type Pembayaran</th>
        <th>Jumlah retur</th>
        <th>Keterangan retur</th>
        <th>Keterangan Verifikasi</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($data[0] as $i => $d):
      $pem = $this->c->find_entity_by_id($d->pembelian_id);
      $detail_retur  = $this->drt->find(array("retur_pembelian_id" => $d->pembelian_id),0,-1);
      $gambar   = "<ul>";
      $ket      = "<ul>";
      $jumlah   = "<ul>";
      $ket_ver  = "<ul>";
      $status   = "<ul>";
      foreach($detail_retur as $dr){
        $gambar   .="<li> <img src='".base_url("assets/uploads/returs/$dr->gambar")."' style='width: 88px;  height: 50px;' alt='".$dr->gambar."'/> </li>";
        $ket      .= "<li>&nbsp; $dr->keterangan_retur </li>";
        $jumlah   .= "<li>&nbsp; $dr->jumlah </li>";
        $ket_ver  .= "<li>&nbsp; $dr->keterangan_verifikasi </li>";
        $status   .= "<li>&nbsp; $dr->status </li>";
      }
      $gambar   .= "</ul>";
      $ket      .= "</ul>";
      $jumlah   .= "</ul>";
      $ket_ver  .= "</ul>";
      $status   .= "</ul>";
    ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$gambar?></td>
        <td><?=$pem->member_no_ktp?><input type="hidden" id="member_no_ktp-<?=$pem->id?>" value="<?=$pem->member_no_ktp?>"/></td>
        <td><?=date("d-m-Y",strtotime($pem->tanggal))?> </td>
        <td><?=date("d-m-Y",strtotime($d->tanggal_retur))?> </td>
        <td><?=$pem->type_pembayaran?> </td>
        <td><?=$jumlah?></td>
        <td><?=$ket?></td>
        <td><?=$ket_ver?></td>
        <td><?=$status?></td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<div class="modal" id="myDetail" style="display:none">

</div>

<form class="form-horizontal" method="post" action="<?=base_url("sells/save")?>" style="display:none">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Tambah <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    <div class="control-group">
      <label class="control-label" for="nama">Nama</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="frm-nama" name="nama">
        <input type="hidden" class="input-xlarge" id="frm-id" name="id">
        <p class="help-block">Masukan nama</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="Deskripsi">Deskripsi</label>
      <div class="controls">
        <textarea class="input-xlarge" id="frm-deskripsi" name="deskripsi"> </textarea>
        <p class="help-block">Masukan Keterangan / Deskripsi </p>
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
