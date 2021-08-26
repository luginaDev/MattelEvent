<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("products/product_model","p");
        $this->load->model("categories/category_model","c");
        $this->load->model("products/detail_product_model","dp");
        $this->load->model("products/daftar_harga_model","dh");
    }
  

  public function add(){
    $data[] = $this->c->find(array(),0,-1); 
    $this->template
      ->title('Halaman Administrator | Product')
      ->set("title_form" ,"Tambah Produk ")
      ->set("data",$data)
      ->build('products/add');
  }

  public function add_detail($id){
    if(!empty($id)){
      $data[] = $this->p->find_entity_by("kode",$id);
      $this->template
      ->title('Halaman Administrator | Product')
      ->set("title_form" ,"Detail Produk ")
      ->set("data",$data)
      ->build('products/add_detail');
    }else{
      $this->session->set_flashdata('error', "Kode Salah input");
      redirect("products/add");
    }
  }

  public function create_product(){
    $data = $this->input->post();
    $response = $this->p->create_product($data);
    $explode = explode("|",$response);
    if($explode[0]=="success"){
      $this->session->set_flashdata('success', $explode[1]);
      redirect("products/add_detail/".$data["kode"]);
    }else{
      $this->session->set_flashdata('error', $explode[1]);
      redirect("products/add");
    }
  }

  public function create_detail_product(){
    $data = $this->input->post();
    $response = $this->p->create_detail_product($data);
    $explode = explode("|",$response);
    if($explode[0]=="success"){
      $this->session->set_flashdata('success', $explode[1]);
      redirect("products/add_detail/".$data["produk_kode"]);
    }else{
      $this->session->set_flashdata('error', $explode[1]);
      redirect("products/add_detail".$data["produk_kode"]);
    }
  }

  public function delete($id){
    
  }

  public function delete_detail($kode,$id){
    if(!empty($id)){
      $this->dp->delete(array("id" => $id));
      $this->session->set_flashdata('success', "Data Detail Produk Berhasil Hapus");
      redirect("products/show/".$kode);
    }else{
      $this->session->set_flashdata('error', "Kode Salah input");
      redirect("products/show/".$kode);
    }
  }

  public function edit($id){
    if(!empty($id)){
      $data = array(
         "kategori" => $this->c->find(array(),0,-1),
         "product"  => $this->p->find_entity_by("kode",$id)
      );
      $this->template
        ->title('Halaman Administrator | Product')
        ->set("title_form" ,"Edit Produk ")
        ->set("data",$data)
        ->build('products/edit');
    }else{
      $this->session->set_flashdata('error', "Kode Salah input");
      redirect("products/add");
    }
  }

  public function edit_detail($id){
    if(!empty($id)){
      $data[] = $this->dp->find_entity_by("id",$id);
      $this->template
      ->title('Halaman Administrator | Product')
      ->set("title_form" ,"Edit Detail Produk ")
      ->set("data",$data)
      ->build('products/edit_detail');
    }else{
      $this->session->set_flashdata('error', "Kode Salah input");
      redirect("products/add");
    }
  }

  public function index(){
    $data[] = $this->p->find(array(),0,-1); 
    $this->template
      ->title('Halaman Administrator | Product')
      ->set("title_form" ,"Produk ")
      ->set("data",$data)
      ->build('products/index');
  }
  
  public function show($id){
    if(!empty($id)){
      $data = array(
         "kategori" => $this->c->find(array(),0,-1),
         "detail_product"  => $this->dp->find(array("produk_kode"=>$id),0,-1)
      );
      $this->template
        ->title('Halaman Administrator | Product')
        ->set("title_form" ,"Edit Detail Produk ")
        ->set("data",$data)
        ->build('products/show');
    }else{
      $this->session->set_flashdata('error', "Kode Salah input");
      redirect("products/index");
    }
  }

  public function update_product(){
    $data = $this->input->post();
    $response = $this->p->update_product($data);
    $explode = explode("|",$response);
    if($explode[0]=="success"){
      $this->session->set_flashdata('success', $explode[1]);
      redirect("products/");
    }else{
      $this->session->set_flashdata('error', $explode[1]);
      redirect("products/add");
    }
  }

  public function update_detail_product(){
    $data = $this->input->post();
    $response = $this->p->update_detail_product($data);
    $explode = explode("|",$response);
    if($explode[0]=="success"){
      $this->session->set_flashdata('success', $explode[1]);
      redirect("products/show/".$data['produk_kode']);
    }else{
      $this->session->set_flashdata('error', $explode[1]);
      redirect("products/edit_detail/".$data['produk_kode']);
    }
  }

  // public function create_products(){
  //   $this->load->library('upload');
  //   $data = $this->input->post();
  //   echo "<pre>";
  //   print_r($_FILES);
  //   echo "<hr/> jml file ".count($_FILES["frm-detail_file_upload_detail_product"]["name"]);
  //    #upload picture
  //   // if(count($_FILES)>0){

  //    for($i=0 ; $i<count($_FILES["frm-detail_file_upload_detail_product"]["name"]) ; $i++){
      
  //     if (is_uploaded_file($_FILES['frm-detail_file_upload_detail_product']['tmp_name'][$i])) {
  //        echo "File ". $_FILES['frm-detail_file_upload_detail_product']['name'][$i] ." uploaded successfully.\n";
  //        echo "Displaying contents\n";
  //        readfile($_FILES['frm-detail_file_upload_detail_product']['tmp_name'][$i]);
  //     }else{
  //        echo "Possible file upload attack: ";
  //        echo "filename '". $_FILES['frm-detail_file_upload_detail_product']['tmp_name'][$i] . "'.";
  //     }
  //     // $_FILES["frm-detail_file_upload_detail_product"]["name"] = $_FILES["filename"]["name"][$i];

  //     //   $_FILES["frm-detail_file_upload_detail_product"]["type"] = $_FILES["filename"]["type"][$i];

  //     //   $_FILES["frm-detail_file_upload_detail_product"]["tmp_name"] = $_FILES["filename"][$i];

  //     //   $_FILES["frm-detail_file_upload_detail_product"]["error"] = $_FILES["filename"]["error"][$i];

  //     //   $_FILES["frm-detail_file_upload_detail_product"]["size"] = $_FILES["filename"]["size"][$i];
        
        
  //     //   $realpath = $_SERVER["DOCUMENT_ROOT"] . "/" . $this->config->item("app_folder") . "/assets/uploads/products/details/";
          
  //     //     $config['upload_path'] = $realpath;
  //     //     $config['allowed_types'] = '*';
  //     //     $config['max_size'] = '1000';
  //     //     $config['max_width'] = '1000';
  //     //     $config['max_height'] = '1240';
          
  //     //    // $this->load->library('upload', $config);
  //     //   $this->upload->initialize($config);

  //     //   if(!$this->upload->do_upload()){
  //     //     $error = array('error' => $this->upload->display_errors());
  //     //     print_r($error);
  //     //       echo "$i = error <hr>";
  //     //     }else{
  //     //      echo "$i = sukses <hr>";
  //     //     }
        
  //       //   // $this->upload->do_upload();
  //       //   // $arr = $this->upload->data();
  //       //   // $uploaded_file_name = $arr["file_name"];
  //       //   // $data_to_save["picture"] = $uploaded_file_name;
  //       //   $_POST["picture"] = $uploaded_file_name;
  //       // }

  //     }
  //   // }
  //   // if($_FILES["frm-detail_file_upload_detail_product"]["name"] != ""){
  //   //   $realpath = $_SERVER["DOCUMENT_ROOT"] . "/" . $this->config->item("app_folder") . "/assets/upload/products/details/";
      
  //   //   $config['upload_path'] = $realpath;
  //   //   $config['allowed_types'] = '*';
  //   //   $config['max_size'] = '1000';
  //   //   $config['max_width'] = '1000';
  //   //   $config['max_height'] = '1240';
      
  //   //    $this->load->library('upload', $config);
  //   //   // if ( ! $this->upload->do_upload())
  //   //   // {
  //   //   //   $error = array('error' => $this->upload->display_errors());
  //   //   //   print_r($error);
  //   //   //   // $this->load->view('upload_form', $error);
  //   //   // } 
  //   //   // else
  //   //   // {
  //   //   //   $data = array('upload_data' => $this->upload->data());
        
  //   //   //   $this->load->view('upload_success', $data);
  //   //   // }

  //   //   $this->upload->do_upload();
  //   //    $arr = $this->upload->data();
  //   //   // $uploaded_file_name = $arr["file_name"];
  //   //   // $data_to_save["picture"] = $uploaded_file_name;
  //   //   $_POST["picture"] = $uploaded_file_name;
  //   // }

    
  //   // print_r($_FILES);
  //   // echo "<hr/>";
  //   // print_r($data);

  // }

  

 }
