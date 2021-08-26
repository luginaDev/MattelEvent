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

  public function  json_agendas(){
    $year = date('Y');
    $month = date('m');
    $rows=$this->a->find(array('MONTH(agendastime)' => $month, 'YEAR(agendastime)' => $year),0,-1,'agendastime desc');
    foreach($rows as $r){
      $data[] = array(
        'id' => $r->id,
        'title' =>  $r->intitle,
        'start' => unix_to_human(strtotime($r->agendastime)) ,
        'url' =>  $r->venue,
        'allDay' => false
        );
    }
    echo json_encode($data);
  }
  
  private function prepared_index(){
    $this->load->model('products/product_model','p');
    $this->load->model('products/detail_product_model','dp');
    $data = $this->dp->find(array("stok >"=>0),0,-1);
    $stok_p = 0;
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
    $this->template
      ->set_layout('default')
      ->set_breadcrumb("dashboard","#")
      ->title('Halaman Administrator || Dasboard')
      ->set('content_title',"Dasboard Manajemen Sistem")
      ->set('nama_stock',implode(",",$nama_stock))
      ->set('category_stock',$category_data)
      ->build('backend/dasboard'); 
    
  }

  private function prepared_model(){
    $this->load->model('pages/pages_model','p');
    $this->load->model('pages/picture_model','pc');
    $this->load->model('pages/location_model','l');
  }

}
