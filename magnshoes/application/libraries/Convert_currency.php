<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convert_currency{
  var $xml_file = "www.ecb.int/stats/eurofxref/eurofxref-daily.xml";
  var $exchange_rates = array();
  
  public function convert($amount,$currency_form,$currency_to,$decimals){
    $currency = $this->downloadExchangeRates();
    $now_kurs = explode(".", $currency[$currency_form]);
    $gbg = implode("",$now_kurs);
    $value = number_format(($amount/8900),$decimals);
    return $value;
  }

  public function check_kurs($kurs){
    $currency = $this->downloadExchangeRates();
    //return $currency[$kurs];
    return 9000;
  }

  private function downloadExchangeRates() {
    $currency_domain = substr($this->xml_file,0,strpos($this->xml_file,"/"));
    $currency_file = substr($this->xml_file,strpos($this->xml_file,"/"));
    $fp = @fsockopen($currency_domain, 80, $errno, $errstr, 10);
    if($fp) {
       $out = "GET ".$currency_file." HTTP/1.1\r\n";
       $out .= "Host: ".$currency_domain."\r\n";
       $out .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8) Gecko/20051111 Firefox/1.5\r\n";
       $out .= "Connection: Close\r\n\r\n";
       $buffer ="";
       fwrite($fp, $out);
       while (!feof($fp)) {

          $buffer .= fgets($fp, 128);
       }
       fclose($fp);

       $pattern = "{<Cube\s*currency='(\w*)'\s*rate='([\d\.]*)'/>}is";
       preg_match_all($pattern,$buffer,$xml_rates);
       array_shift($xml_rates);

       for($i=0;$i<count($xml_rates[0]);$i++) {

          $exchange_rate[$xml_rates[0][$i]] = $xml_rates[1][$i];
       }
       // print_r($exchange_rate);

       // $conn = mysql_connect($this->mysql_host,$this->mysql_user,$this->mysql_pass);

       // $rs = mysql_select_db($this->mysql_db,$conn);

       // foreach($exchange_rate as $currency=>$rate) {

       //    if((is_numeric($rate)) && ($rate != 0)) {

       //       $sql = "SELECT * FROM ".$this->mysql_table." WHERE currency='".$currency."'";
       //       $rs =  mysql_query($sql,$conn) or die(mysql_error());
       //       if(mysql_num_rows($rs) > 0) {

       //          $sql = "UPDATE ".$this->mysql_table." SET rate=".$rate." WHERE currency='".$currency."'";
       //       } else {

       //          $sql = "INSERT INTO ".$this->mysql_table." VALUES('".$currency."',".$rate.")";
       //       }

       //       $rs =  mysql_query($sql,$conn) or die(mysql_error());
       //    }

       // }
    }
    return $exchange_rate;
  }

}