<div class="widget-shell inner-shadow">
    <div class="widget-header">
      <h2><?php echo $template["title"];?></h2>
    </div>
    <div class="widget-body">
      <form action="#">
      <div class="global-form">
        <div class="half margin-bottom-20">
          <label class="normal-label">Name</label>
          <input type="text" class="clear-focus normal" name="name" id="name" />
        </div>
        <div class="quarter margin-bottom-20">
          <label class="normal-label" for="choose-file">Picture</label>
          <div class="file-input">
            <input type="file" id="choose-file" class="choose-file" name="choose-file" />
            <span class="button">- - - - -</span>
          </div>
        </div>
        <div class="fclear"></div>
        <div class="half margin-bottom-20">
          <label class="normal-label">Email</label>
          <input type="text" class="normal" name="Email" id="Email" />
        </div>
        <div class="fclear"></div>
        <div class="half margin-bottom-20">
          <label class="normal-label">Password</label>
          <input type="password" class="normal" name="password" id="password" />
        </div>
        <div class="fclear"></div>
        <div class="half margin-bottom-20">
          <label class="normal-label">Confirm Password</label>
          <input type="password" class="normal" name="confirm_password" id="confirm_password" />
        </div>
      </div>
      <div class="fclear"></div>
      <div class="global-form-footer">
        <input type="reset" value="Cancel" />
        <input class="btn-theme" id="submit" type="submit" value="Submit" />
      </div>
      </form>
    </div>
  </div>
  <!-- //End Form Widget with Input Text, Date Picker, Textarea and Buttons -->
<!-- ********************************************************************* -->