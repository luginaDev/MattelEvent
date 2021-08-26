<div class="widget-shell tabbing">
<div class="widget-body" id="tab2a">
  <!-- <form action="<?=base_url()?>careerpages/create" method="post"> -->
  <?=form_open('careerpages/edit/'.$rows['data']->id)?>
    <div class="global-form">
        <div class="quarter margin-bottom-20">
          <label class="normal-label">Title</label>
          <input type="text" id="title" name="title" class="clear-focus normal" value="<?=$rows['data']->title?>"  />
        </div>
        <div class="quarter margin-bottom-20">
          <label class="normal-label">Location</label>
          <input type="text" id="location" name="location" class="clear-focus normal" value="<?=$rows['data']->location?>" />
        </div>
        <div class="quarter margin-bottom-20">
          <label class="normal-label">Start </label>
          <input type="text" id="start_date" name="start_date" class=" datepicker normal" value="<?=$rows['data']->start_date?>" />
        </div>
        <div class="quarter margin-bottom-20 ">
          <label class="normal-label">End</label>
          <input type="text" id="end_date" name="end_date" class="datepicker normal" value="<?=$rows['data']->end_date?>" />
        </div>
        <div class="fclear"></div>
        <div class="margin-bottom-20">
          <label class="normal-label fleft">Requirement</label>
          <div class="textarea-switcher">
            <p>
              <a href="#" class="radio-link-selected">HTML EDITOR</a>
            </p>
          </div>
          <div class="fclear"></div>
          <textarea id="requirement" name="requirement" class="normal textareaMark " rows="5" cols="20"><?=$rows['data']->requirement?></textarea>
        </div>
      <div class="global-form-footer">
        <input type="reset" value="Cancel" />
        <input class="btn-theme" id="submit" type="submit" value="Submit" />
      </div>
    </div>
    <?=form_close()?>
  </div>
</div>