<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell_model extends Common_Model{
  function __construct(){
    parent::__construct("pembelian");
  }
   // series: [{
   //              type: 'column',
   //              name: 'Jane',
   //              data: [3, 2, 1, 3, 4]
   //          }, {
   //              type: 'column',
   //              name: 'John',
   //              data: [2, 3, 5, 7, 6]
   //          }, {
   //              type: 'column',
   //              name: 'Joe',
   //              data: [4, 3, 3, 9, 0]
   //          }, {
   //              type: 'spline',
   //              name: 'Average',
   //              data: [3, 2.67, 3, 6.33, 3.33]
   //          }, {
   //              type: 'pie',
   //              name: 'Total consumption',
   //              data: [{
   //                  name: 'Jane',
   //                  y: 13,
   //                  color: '#4572A7' // Jane's color
   //              }, {
   //                  name: 'John',
   //                  y: 23,
   //                  color: '#AA4643' // John's color
   //              }, {
   //                  name: 'Joe',
   //                  y: 19,
   //                  color: '#89A54E' // Joe's color
   //              }],
   //              center: [100, 80],
   //              size: 100,
   //              showInLegend: false,
   //              dataLabels: {
   //                  enabled: false
   //              }
   //          }]
  public function graph_sell_of_year(){
    $year = date("Y");
    $startMonth = 1;
    $nowMonth = date("m");
    $type_pembayaran = array("paypall","transfer","cod");
    $new = "series: [{";
    
      // $month_active[$i] = $i;
    foreach($type_pembayaran as $tp){
      for($i=$startMonth; $i<=$nowMonth;$i++){
      $data = $this->sell_model->find(array("MONTH(tanggal)"=>$i,"YEAR(tanggal)" => $year,"type_pembayaran"=>$tp),0,-1);
      $dataTypePembayaran[$i][$tp] = count($data);
      }   
    }
      
      // $dataMonth[$i] = count($data);

      // foreach($data as $d){
      //  $dataMonth[$i][] = 
      // }
    // }
    
    echo implode();
    foreach($dataTypePembayaran as $tp){

    }

    return $dataTypePembayaran;

  }
}
?>