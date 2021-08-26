<div class="box category">
  <div class="box-heading">Kategori</div>
  <div class="box-content">
    <div class="box-category">
      <div class="box-category">
      <ul>
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
</div>
