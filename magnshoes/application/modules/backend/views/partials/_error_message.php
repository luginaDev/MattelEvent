<?php 
$success = $this->session->flashdata('success');
$error = $this->session->flashdata('error');
?>
<?php if(!empty($success)) { ?>
<div class="alert alert-success">
  <p><span class="ico-text ico-alert-success"></span><?=$success?></p>
</div>
<?php } ?>
<?php if(!empty($error)) { ?>
<div class="alert alert-error">
  <p><span class="ico-text ico-alert-error"></span><?=$error?></p>
</div>
<?php } ?>
