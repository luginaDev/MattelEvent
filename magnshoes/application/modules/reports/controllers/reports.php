<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reports extends Backend_Controller {
  function __construct()
    {
      parent::__construct();
      $this->load->model("sells/sell_model","c");
      $this->load->model("sells/detail_sell_model","ds");
      $this->load->model("products/product_model","p");
      $this->load->model("products/detail_product_model","dp");
      $this->load->model("products/daftar_harga_model","dh");
      $this->load->model("members/member_model","m");
      $this->load->model("delivers/deliver_model","dv");
      $this->load->model("vendors/vendor_model","v");
      $this->load->model("fares/fare_model","f");
       $this->load->model("returns/detail_return_model","drt");
        $this->load->model("returns/return_model","rt");
    }

  public function index(){

  }

  public function sell_report(){
  $input = $this->input->post();
  $start_date = date("Y-m-d");
  $end_date = date("Y-m-d");
  $status_pembayaran = "";
  $type_pembayaran = "";
  if(!empty($input)){
    $start_date = $input["start_date"];
    $end_date = $input["end_date"];
    if(!empty($input["status_pembayaran"])){
      $where["status_pembayaran"] = $input["status_pembayaran"];
      $status_pembayaran = $input["status_pembayaran"];
    }

    if(!empty($input["type_pembayaran"])){
      $where["type_pembayaran"] = $input["type_pembayaran"];
      $type_pembayaran = $input["type_pembayaran"];
    }
  }
  $where["date(tanggal) >="] = "$start_date";
  $where["date(tanggal) <="] = "$end_date" ;

  $data[] = $this->c->find($where,0,-1);
  $title = "<center> Laporan penjualan periode ".$start_date." s-d ".$end_date." </center>" ;
  $link_pdf = "<a href='".base_url("reports/sell_report_pdf")."/".$start_date."/".$end_date."/".$status_pembayaran."/".$type_pembayaran."' > [PDF]</a>";
  $this->template
        ->title($title)
        ->set("title_form" ,$title)
        ->set("pdf_link",$link_pdf)
        ->set("start_date",$start_date)
        ->set("end_date",$end_date)
        ->set("status_pembayaran",$status_pembayaran)
        ->set("type_pembayaran",$type_pembayaran)
        ->set("data",$data)
        ->build('reports/sell_report');
  }

  public function sell_report_pdf(){
  $input["start_date"] = $this->uri->segment(3);
    $input["end_date"] = $this->uri->segment(4);
    $input["status_pembayaran"] = $this->uri->segment(5);
    $input["type_pembayaran"] = $this->uri->segment(6);
  if(!empty($input)){
    $start_date = $input["start_date"];
    $end_date = $input["end_date"];
    if(!empty($input["status_pembayaran"])){
      $where["status_pembayaran"] = $input["status_pembayaran"];
      $status_pembayaran = $input["status_pembayaran"];
    }

    if(!empty($input["type_pembayaran"])){
      $where["type_pembayaran"] = $input["type_pembayaran"];
      $type_pembayaran = $input["type_pembayaran"];
    }
  }
  $where["date(tanggal) >="] = "$start_date";
  $where["date(tanggal) <="] = "$end_date" ;

  $datax["rows"] = $this->c->find($where,0,-1);
  $datax["title"] = "Periode :".$input["start_date"]." s/d ".$input["end_date"]." " ;
    $htmlx = $this->load->view("reports/sell_pdf",$datax,true);
    $filename = "Laporan_sell_periode_".$input["start_date"]."s/d".$input["end_date"].".pdf" ;
     $this->pdf($htmlx,$filename);
  }

  public function deliver_reports(){
    $input = $this->input->post();
    $start_date = date("Y-m-d");
    $end_date = date("Y-m-d");
    $status_pembayaran = "";
    $type_pembayaran = "";
    if(!empty($input)){
      $start_date = $input["start_date"];
      $end_date = $input["end_date"];
      if(!empty($input["status_pembayaran"])){
        $where["status_pembayaran"] = $input["status_pembayaran"];
        // $type_pembayaran = $input["type_pembayaran"];
        $status_pembayaran = $input["status_pembayaran"];
      }
    }
    $where["date(tanggal) >="] = "$start_date";
    $where["date(tanggal) <="] = "$end_date" ;
    $data[] = $this->c->find($where,0,-1);
    $title = "laporan pengiriman Periode ".$start_date." s/d ".$end_date." " ;
    $link_pdf = "<a href='".base_url("reports/deliver_reports_pdf")."/".$start_date."/".$end_date."/".$status_pembayaran."' > [PDF]</a>";
    $this->template
        ->title($title)
        ->set("pdf_link",$link_pdf)
        ->set("title_form" ,$title)
        ->set("start_date",$start_date)
        ->set("end_date",$end_date)
        ->set("status_pembayaran",$status_pembayaran)
        ->set("type_pembayaran",$type_pembayaran)
        ->set("data",$data)
        ->build('reports/deliver_reports');
  }

  public function deliver_reports_pdf(){
    $input["start_date"] = $this->uri->segment(3);
    $input["end_date"] = $this->uri->segment(4);
    $input["status_pembayaran"] = $this->uri->segment(5);
    if(!empty($input)){
      $start_date = $input["start_date"];
      $end_date = $input["end_date"];
      if(!empty($input["status_pembayaran"])){
        $where["status_pembayaran"] = $input["status_pembayaran"];
        $status_pembayaran = $input["status_pembayaran"];
      }
    }

    $where["date(tanggal) >="] = "$start_date";
    $where["date(tanggal) <="] = "$end_date" ;
    $datax["rows"] = $this->c->find($where,0,-1);
    $datax["title"] = "Periode :".$input["start_date"]." s/d ".$input["end_date"]." " ;
    $htmlx = $this->load->view("reports/deliver_pdf",$datax,true);
    $filename = "Laporan_deliver_periode_".$input["start_date"]."s/d".$input["end_date"].".pdf" ;
     $this->pdf($htmlx,$filename);
  }

  public function stok_reports(){
    $input = $this->input->post();
    $start_date = date("Y-m-d");
    $end_date = date("Y-m-d");
    $status_pembayaran = "";
    $type_pembayaran = "";
    if(!empty($input)){
      $start_date = $input["start_date"];
      $end_date = $input["end_date"];
      if(!empty($input["type_pembayaran"])){
        $where["type_pembayaran"] = $input["type_pembayaran"];
        $type_pembayaran = $input["type_pembayaran"];
      }
    }

    $where["date(date_created) >="] = "$start_date";
    $where["date(date_created) <="] = "$end_date" ;
  //  $where["status_pembayaran"] = "sudah" ;
    $data[] = $this->dp->find($where,0,-1);
   // $data[] = $this->c->find(array("status_pembayaran"=> "sudah"),0,-1);
    $title = "Laporan stok periode ".$start_date." s/d ".$end_date." " ;
    $this->template
        ->title($title)
        ->set("title_form" ,$title)
        ->set("start_date",$start_date)
        ->set("end_date",$end_date)
        ->set("status_pembayaran",$status_pembayaran)
        ->set("type_pembayaran",$type_pembayaran)
        ->set("data",$data)
        ->build('reports/stok_reports');
  }

  public function return_reports(){
    $input = $this->input->post();
    $start_date = date("Y-m-d");
    $end_date = date("Y-m-d");
    $status_pembayaran = "";
    $type_pembayaran = "";
    if(!empty($input)){
      $start_date = $input["start_date"];
      $end_date = $input["end_date"];
      if(!empty($input["type_pembayaran"])){
        $where["type_pembayaran"] = $input["type_pembayaran"];
        $type_pembayaran = $input["type_pembayaran"];
      }
    }

    $where["date(tanggal_retur) >="] = "$start_date";
    $where["date(tanggal_retur) <="] = "$end_date" ;
    $data[] = $this->rt->find($where,0,-1);
    $title = "Laporan retur periode ".$start_date." s/d ".$end_date." " ;
    $link_pdf = "<a href='".base_url("reports/return_reports_pdf")."/".$start_date."/".$end_date."/".$type_pembayaran."' > [PDF]</a>";
    $this->template
        ->title($title)
        ->set("pdf_link",$link_pdf)
        ->set("title_form" ,$title)
        ->set("start_date",$start_date)
        ->set("end_date",$end_date)
        ->set("status_pembayaran",$status_pembayaran)
        ->set("type_pembayaran",$type_pembayaran)
        ->set("data",$data)
        ->build('reports/return_reports');
  }

  public function return_reports_pdf(){
    $input["start_date"] = $this->uri->segment(3);
    $input["end_date"] = $this->uri->segment(4);
    $input["type_pembayaran"] = $this->uri->segment(5);
    if(!empty($input)){
      $start_date = $input["start_date"];
      $end_date = $input["end_date"];
      if(!empty($input["type_pembayaran"])){
        $where["type_pembayaran"] = $input["type_pembayaran"];
        $type_pembayaran = $input["type_pembayaran"];
      }
    }

    $where["date(tanggal_retur) >="] = "$start_date";
    $where["date(tanggal_retur) <="] = "$end_date" ;
    $datax["rows"] = $this->rt->find($where,0,-1);
    $datax["title"] = "periode ".$input["start_date"]." s/d ".$input["end_date"]." " ;
    $htmlx = $this->load->view("reports/return_pdf",$datax,true);
    $filename = "Laporan_retur_periode_".$input["start_date"]."s/d".$input["end_date"].".pdf" ;
     $this->pdf($htmlx,$filename);
  }
 

  public function pdf($html,$filename){
    $this->load->helper(array('dompdf', 'file'));
     pdf_create($html,$filename);
  }

  public function test_pdf(){
    require_once("dompdf/dompdf_config.inc.php");

    $html =
      '<html><body>'.
      '<p>Put your html here, or generate it with your favourite '.
      'templating system.</p>'.
      '</body></html>';

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("sample.pdf");

  }
}
