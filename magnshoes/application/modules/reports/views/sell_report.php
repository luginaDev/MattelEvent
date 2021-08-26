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
    <form class="well" action="<?=base_url('reports/sell_report')?>" method="post">
    <?=$this->load->view("reports/_search_form")?>
    </form>
    <br/>
    <?=$pdf_link?>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="reports">
      <thead>
      <tr>
        <th>No</th>
        <th>No Invoice</th>
        <th>Nama</th>
        <th>No KTP</th>
        <th>Tanggal</th>
        
        <th>Status Pembayaran</th>
        <th>Type Pembayaran</th>
        <th>Subtotal</th>
        <th>Total</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($data[0] as $i => $d):
      $member = $this->m->find_entity_by("no_ktp",$d->member_no_ktp);
    ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->invoice?></td>
        <td><input type="hidden" id="nama-<?=$d->id?>" value=""/><?=(empty($member->nama)? "-" : $member->nama )?></td>
        <td><?=$d->member_no_ktp?><input type="hidden" id="member_no_ktp-<?=$d->id?>" value="<?=$d->member_no_ktp?>"/></td>
        <td><?=date("d-m-Y",strtotime($d->tanggal))?><input type="hidden" id="tanggal-<?=$d->id?>" value="<?=$d->tanggal?>"/></td>
        <!-- <td><?=$d->status_barang?><input type="hidden" id="status_barang-<?=$d->id?>" value="<?=$d->status_barang?>"/></td> -->
        <td>
          <?=($d->status_pembayaran=="blom")? "<span class='label label-important'>Belum</span>": "<span class='label label-success'>Sudah</span>"; ?>
          <input type="hidden" id="status_pembayaran-<?=$d->id?>" value="<?=$d->status_pembayaran?>"/></td>
        <td><?=$d->type_pembayaran?> <input type="hidden" id="type_pembayaran-<?=$d->id?>" value="<?=$d->type_pembayaran?>"/></td>
        <td>Rp.<?=number_format($d->subtotal)?> <input type="hidden" id="subtotal-<?=$d->id?>" value="<?=$d->subtotal?>"/></td>
        <td>Rp.<?=number_format($d->total)?> <input type="hidden" id="total-<?=$d->id?>" value="<?=$d->total?>"/></td>
       <!-- <td>
          <a href="<?=base_url('sells/add_payment/'.$d->id)?>" class="curd_detail" id="<?=$d->id?>" > Detail  </a>
        </td> -->
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>
