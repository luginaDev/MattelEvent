<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_produk_model extends Common_Model{
  function __construct(){
    parent::__construct("detail_produk");
  }
function find_new_product(){
	return $this->db->query("SELECT a.nama, a.id, a.gambar, a.status_produk, a.ukuran, a.stok, a.warna, 
							(SELECT b.harga
FROM daftar_harga b
WHERE b.detail_produk_id = a.id
ORDER BY b.date_created DESC
LIMIT 1 ) AS harga
							FROM detail_produk a
							ORDER BY a.date_created DESC 
							LIMIT 10")->result();
}
}