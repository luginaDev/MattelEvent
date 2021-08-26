<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Product_model extends Common_Model{
  function __construct(){
    parent::__construct("produk");
  }
 
  public function create_product($data = array()){
    $data["users_id"] = 1;
    if(!empty($data)){
      if($this->cek_kode_produk($data["kode"])){
        if($this->db->insert("produk",$data)){
          return "success|data Produk berhasil disimpan";
        }else{
          return "error|data Produk gagal disimpan";
        }
      }else{
        return "error | kode produk telah tersedia";
      }
    }
  }
 
  public function  create_detail_product($data = array()){
    if(!empty($data)){
      if($this->cek_kode_produk($data["produk_kode"])==false){
        $detail = array(
         "gambar" => $data["gambar"],
         "nama" => $data["nama"] ,
         "produk_kode" => $data["produk_kode"],
         "warna" => $data["warna"],
         "stok" => $data["stok"] ,
         "status_produk" => $data["status_produk"],
         "ukuran" => $data["ukuran"],
         "berat" => $data["berat"]
        );
        if($this->db->insert("detail_produk",$detail)){
          $harga = array(
            "detail_produk_id"  => $this->db->insert_id(),
            "harga" => $data["harga"],
            "date_created"  => date("Y-m-d H:i:s")
            );
          $this->db->insert("daftar_harga",$harga);
          return "success|data Produk berhasil disimpan";
        }else{
          return "error|data Produk gagal disimpan";
        }
      }else{
        return "error | kode produk telah tersedia";
      }
    }
  }
 
  public function update_product($data){
    $this->db->where("kode",$data["kode"]);
    if($this->db->update("produk",$data)){
      return "success|data Produk Berhasil DiUpdate";
    }else{
      return "error|data Produk gagal DiUpdate";
    }
  }
 
  public function update_detail_product($data){
    if(!empty($data)){
      // if($this->cek_kode_produk($data["produk_kode"])==false){
        $detail = array(
         "gambar" => $data["gambar"],
         "nama" => $data["nama"] ,
         "produk_kode" => $data["produk_kode"],
         "warna" => $data["warna"],
         "stok" => $data["stok"] ,
         "status_produk" => $data["status_produk"],
         "ukuran" => $data["ukuran"],
         "berat" => $data["berat"]
        );
        $this->db->where("id",$data["id"]);
        if($this->db->update("detail_produk",$detail)){
          if($data["harga"]!=$data["harga_lama"]){
            $harga = array(
            "detail_produk_id"  => $data["id"],
            "harga" => $data["harga"],
            "date_updated"  => date("Y-m-d H:i:s")
            );
          $this->db->insert("daftar_harga",$harga); 
          }
          return "success|data Detail Produk berhasil disimpan";
        }else{
          return "error|data Detail Produk gagal disimpan";
        }
      // }else{
      //   return "error | kode produk telah tersedia";
      // }
    }
  }
 
  public function cek_kode_produk($kode){
    $data = $this->db->where("kode",$kode)->get("produk")->row();
    if(!empty($data)){
      return false;
    }else{
      return true;
    }
  }
}
?>