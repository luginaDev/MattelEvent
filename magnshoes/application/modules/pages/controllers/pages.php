<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends Backend_Controller {
  function __construct()
    {
      parent::__construct();
        
    }
  
  public function addlocation($id){
    $this->prepared_model();
    $request = $this->input->post();
    $this->l->save_or_update($request);
    $this->session->set_flashdata('success', 'Data Location berhasil Ditambahkan');
    redirect("pages/index/".$id."");


  }

  public function create(){
    $this->prepared_model();
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('incontent', 'Content', 'required');
    $this->form_validation->set_rules('intitle', 'Title', 'required');
    // $this->form_validation->set_rules('encontent', 'Content', 'required');
    // $this->form_validation->set_rules('entitle', 'Title', 'required');
    $id = $this->input->post("id");
    if ($this->form_validation->run() == TRUE)
    {
      $this->p->save_pages($this->input->post());
    }else{
      $this->session->set_flashdata('error', 'Data Picture Gagal Di tambahkan');

    }
    $data['row'] = $this->p->find_entity_by_id($id);
    redirect("pages/index/".$data['row']->name."");
  } 

  public function delete($id , $id_page){
    $this->prepared_model();
    if(!empty($id) and !empty($id_page)){
      if ( $this->pc->destroy(array("id"=>$id)) ){
        $this->session->set_flashdata('success', 'Data Picture berhasil dihapus');
      }else{
        $this->session->set_flashdata('error', 'Data Picture gagal dihapus');
      }

      redirect("pages/index/".$id_page);
    }
  }
  
  public function index(){
    $this->prepared_index();
  }

  private function prepared_index(){
    $this->prepared_model();
    if($this->uri->segment(3)!=""){
      $id = $this->uri->segment(3);
      $data['row'] = $this->p->find_entity_by_name($id);
      $data['img'] = $this->pc->find(array('pages_id' => $data['row']->id),0,-1);
      // $data['loc'] = $this->l->find(array('pages_id' => $data['row']->id),0,-1);
      
      $this->template
        ->set_layout('default')
        ->set_breadcrumb("Pages","#")
        ->set_breadcrumb($data['row']->intitle,base_url()."pages/".$id."")
        ->title('Halaman Administrator ||'.$id.'')
        ->set('content_title',$data['row']->intitle)
        ->set('data',$data)
        ->build('pages/index'); 
    } 
  }

  private function prepared_model(){
    $this->load->model('pages/pages_model','p');
    $this->load->model('pages/picture_model','pc');
    // $this->load->model('pages/location_model','l');
  }

  }