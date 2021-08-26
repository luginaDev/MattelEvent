<?php $b = $this->config->item("base_url") . "/"; ?>

<!-- LOFSLIDER NEWS -->
<script type="text/javascript" src="<?php echo $b ?>js/lofslidernews/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/lofslidernews/script.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/zoomer.js"></script>
<link type="text/css" href="<?php echo $b ?>js/lofslidernews/css/layout.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $b ?>js/lofslidernews/css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $b ?>css/zoomer.css" rel="stylesheet" />

<script type="text/javascript">
 $(document).ready( function(){	
		$('#lofslidecontent45').lofJSidernews({
			interval:2000,
			easing:'easeInOutQuad',
			duration:1200,
			auto:true });

		$('ul.thumb li').Zoomer({speedView:200,speedRemove:400,altAnim:true,speedTitle:400,debug:false});
	});
</script>

<div class="contentmain">
  <div class="child_header" style="background: #66CC00;">
  	<p>Jajanan Kebon Jukut</p>
  </div>
  
	<div>
		<img src="<?php echo $b . "images/kebonjukut/KJ1.jpg" ?>" width="860" />
	</div>
	
	<div class="child_paragraph">
		<p>Bagi pecinta jajanan khas BANDUNG, harus segera tancap gas ke JAKEJU, pusat jajanan kuliner Bandung terbaru...</p>
		<p>JAKEJU terletak di KARTIKA SARI KEBON JUKUT no.3c-e (Telp 022-422-1975). Setelah berbelanja oleh-oleh khas KARTIKA SARI, pelanggan bisa langsung mencicipi anekamacam jajanan khas BANDUNG seperti mie kocok, baso malang,nasi rames, lotek, dim sum dll...</p>
		<p>Ada apa aja ya di JAKEJU? Kedai Kopi Torabika, Es Campur Oyen, Lotek Katineung, Soto Pasar Baru, Bubur Akiong, Gepuk Ny.Yong, NAMBU, Otak-Otak Ny.Bong, Warung Pempek Dempo, Pisang Simanalagi, Madame Sari Pantry, Baso Tahu Tulen, Mie Kocok, Batagor Fang-Fang, Baso Malang Abun, Nasi Goreng Bogarasa, Susu Kacang Kedelai, Nasi Bakar Ibu Iing, Pojok Nasi, Dimsum, Sate Sineureut, Iga Mehonk</p>
		<p>SELAMAT MENCOBA... KAMI TUNGGU KEHADIRAN ANDA dan KELUARGA</p>
	</div>

	<div class="child_header" style="background: #66CC00;">
		<p>Jajanan Kebon Jukut</p>		
	</div>

	<ul class="thumb kebonjukut">
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS1.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS2.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS3.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS4.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS5.jpg" ?>"></a></li>
	</ul>
	
	<div class="child_header" style="background: #66CC00;">
		<p>Lokasi</p>		
	</div>
	
	<div style="width: 860px; color: #4A4947">
		<p>Kartika Sari Dago Jl. Ir. Juanda no 85 (022-2509495) dan Kartika Sari Buah Batu 165A (022-7318485).</p>
	</div>
  
</div>