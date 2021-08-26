<?php $b = $this->config->item("base_url") . "/"; ?>

<!-- LOFSLIDER NEWS -->
<script type="text/javascript" src="<?php echo $b ?>js/lofslidernews/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo $b ?>js/lofslidernews/script.js"></script>
<link type="text/css" href="<?php echo $b ?>js/lofslidernews/css/layout.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $b ?>js/lofslidernews/css/style.css" rel="stylesheet" />

<script type="text/javascript">
 $(document).ready( function(){	
		$('#lofslidecontent45').lofJSidernews({
			interval:2000,
			easing:'easeInOutQuad',
			duration:1200,
			auto:true });
	});
</script>

<style>
	ul.lof-main-wapper li {
		position:relative;	
	}
</style>

<div class="contentmain">
  <h1>Products</h1><hr/>
  
  <div id="lofslidecontent45" class="lof-slidecontent">
	<div class="preload"><div></div></div>
 	
 	<!-- MAIN CONTENT --> 
  <div class="lof-main-outer">
  <?php if(count($img)>0){ ?>
  	<ul class="lof-main-wapper">
     <?php foreach($img as $i) { ?>
  		<li>
      	<img src="<?php echo base_url();?>images/pages/<?=$i->image?>" title="<?=$i->intitle?>" height="300" width="900">
      </li>
    <?php } ?>
    </ul>
  <?php } ?>
  </div>
  <!-- END MAIN CONTENT -->
   
  <!-- NAVIGATOR -->
  <div class="lof-navigator-outer">
  <?php if(count($img)>0){ ?>
  	<ul class="lof-navigator">
    <?php foreach($img as $i) { ?>
  		<li>
  			<div>
  				<img src="<?php echo base_url();?>images/pages/<?=$i->image?>" />
  					<h3><?=$i->intitle?></h3>
  					<span><?=$i->indescription?></span> 
  			</div>
  		</li>
      <?php } ?>
    </ul>
  <?php } ?>
  </div>
 </div> 
  
</div>