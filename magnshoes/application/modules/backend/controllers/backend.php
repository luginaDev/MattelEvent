<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
    }

  public function index(){
    $this->dashboard();
  }
  



  public function dashboard(){
    $this->prepared_index();
  }

  public function myprofile(){
    $this->template
      ->set_layout('default')
      ->set_breadcrumb("Dasboard",base_url()."backend/dashboard")
      ->set_breadcrumb("Profile",base_url()."backend/myprofile")
      ->title('Halaman Profile ')
      ->build('backend/myprofile');
  }

  // public function  json_agendas(){
  //   $year = date('Y');
  //   $month = date('m');
  //   $rows=$this->a->find(array('MONTH(agendastime)' => $month, 'YEAR(agendastime)' => $year),0,-1,'agendastime desc');
  //   foreach($rows as $r){
  //     $data[] = array(
  //       'id' => $r->id,
  //       'title' =>  $r->intitle,
  //       'start' => unix_to_human(strtotime($r->agendastime)) ,
  //       'url' =>  $r->venue,
  //       'allDay' => false
  //       );
  //   }
  //   echo json_encode($data);
  // }
  
  private function prepared_index(){
    $this->load->model('products/product_model','p');
    $this->load->model('products/detail_product_model','dp');
    $this->load->model('sells/sell_model','s');
    $this->load->model('returns/return_model','rt');
    
    // $data = $this->s->graph_sell_of_year();
    // print_r($data);die;
    $data = $this->dp->find(array("stok >"=>0),0,-1);
    $stok_p = 0;
    $name_stock = array();
    $nama_stock = array();
    $detail_category = array();
    $detail_data = array();
    // $detail_category = array();
    foreach($data as $d){
      $pr = $this->p->find_entity_by("kode" ,$d->produk_kode);
      $category_stock[$d->produk_kode] = (empty($category_stock[$d->produk_kode]) ? 0:$category_stock[$d->produk_kode]) + $d->stok ;
      $name_stock[$d->produk_kode] = $pr->nama ;
      $nama_stock[] = "'".$d->produk_kode."'";
      $detail_category[$d->produk_kode][$d->id] = $d->nama;
      $detail_data[$d->produk_kode][$d->id] =  $d->stok ;
    }
    $category_data = "";
    $i =1;
    foreach($category_stock as $ind => $dd){
      $category_data .="{ y:$dd ,color: colors[$i],drilldown: {";
      $category_data .="name: '".$name_stock[$ind]."',";
      $temp_cat = array();
      foreach($detail_category[$ind] as $det){
        $temp_cat[] = "'".$det."'";
      }
      $temp_data = array();
      foreach($detail_data[$ind] as $dat){
        $temp_data[] = $dat;
      }
      $category_data .="categories: [".implode(",",$temp_cat)."],";
      $category_data .="data: [".implode(",",$temp_data)."],";
      $category_data .= "color: colors[$i]";
      $category_data .="}},";

      $i++;
    }
    $data["category_stock"] = $category_data;

    $name_month =array("","Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agus","Sept","Okt","Nov","des");
    $monthly = array();
    $monthly_retur = array();
    $ttlr = 0;
    for($i=1;$i <= date("m");$i++){
      $bulan[] = "'".$name_month[$i]."'";
      $jml = $this->s->find(array("YEAR(tanggal)" => date("Y"), "MONTH(tanggal)" => $i),0,-1);

      $ttl = 0;
      foreach($jml as $j ){
        $ttl +=$j->total; 
      }

      $retur = $this->rt->find(array("YEAR(tanggal_retur)" => date("Y"), "MONTH(tanggal_retur)" => $i),0,-1);

      $ttlr = 0;
      if(count($retur)>0){
        foreach($retur as $rj){
          $dd = $this->s->find_entity_by_id($rj->pembelian_id);
          // print_r($dd);
          $ttlr = $ttlr + intval($dd->total); 
        }
      }

      $monthly[] = ($ttl==0? 0:$ttl);
      $monthly_retur[] = ($ttlr==0? 0:$ttlr);
    }
    $month_sell = implode(",",$bulan);
    $data_monthly[] = "{ name:'Penjualan'  , data :[".implode(",",$monthly)."] }";
    $data_monthly[] = "{ name:'Retur'  , data :[".implode(",",$monthly_retur)."] }";

    $this->template
      ->set_layout('default')
      ->set_breadcrumb("dashboard","#")
      ->title('Halaman Administrator || Dasboard')
      ->set('content_title',"Dasboard Manajemen Sistem")
      ->set('nama_stock',implode(",",$nama_stock))
      ->set('category_stock',$category_data)
      ->set('month_sell',$month_sell)
      ->set('data_monthly',implode(",",$data_monthly))
      ->build('backend/dasboard'); 
    
  }

  public function graph_pertumbuhan_penjualan(){
    
    for($i=1;$i<=date("m");$i++){

    }

  }

  private function prepared_model(){
    $this->load->model('pages/pages_model','p');
    $this->load->model('pages/picture_model','pc');
    $this->load->model('pages/location_model','l');
  }

}
