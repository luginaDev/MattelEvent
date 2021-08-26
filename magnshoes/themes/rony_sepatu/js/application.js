$(document).ready(function(){
  $(":text").labelify();
  $(".login").colorbox({rel:'login'});
  $(".register").colorbox({rel:'register'});
  // $(".sso").colorbox({rel:'sso'});
  $(".display_image").colorbox({rel:'display_image'});
  $('#slider1').anythingSlider({
    expand       : true,
    autoPlay     : true
  });
  $(".display_image").live("click",function(){
    $(".cboxPhoto").parents().find("#cboxContent").addClass("colorbox_img");
  });
  
  var add_wish = function(){
    var id = $(this).attr("id");
    // alert("form_wish-"+id);
    $('#form_wish-'+id).submit(function() {
      alert(1);
    });
    
  }

  $(".add_to_wish").click(add_wish);

  $(".remove_wish_list").click(function(){
    var id = $(this).attr("id");
    var href = $(this).attr("href");

    $.ajax({
      url: href,
      success: function(data) {
        $('.result').html(data);
        alert('Load was performed.');
      }
    });
  });
  $("#form-validate").validate();
  var pesan = $("#pesan").val();
  if(pesan!=""){
    $().message(pesan);
    $("#pesan").val("");
  }
  $('.rating').rating({
    callback: function(value, link){
      var id=$(this).attr("name");
      var detail_produk_id = id.split('-');
      $.post($("#base_url").val()+"partials/add_rating",
        { 'detail_produk_id': detail_produk_id[1] , 'rating' : value },
        function(data){
          var pesan = data.split("|");
          if(pesan[0] == "success"){
            $().message(pesan[1]);
            window.location.reload();
          }else if(pesan[0] == "error"){
            $().message(pesan[1]);
          }
          console.log(data);
        }
      );
    }
  });
  $("#recaptcha").realperson({length: 5});
  $(".ajax").colorbox();
  // setTimeout('run_jobs()',50000);
  setTimeout('run_jobs()',35000);
  //setTimeout('run_job_members()',500000);
  // setTimeout('run_cancelsell_jobs()',500)
   // $(".tanggal").datepicker();
   // $('.tanggal').DatePickerGetDate("Y-m-d");
   $('#tanggal_bayar').datepicker();

});

function run_jobs(){
  var url = $("#base_url").val();
    $.getScript(url+"background_jobs/run_job_from_cart", function(data, textStatus, jqxhr) {
       console.log(data); //data returned
       console.log(textStatus); //success
       console.log(jqxhr.status); //200
       console.log('Run Background Jobs session 1 hours');
    });
    setTimeout('run_jobs()',300000);
  }

  function run_job_members(){
  var url = $("#base_url").val();
    $.getScript(url+"background_jobs/run_job_from_cart_member", function(data, textStatus, jqxhr) {
       // console.log(data); //data returned
       // console.log(textStatus); //success
       // console.log(jqxhr.status); //200
       // console.log('Run Background Jobs session 1 hours');
    });
    setTimeout('run_job_members()',50000);
  }

  function run_cancelsell_jobs(){
  var url = $("#base_url").val();
  // alert(url);
    $.getScript(url+"frontend/cancel_sell", function(data, textStatus, jqxhr) {
       // console.log(data); //data returned
       // console.log(textStatus); //success
       // console.log(jqxhr.status); //200
       // console.log('Run Background Jobs session 1 day');
    });
    setTimeout('run_cancelsell_jobs()',3000);
  }

  function val_kelurahan(id){
    var base_url = $("#base_url").val();
    $.ajax({
          url : base_url+'partials/show_option_kelurahan',
          data :"id="+id ,
          type :"POST",
          success : function(data){
            $("#frm-kelurahan_id").html(data);
          }
        });
  }

  function val_kecamatan(kelurahan_id){
    var base_url = $("#base_url").val();
    $.ajax({
          url : base_url+'partials/show_option_kecamatan',
          data :"id="+kelurahan_id,
          type :"POST",
          success : function(data){
            $("#frm-kecamatan_id").html(data);
          }
        });
  }

  function val_kota(kelurahan_id){
    var base_url = $("#base_url").val();
    $.ajax({
          url : base_url+'partials/show_option_kota',
          data :"id="+kelurahan_id,
          type :"POST",
          success : function(data){
            $("#frm-kota_id").html(data);
          }
        });
  }

  function val_kota(kelurahan_id){
    var base_url = $("#base_url").val();
    $.ajax({
          url :base_url+'partials/show_option_kota',
          data :"id="+kelurahan_id,
          type :"POST",
          success : function(data){
            $("#frm-kota_id").html(data);
          }
        });
  }

  function val_prop(kelurahan_id){
    var base_url = $("#base_url").val();
    $.ajax({
          url :base_url+'partials/show_option_prop',
          data :"id="+kelurahan_id,
          type :"POST",
          success : function(data){
            $("#frm-prop_id").html(data);
          }
        });
  }
