<div class="box " id="information" style="width: 296px;">
  <div class="box-head">Category</div>
  <div class="box-body">
    <div id="informationContent" class="sideBoxContent">
      <ul style="margin: 0pt; padding: 0pt; list-style-type: none;">
        <?php
      if(count($left_menu)>0):
        foreach($left_menu as $lm) :
        ?>
          <li>
            <a href="<?=base_url("frontend/categories/".$lm->id)?>"><?=$lm->nama?></a>
          </li>
      <?php
        endforeach;
      endif;
       ?>
      </ul>
    </div>                      
  </div> 
</div>