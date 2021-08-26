<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_config extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("web_config/Web_config_model","wc");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->wc->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Group berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Group Gagal Dihapus');
        }
        redirect("web_config");
      }
      redirect("web_config");
    }

    public function index(){
      $data[] = $this->wc->find(array(),0,-1);
      $this->template
        ->title('Halaman Administrator | web_config')
        ->set("data",$data)
        ->build('web_config/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->wc->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Group Berhasil diperbaharui/ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Group Gagal diperbaharui/ditambahkan');
        }
        redirect("web_config");
      }
      redirect("web_config");
    }

    public function backup(){
    $this->load->dbutil();
    $backup =& $this->dbutil->backup();
    $this->load->helper('file');
    write_file('/path/to/mybackup.gz', $backup);
    $this->load->helper('download');
    force_download('magnshoes'.date("d_M_y_H_i_s").'.gz', $backup);
    }


}
?>
