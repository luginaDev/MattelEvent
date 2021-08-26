<form action="<?=base_url("login_backend/login")?>" method="post">
  <div class="login-head"><img src="<?=$this->template->get_img_path();?>logo.gif"></div>
  <div class="login-fields">
    <div class="field row-fluid">
      <label for="username">email:</label>
      <input type="text" id="email" name="email" value="" placeholder="email" class="span12">
    </div> <!-- /field -->
    <div class="field row-fluid">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" value="" placeholder="Password" class="span12">
    </div> <!-- /password -->
  </div> <!-- /login-fields -->
  <div class="login-actions">
    <span class="login-checkbox">
      <label class="" for="Field">
        keep me signed in
        <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4"> 
      </label>
    </span>
    <!-- <button class="button btn btn-info btn-large">Sign In</button> -->
    <input type="submit" class="button btn btn-info btn-large" id="submit" name="submit" value="Log In">
  </div> <!-- .actions -->
</form>