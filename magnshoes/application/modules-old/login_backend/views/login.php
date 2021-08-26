<!-- 
<form class="form-horizontal" method="post" action="<?=base_url("login_backend/login")?>">
  <fieldset>
    <legend>Login Area </legend>
    <div class="span5">
      <div class="control-group well">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
          <input type="text" class="input-xlarge" id="email" name="email" autocomplete="off"> 
          <p class="help-block">Masukan Email Anda </p>
        </div>
        <br/>
        <label class="control-label" for="password">Password</label>
        <div class="controls">
          <input type="password" class="input-xlarge" id="password" name="password" autocomplete="off">
          <p class="help-block">Isikan Password Anda </p>
        </div>
        <br/>
        <div class="controls">
          <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Log In">
        </div>
      </div>
    </div>
    <div class="span7 well">
      <h3> Halaman Administrator </h3>
      <p> Selamat Datang di Halaman Administrator Mag N Shoes Official Site </p>

    </div>
  </fieldset>
</form>
 -->
<form action="<?=base_url("login_backend/login")?>" method="post">
  <div class="login-head"><img src="<?=$this->template->get_img_path();?>logo.gif"></div>
  <div class="login-fields">
    <div class="field row-fluid">
      <label for="username">Username:</label>
      <input type="text" id="email" name="email" value="" placeholder="email" class="span12">
    </div>
    <div class="field row-fluid">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" value="" placeholder="Password" class="span12">
    </div>
  </div> 
  <div class="login-actions">
    <span class="login-checkbox">
      <label class="" for="Field">
        keep me signed in
        <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4"> 
      </label>
    </span>
    <!-- <button class="button btn btn-info btn-large">Sign In</button> -->
    <input type="submit" class="button btn btn-info btn-large" id="submit" name="submit" value="Sign In">
  </div> 
</form> 