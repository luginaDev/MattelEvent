<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_Model extends CI_Model{

  private $table_name;

  public function __construct($table_name){
    parent::__construct();
    $this->table_name = $table_name;
  }


  public function count($where = array()){
    $this->db->where($where);
    $this->db->from($this->table_name);
    return $this->db->count_all_results();
  }

  public function delete($data = array()){
    $this->db->delete($this->table_name, $data);
  }

  public function destroy($data){
    $result= $this->db->delete($this->table_name,$data); 
    if($result){
      return true;
    }else{
      return false;
    }
  }

  public function find($where = array(), $offset = 0, $limit = -1, $order_by = "", $like = array()){
    if($order_by != "")
      $this->db->order_by($order_by);
      
    foreach($like as $k => $v){
      $this->db->like($k, $v);
    }

    if($limit == -1)
    return $this->db->get_where($this->table_name, $where)->result();
    else
    return $this->db->get_where($this->table_name, $where, $limit, $offset)->result();
  }

  public function find_entity_by_id($id = 0){
    return $this->db->get_where($this->table_name, array("id" => $id))->row();
  }

  public function find_entity_by_name($name = 0){
    return $this->db->get_where($this->table_name, array("name" => $name))->row();
  }

  public function find_entity_by($attribute ,$name = 0){
    return $this->db->get_where($this->table_name, array($attribute => $name))->row();
  }

  public function find_by_join($table_alias,$select ,$where = array() , $table_join = array()){
    $this->db->select($select);
    $this->db->from($this->table_name." as $table_alias");
    // $table_join = array(
    //                 'table 1' => 'comments.id = blogs.id',
    //                 'table 2' => 'comments.id = blogs.id and table = a',
    //                 'table 3' => 'comments.id = blogs.id and table = a' 
    //                 );
    if(!empty($table_join)){
      foreach($table_join as $table_name => $attribute_join){
         $this->db->join(''.$table_name.'', ''.$attribute_join.'');
      }
    }
    // $where = array('name' => $name, 'title' => $title, 'status' => $status);
    if(!empty($where)){
      $this->db->where($where);  
    }
    return $this->db->get()->result();
    
  }

  public function find_by_sql($sql){
    return $this->db->query("".$sql."")->result();
  }

  public function save_or_update($data = array()){
    if(!empty($data["id"])){
      $this->db->where("id", $data["id"]);
      if($this->db->update($this->table_name, $data)){
        return true;
      }else{
        return false;
      }
    }else{
      if($this->db->insert($this->table_name, $data)){
        return true;
      }else{
        return false;
      }
    }
  }

  public function save($data = array()){
    $result=$this->db->insert($this->table_name, $data);
    if($result){
      return true;
    }else{
      return false;
    }
  }

  public function update($data = array()){
    $this->db->where("id", $data["id"]);
    if($this->db->update($this->table_name, $data)){
      return true;
    }else{
      return false;
    }
  }
  
  public function update_attribute($id,$data){
    $this->db->where($id);
    $result=$this->db->update($this->table_name,$data);
    if($result){
      return true;
    }else{
      return false;
    }
  }

    
  

}
?>