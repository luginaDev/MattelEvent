<div class="span6 well" >
<?php //print_r($produk);?>
<?php //print_r($produk);?>

  <h2> <?=$produk['products']->intitle?> </h2>
  <p> <?=word_limiter($produk['products']->incontent,50)?> </p>
  
  <div class="row-fluid">
    <ul class="thumbnails">
    <?php foreach($produk['pictures'] as $pp){ ?>
      <li class="span2">
        <div class="thumbnail">
          <img alt="<?=$pp->intitle?>" src="<?=base_url()?>images/products/<?=$pp->image?>" height="150" width="160">
          <div class="caption">
            <h5><?=$pp->intitle?></h5>
            <p><?=word_limiter($pp->indescription,20)?></p>
            <p>
              <a class="btn btn-primary" href="#">Action</a>
            </p>
          </div>
        </div>
      </li>
    <?php } ?>
    </ul>
  </div>
</div>