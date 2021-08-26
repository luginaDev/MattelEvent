<html> 
  <head>
      <title>Proses pembayaran...</title>
      <script type="text/javascript">
      $(document).ready(function(){
        setTimeout("run_paypal()", 8000);
        $("#run_paypal").click(function(){
          $("#cboxClose").click();
        });
      });
      function run_paypal(){
          $("#paypal_form").submit();
       }
      </script>
  </head> 
  <body> 
      <center>
          <h2>Silakan Tunggu beberapa saat.halaman ini akan dialihkan secara otomatis paypal website.</h2>
      </center> 
      <form method="post" name="paypal_form" target="_blank " action="<?=$url?>" id="paypal_form">
        <?php 
        foreach ($rows as $name => $value) {
         echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
        }
        ?>
        <center><br/><br/>Jika halaman tidak diarahkan ke paypal selama 5 ... <br/><br/>
        <center> <input type="submit" value="Click Disini" class='run_paypal'> </center>
      </form> 
  </body>
</html>