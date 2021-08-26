<div class="contentmain">
  <h1>Special Hampers</h1><hr/>
  
<div class="panel" style="padding: 5px;">
<?php if(count($img)>0){ ?>
  <div id="custom-menu-2"></div>
  <div id="mybook">
    <div class="b-load">
     <?php foreach($img as $i) { ?>
      <div title="<?=$i->intitle?>" > 
        <h3><?=$i->intitle?> </h3>
        <img src="<?php echo base_url();?>images/pages/<?=$i->image?>" alt="<?=$i->intitle?>"/>
        <p><?=$i->indescription?></p>
      </div>
    <?php } ?>
     <!--  <div> 
          <h3>Brownies Gulung</h3>
          <img src="<?php echo base_url() ?>images/slides/2.jpg" alt=""/>
          <p>This tutorial is about creating a creative gallery with a
            slider for the thumbnails. The idea is to have an expanding
            thumbnails area which opens once an album is chosen.
            The thumbnails will scroll to the end and move back to
            the first image. The user can scroll through the thumbnails
            by using the slider controls. When a thumbnail is clicked,
            it moves to the center and the full image preview opens.
          </p>
      </div>
      <div title="Brownies Gulung"> 
          <h3>Slider Gallery 3</h3>
          <img src="<?php echo base_url() ?>images/slides/3.jpg" alt=""/>
          <p>This tutorial is about creating a creative gallery with a
            slider for the thumbnails. The idea is to have an expanding
            thumbnails area which opens once an album is chosen.
            The thumbnails will scroll to the end and move back to
            the first image. The user can scroll through the thumbnails
            by using the slider controls. When a thumbnail is clicked,
            it moves to the center and the full image preview opens.
          </p>
      </div>
      <div> 
          <h3>Slider Gallery 4</h3>
          <img src="<?php echo base_url() ?>images/slides/4.jpg" alt=""/>
          <p>This tutorial is about creating a creative gallery with a
            slider for the thumbnails. The idea is to have an expanding
            thumbnails area which opens once an album is chosen.
            The thumbnails will scroll to the end and move back to
            the first image. The user can scroll through the thumbnails
            by using the slider controls. When a thumbnail is clicked,
            it moves to the center and the full image preview opens.
          </p>
      </div>
      <div title="Hooray for titles!"> 
          <h3>Slider Gallery 5 </h3>
          <img src="<?php echo base_url() ?>images/slides/5.jpg" alt=""/>
          <p>This tutorial is about creating a creative gallery with a
            slider for the thumbnails. The idea is to have an expanding
            thumbnails area which opens once an album is chosen.
            The thumbnails will scroll to the end and move back to
            the first image. The user can scroll through the thumbnails
            by using the slider controls. When a thumbnail is clicked,
            it moves to the center and the full image preview opens.
          </p>
      </div>
      <div> 
          <h3>Slider Gallery 6</h3>
          <img src="<?php echo base_url() ?>images/slides/1.jpg" alt=""/>
          <p>This tutorial is about creating a creative gallery with a
            slider for the thumbnails. The idea is to have an expanding
            thumbnails area which opens once an album is chosen.
            The thumbnails will scroll to the end and move back to
            the first image. The user can scroll through the thumbnails
            by using the slider controls. When a thumbnail is clicked,
            it moves to the center and the full image preview opens.
          </p>
      </div>  -->
       
    </div>
  </div>
<?php } ?>
</div>