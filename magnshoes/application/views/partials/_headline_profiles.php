<div class="span5 well" >
<?php // print_r($data);?>
<?php foreach($data as $d){ ?>
  <dl>
    <dt><h2><?=$d->intitle?></h2></dt>
    <dd> <?=word_limiter($d->incontent,50)?> </dd>
    <br/>
    <dd><a class="btn btn-primary btn-small"> Selengkapnya </a></dd>
  </dl>
  <hr/> 
<?php } ?>
</div>