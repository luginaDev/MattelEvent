<?php
 $member_val = array(
    "no_ktp" => "",
    "nama" => "",
    "alamat" => "",
    "agama_id" => "",
    "kelurahan_id" => "",
    "telp" => "",
    "email" => ""

    );
 $hidden=0;
 echo $this->session->userdata("member_login");
if($this->session->userdata('member_login')!=""){
  $this->load->model("members/member_model","mem");
  $member = $this->mem->find_entity_by("email",$this->session->userdata("member_login"));
  $member_val = array(
    "no_ktp" => $member->no_ktp,
    "nama" => $member->nama,
    "alamat" => $member->alamat,
    "agama_id" => $member->agama_id,
    "kelurahan_id" => $member->kelurahan_id,
    "telp" => $member->telp,
    "email" => $member->email

    );
  $hidden=1;
}
?>
<script type="text/javascript" src="<?=$this->template->get_js_path();?>jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?=base_url("assets/js/jquery.validate.js");?>"></script>

<script type="text/javascript" src="<?=base_url('assets/js/jquery.realperson.package-1.0.1/jquery.realperson.js')?>"></script>
<style type="text/css">@import "<?=base_url('assets/js/jquery.realperson.package-1.0.1/jquery.realperson.css')?>" </style>
<script>

  $(document).ready(function(){
    
    $("#form-validate").validate({
      rules: {
        password: "required",
        confirm: {
          equalTo: "#password"
        }
        // ,
        // email: {
        //   required: true,
        //   email: true,
        //   remote: "<?=base_url("frontend/check_email_member")?>"
        // }
      }
    });

    $("#frm-propinsi_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kota")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kota_id").html(data);

          }
        });
      }
    });


    $("#frm-kota_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kecamatan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kecamatan_id").html(data);
          }
        });
      }
    });

    $("#frm-kecamatan_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kelurahan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kelurahan_id").html(data);
          }
        });
      }
    });

    
    $("#frm-kota_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kecamatan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kecamatan_id").html(data);
          } 
        });
      }
    });

    $("#frm-kecamatan_id").change(function(){
      var id=$(this).val();
      if(id != "--"){
        $.ajax({
          url :'<?=base_url("partials/select_option_kelurahan")?>',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kelurahan_id").html(data);
          } 
        });
      }
    });
     $("#recaptcha").realperson({length: 5});
  });
</script>
<div class="register_path">
  <h1>Register Account</h1>
  <div class="register_content">
    <p style="padding-top: 10px;">Silakan mengisi data diri Anda pada form di bawah ini:</p>
    <form method="post" action="<?=base_url("frontend/create_registrasi_member")?>" id="form-validate">

      <h3>Data Personal:</h3>
      <div class="content">
        <table class="form">
          <tbody>
            <tr>
              <td>
                <span class="required">*</span> No-ktp :
              </td>
              <td>
                <input class="q1 required" type="text" name="no_ktp" value="<?=$member_val["no_ktp"]?>" size="41" <?=($hidden==1 ? "readonly='true'" : "")?>>
              </td>
            </tr>
            <tr>
              <td>
                <span class="required">*</span> nama:
              </td>
              <td>
                <input class="q1 required" type="text" name="nama" value="<?=$member_val["nama"]?>" size="33">              </td>
            </tr>

            
            <tr>
              <td>
                <span class="required">*</span> telp:
              </td>
              <td>
              <input class="q1 required number" type="text" name="telp" value="<?=$member_val["telp"]?>" size="33">
              <input type="hidden" name="agama_id" value="1" >
            </tr>

          </tbody>
        </table>
      </div>
      <h2>Alamat</h2>
      <div class="content">
        <table class="form">
          <tbody>
            <tr>
              <td>
                <span class="required ">*</span> Alamat Lengkap:
              </td>
              <td>
                <input class="q1 required" type="text" name="address_1" value="<?=$member_val["alamat"]?>">
              </td>
            </tr>
            <tr>
              <td>
                <span class="required">*</span>Propinsi:
              </td>
              <td>
                 <select id="frm-propinsi_id" class="q1 required">
                  <option value="--">--pilih--</option>
                  <?php
                    $prop = $this->pr->find(array(),0,-1);
                    foreach($prop as $pr){
                      echo "<option value='".$pr->id."' > $pr->nama</option>";
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <span class="required">*</span> Kota :
              </td>
              <td>
                <select id="frm-kota_id" class="q1 required">
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <span class="required">*</span> Kecamatan :
              </td>
              <td>
                <select id="frm-kecamatan_id" class="q1 required">
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <span class="required">*</span> Kelurahan :
              </td>
              <td>
                <select id="frm-kelurahan_id" name="kelurahan_id" class="q1 required">
                </select>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <h2>Password</h2>
      <div class="content">
        <table class="form">
          <tbody>
            <tr>
              <td>
                <span class="required">*</span> Email:
              </td>
              <td>
                <input class="q1 required email" type="text" name="email" value="<?=$member_val["email"]?>" >
              </td>
            </tr>
            <tr>
              <td>
                <span class="required">*</span> Password:
              </td>
              <td>
                <input class="q1 required" type="password" name="password" value="" id="password">
              </td>
            </tr>
            <tr>
              <td>
                <span class="required">*</span> Konfirmasi Password:
              </td>
              <td>
                <input class="q1 required" type="password" name="confirm" value="" id="confirm">
              </td>
            </tr>
          </tbody>
        </table>
        <input class="q1 required" type="text" name="recaptcha" value="" id="recaptcha">
      </div>
      
      <div class="buttons">
        <div class="agree">
        </div>
      </div>
      <input type="submit" value ="Simpan" class="button"> 
    </form>
  </div>
</div>