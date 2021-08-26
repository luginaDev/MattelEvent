<script type="text/javascript">
$(document).ready(function(){
	$(".link_kirim").click(function(){
		var newurl ="<?=base_url()?>";
		var id = $(this).attr("id");
		$.ajax({
		  type: 'POST',
		  url: newurl+"checkout/update_pengiriman/",
		  data: {"id": id},
		  success: function(data){
		  	window.location.reload();
		  },
		  dataType: "html"
		});
		
		
	});
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
});
</script>
<?php
	$vendor = $this->vendor->find_entity_by_id($rows->vendor_id);
?>
<div style="width:300px">
	<h4> Detail Pengiriman </h4>
	<table> 
		<tr>
			<th> Vendor</th>
			<th> :</th>
			<th> <?=$vendor->nama?></th>
		</tr>
		<tr>
			<th> Alamat yang Dituju </th>
			<th> :</th>
			<th><?=$rows->alamat?> </th>
		</tr>
		<tr>
			<th> Kode Pengiriman </th>
			<th> :</th>
			<th> <?=$rows->kode_pengiriman?></th>
		</tr>
		<tr>
			<th> Tanggal Pengiriman </th>
			<th> :</th>
			<th> <?=$rows->tanggal?></th>
		</tr>
		<tr>
			<th colspan="3"></th>
		</tr>
	</table>
	<div id="view_tracking"> </div>
	<a class='iframe' href="<?=$vendor->site?>">Traking</a> 
	 <?php if($rows->status_pengiriman == "mengirim"){ ?>
	 <br/>
	 	<label>Click ini (</label>
		<a class="link_kirim" href="#" id="<?=$rows->id?>" > Barang telah Terkirim </a>
		<label>) Bila Barang Telah diterima </label>
	 <?php } ?>
	
</div>