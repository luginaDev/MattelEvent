<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class careerpages extends Backend_Controller {
  function __construct()
    {
      parent::__construct();
      $this->load->helper('date');
    }
  
  public function create(){
    $this->validation();
    if ($this->form_validation->run() == TRUE)
    {
      $this->prepared_model();
      $data = array(
         'name' => $this->input->post('title') ,
         'title' => $this->input->post('title') ,
         'location' => $this->input->post('location') ,
         'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
         'end_date' => date('Y-m-d',strtotime($this->input->post('end_date'))),
         'requirement'  => $this->input->post('requirement')
      );
      $this->cp->save($data);
      $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
    }
   redirect('careerpages');
  }

  public function delete($id){
    $this->prepared_model();
    if(!empty($id)){
      $this->cp->delete(array('id' => $id));
      $this->session->set_flashdata('success', 'Data Berhasil dihapus');
    }
    redirect('careerpages');
  }

  public function edit($id){
    $this->prepared_model();
    $this->validation();
    if ($this->form_validation->run() == TRUE)
    {
       $data = array(
         'id' => $id,
         'name' => $this->input->post('title') ,
         'title' => $this->input->post('title') ,
         'location' => $this->input->post('location') ,
         'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
         'end_date' => date('Y-m-d',strtotime($this->input->post('end_date'))),
         'requirement'  => $this->input->post('requirement')
      );
      $this->cp->update($data);
      $this->session->set_flashdata('success', 'Data Berhasil Di Update');
      redirect('careerpages');
    }else{
      $data['data'] = $this->cp->find_entity_by_id($id);
      $this->template
        ->set_layout('default')
        ->set_breadcrumb("Pages","#")
        ->set_breadcrumb("Career Pages",base_url()."careerpages")
        ->set_breadcrumb("Edit",base_url()."careerpages/edit/".$id)
        ->title('Halaman Administrator ||careerpages')
        ->set('content_title',"Career Pages")
        ->set('rows',$data)
        ->build('careerpages/edit');
    }
    
    
    
  }

  public function index(){
  	$this->prepared_model();
  	$data = $this->cp->find(array(),0,-1);
  	$this->template
        ->set_layout('default')
        ->set_breadcrumb("Pages","#")
        ->set_breadcrumb("Career Pages",base_url()."careerpages")
        ->title('Halaman Administrator ||careerpages')
        ->set('content_title',"Career Pages")
        ->set('rows',$data)
        ->build('careerpages/index'); 
  }
  
  private function prepared_model(){
    $this->load->model('careerpages/careerpages_model','cp');
  }

  private function validation(){
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('location', 'Location', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'end Date', 'required');
    $this->form_validation->set_rules('requirement', 'Requirement', 'required');
  }
}