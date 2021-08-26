<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Return_model extends Common_Model{
  function __construct(){
    parent::__construct("retur");
  }
  
  public function create_retur($data){
  	$i_retur = array(
  		'pembelian_id' => $data["pembelian_id"],
  		'tanggal_retur'	=> date("Y-m-d H:i:s")
  	);
  	$this->db->where("pembelian_id",$data["pembelian_id"]);
  	$find = $this->db->get("retur")->result();
  	if(count($find) > 0){
      $data["id"] = $data["pembelian_id"];
      $this->create_detail_retur($data);
  	}else{
  		$this->db->insert("retur",$i_retur);
  		$data["id"] = $data["pembelian_id"];
  		$this->create_detail_retur($data);
  	}

  }

  public function create_detail_retur($data){
    for ($i=0; $i < $data["jumlah"]; $i++) { 
      $i_detail = array(
        'retur_pembelian_id'  => $data["id"] ,
        'detail_pembelian_id' => $data["detail_pembelian_id"],
        'retur_detail_produk_id' => $data["detail_produk_id"],
        // 'jumlah'  => $data["jumlah"],
        'jumlah'  => 1,
        'keterangan_retur' => $data["keterangan_retur"][$i],
        'gambar'  => $data["gambar"][$i],
        'status'  => "baru"
        );
    $this->db->insert("detail_retur",$i_detail);
    }
    
    return true;
  }

  public function show_retur($pembelian_id){
    $harga = $this->db->query("select a.jumlah , b.daftar_harga_id , c.harga , a.jumlah * c.harga
                        from detail_retur a
                        join detail_pembelian b on b.id = a.detail_pembelian_id
                        join daftar_harga c on c.id = b.daftar_harga_id 
                        where a.detail_pembelian_id = '".$pembelian_id."' ")->row();
    $data = $this->db->query("");

  }
}
?>