<div class="panel" style="height: 470px; padding: 5px;">
  <div style="float: left; width: 650px; height: 400px; border-right: 1px solid #ccc; margin: 0 auto;">
    <div class="pikachoose">
     <?php if(count($img)>0){ ?>
      <ul id="pikame" class="jcarousel-skin-pika">
      <?php foreach($img as $i) { ?>
        <li><a href="#"><img src="<?php echo base_url();?>images/pages/<?=$i->image?>"/></a><span><?=$i->indescription?></span></li>
        <?php } ?>
       </ul>
       <?php } ?>
    </div>
  </div>
  
  <div style="margin: 0px 0px 0px 655px; width: 360px; 
    height: 400px; padding: 0px;">
    <ul style="display: inline; list-style: none; padding: 0px; margin: 0px;">
      <li><a href="store.php"><img src="<?php echo base_url() ?>images/KS23.png"/></a></li>
      <li><a href="<?php echo base_url() . "kartikasari/madamesari"; ?>"><img src="<?php echo base_url() ?>images/KS21.png"/></a></li>
      <li><a href="<?php echo base_url() . "kartikasari/kebonjukut"; ?>"><img src="<?php echo base_url() ?>images/KS22.png"/></a></li>
      <li><a href="<?php echo $this->config->item("kartikasaristore_url"); ?>" target="_blank"><img src="<?php echo base_url() ?>images/KS24.png"/></a></li>
      <li><a href="http://littlegwen.com" target="_blank"><img src="<?php echo base_url() ?>images/KS25.png"/></a></li>
    </ul>
  </div>
</div>