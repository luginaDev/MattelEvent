<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages_model extends Common_Model{
  function __construct(){
    parent::__construct("pages");
  }

  function save_pages($data){
    $pisah = explode(" ",$data['title']);
    $name = implode("",$pisah);
  	$pages=array(
        'intitle' => $data['intitle'],
        'incontent' => $data['incontent'],
        'entitle' => $data['entitle'],
        'encontent' => $data['encontent'],
        'category' => $data['category']        
     );
     $this->db->where('id',$data['id']);
     if($this->db->update('pages', $pages)){
      $this->db->where('pages_id',$data['id']);
      $del = $this->db->delete('pictures'); 
      if(!empty($data['inptitle'])) {
        $count=count($data['inptitle']);
        for($i=0;$i<$count;$i++){
          $gallery[]=array(
  	        'name'  => $data['ptitle'][$i],
  	        'intitle'   => $data['inptitle'][$i],
  	        'indescription' => $data['inpdescription'][$i],
            'entitle'   => $data['enptitle'][$i],
            'endescription' => $data['enpdescription'][$i],
  	        'pages_id' => $data['id'],
  	        'image' => $data['pimages'][$i]	        
          );
        }
        if($this->db->insert_batch('pictures', $gallery)){
        	return true;
        }
      }
      return false;
     }
     return false;
  }
}
?>