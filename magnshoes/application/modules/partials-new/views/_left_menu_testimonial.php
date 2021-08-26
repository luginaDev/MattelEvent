<?php 
  $this->load->model("testimonial_model","tts");
  $testi = $this->tts->find(array("pages"=>"testimonial"),0,-1);
?>
<div class="box " id="information2" style="width: 296px;">
  <div class="box-head">Testimonial</div>
  <div class="box-body">
    <div id="informationContent" class="testimonial_wrapper sideBoxContent">
    	<h2>Testimonial</h2>
      <ul style="margin: 0pt; padding: 0pt; list-style-type: none;">
      <?php foreach($testi as $t): ?>
      	<li>
      		<label>Nama:</label>
      		<p><?=$t->nama?></p>
      	</li>
      	<li>
      		<label>Email:</label>
      		<p><?=$t->email?></p>
      	</li>
      	<li>
      		<p style="width: 100%;"><?=word_limiter($t->deskripsi,20);?></p>
      	</li>
        <?php endforeach; ?>
      </ul>
    </div>                      
  </div> 
</div>