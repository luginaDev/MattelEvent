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
  <div class="child_header" style="background: #FF6600;">
  	<p style="padding: 5px;">Madam Sari Restaurant</p>
  </div>
  
	<div>
		<img src="<?php echo $b . "images/madamesari/MS6.jpg" ?>" width="860" />
	</div>
	
	<div class="child_paragraph">
		<p>MADAME SARI Restaurant telah berdiri sejak tahun 2003. Restaurant ini lahir dari antusiasme sang pemilik Kartika Sari untuk menghadirkan masakan khas indonesia yang otentik dan PAS dengan selera para penggemar Kartika Sari. Konsep MADAME SARI Restaurant sendiri adalah untuk menyajikan "masakan sehari-hari" sehingga para penggemar KARTIKA SARI tidak akan bosan untuk selalu singgah ke MADAME SARI Restaurant ketika mereka berbelanja oleh-oleh di Kartika Sari Bandung...</p>
		<p>Menu Unggulan dari MADAME SARI adalah Sop Buntut dan Sop Garang Asam. Wah... ini patut dicoba oleh para penggemar Kartika Sari. Selain itu, ada Nasi Goreng Seafood, Nasi Goreng Kampung, Yamien Manis, dan Pho Bo yang Mak Nyuss banget...</p>
	</div>

	<div class="child_header" style="background: #FF6600;">
		<p>Madam Sari Food</p>		
	</div>

	<ul class="thumb madamesari">
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS1.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS2.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS3.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS4.jpg" ?>"></a></li>
		<li><a href="#"><img alt="Chicken Cordon Blue" src="<?php echo $b . "images/madamesari/MS5.jpg" ?>"></a></li>
	</ul>
	
	
	<div class="child_header" style="background: #FF6600;">
		<p style="padding: 5px;">Lokasi</p>		
	</div>
	
	<div style="width: 860px; color: #4A4947">
		<p>Kartika Sari Dago Jl. Ir. Juanda no 85 (022-2509495) dan Kartika Sari Buah Batu 165A (022-7318485).</p>
	</div>
  
</div>