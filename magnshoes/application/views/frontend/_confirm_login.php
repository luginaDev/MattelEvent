<script type="text/javascript">
$(document).ready(function(){
  $("#forget_div").hide();
  $("#forget_password").click(function(){
    $("#forget_div").show();
    $("#login").hide();
  });
  // function forget_password(){
  //   $("#forget_div").show();
  //   $("#login").hide();
  // }
});
</script>
<div class="breadcrumb">
  <a href="#">Home</a>
  <!-- http://livedemo00.template-help.com/opencart_38174/index.php?route=common/home -->
   » <a href="#">Account</a>
   » <a href="#" class="last">Login</a>
</div>
<h1>Login area</h1>
<div class="login-content">
  <div class="left">
    <h2>Akses Login lain</h2>
    <div class="content">
      <?=$this->load->view("oauth/index");?>
    </div>
  </div>

  <div class="right">
    <h2>Login Member</h2>
    <form action="<?=base_url("frontend/member_login")?>" method="post" enctype="multipart/form-data" id="login">
      <div class="content">
        <p>I am a returning customer</p>
        <b class="padd-form">E-Mail Address:</b>
        <input class="q1 margen-bottom" type="text" name="email" value="">
        <b class="padd-form">Password:</b>
        <input class="q1" type="password" name="password" value="">
        <br><br>
        <div> </div>
        <!-- <a onclick="$('#login').submit();" class="button"><span>Login</span></a> -->
        <a id="forget_password" >Lupa password</a>
        <input type="submit" value ="login">
      </div>
    </form>
    <div id="forget_div">
      <form method="post" action="<?=base_url("frontend/forget_password")?>" id="forget_form">
        <label class="inputLabel" for="login-email-address">Email:</label>
        <input name="email" size="41" maxlength="96" id="login-email-address" type="text" />
        <input type="submit" name="simpan" value="simpan" >
      </form>
    </div>
  </div>
</div>
