<?php 

function grap_tiki($url,$kode_pengiriman){
    $this_ci = & get_instance();
    $this_ci->load->library('curl');
    $this_ci->load->helper('dom_helper');
    $curl_html =  $this_ci->curl->simple_post($url, array('get_con'=>"$kode_pengiriman","submit" => "Check")); 
    $html =  str_get_html("$curl_html"); 
    $find = $html->find("div[id='myisi'] table");
    $find_tr = $html->find("div[id='myisi'] table tr");
    echo $html;
    print_r($find_tr);
    $status = "";
    $nextVal = Array();
    if(count($find_tr)>0){
      echo "<h1>DATA KOSONG</h1>";
      die;
    }
    foreach($find_tr as $ind => $e){
      echo $e;
        if(strpos($e, "SUCCEED")){
          
          $index=((($ind+1) * 3) -1);
          $date = $html->find("div[id='myisi'] table tr td",$index);
          $time = $html->find("div[id='myisi'] table tr td",($index +1));
          $status = strtolower(strip_tags($html->find("div[id='myisi'] table tr td",($index +2))));
          $nextVal["status"] = strip_tags($status);
          $nextVal["location"] = $html->find("div[id='myisi'] table tr td",($index +3));
          $nextVal["remark"] = $html->find("div[id='myisi'] table tr td",($index + 4));
          // $datetime = $this->convertion_date(strip_tags($date),strip_tags($time),"/");
          $nextVal["datetime"] = convertion_date(strip_tags($date),strip_tags($time),"/");

        }
      
     }

      $response="--";
      if(empty($status)){
        $response = 'proses';
      }else{
        $pos1 = stripos(strtolower($status), "succeed");
       
        if($status=="succeed") {
          $response = "terkirim" ;
          $nextVal["status"] = "terkirim";
        }else{
          $response = "mengirim";
          $nextVal["status"] = "mengirim";
        }
      }
      print_r($find_tr);die;
      return $nextVal;
  }


  function convertion_date($date,$time,$separator){
    $split = explode($separator,$date);
    return date("Y-m-d H:i:s",strtotime($split[2]."-".$split[1]."-".$split[0]." ".$time));
  }