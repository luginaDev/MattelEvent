<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Uploads extends MX_Controller
{

  function __construct()
  {
      parent::__construct();
  }

  public function index(){
    $this->load->view('upload_form');
  }

  public function do_upload(){
    if (!empty($_FILES)) {
      $tempFile = $_FILES['Filedata']['tmp_name'];
      $targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
      $targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
      
      // $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
      // $fileTypes  = str_replace(';','|',$fileTypes);
      // $typesArray = split('\|',$fileTypes);
      // $fileParts  = pathinfo($_FILES['Filedata']['name']);
      
      // if (in_array($fileParts['extension'],$typesArray)) {
        // Uncomment the following line if you want to make the directory if it doesn't exist
        // mkdir(str_replace('//','/',$targetPath), 0755, true);
        
        move_uploaded_file($tempFile,$targetFile);
        echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
      // } else {
      //  echo 'Invalid file type.';
      // }
    }

    /*  $imgsize = getimagesize($targetFile);
      switch(strtolower(substr($targetFile, -3))){
          case "jpg":
              $image = imagecreatefromjpeg($targetFile);    
          break;
          case "png":
              $image = imagecreatefrompng($targetFile);
          break;
          case "gif":
              $image = imagecreatefromgif($targetFile);
          break;
          default:
              exit;
          break;
      }

      $width = 80; //New width of image    
      $height = $imgsize[1]/$imgsize[0]*$width; //This maintains proportions

      $src_w = $imgsize[0];
      $src_h = $imgsize[1];
          

      $picture = imagecreatetruecolor($width, $height);
      imagealphablending($picture, false);
      imagesavealpha($picture, true);
      $bool = imagecopyresampled($picture, $image, 0, 0, 0, 0, $width, $height, $src_w, $src_h); 

      if($bool){
          switch(strtolower(substr($targetFile, -3))){
              case "jpg":
                  header("Content-Type: image/jpeg");
                  $bool2 = imagejpeg($picture,$targetPath."thumbs/".$_FILES['Filedata']['name'],80);
              break;
              case "png":
                  header("Content-Type: image/png");
                  imagepng($picture,$targetPath."thumbs/".$_FILES['Filedata']['name']);
              break;
              case "gif":
                  header("Content-Type: image/gif");
                  imagegif($picture,$targetPath."thumbs/".$_FILES['Filedata']['name']);
              break;
          }
      }*/
      
  }
 
  public function do_upload_attachment(){
    if (!empty($_FILES)) {
      $tempFile = $_FILES['Filedata']['tmp_name'];
      $targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
      $targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
      
      // $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
      // $fileTypes  = str_replace(';','|',$fileTypes);
      // $typesArray = split('\|',$fileTypes);
      // $fileParts  = pathinfo($_FILES['Filedata']['name']);
      
      // if (in_array($fileParts['extension'],$typesArray)) {
        // Uncomment the following line if you want to make the directory if it doesn't exist
        // mkdir(str_replace('//','/',$targetPath), 0755, true);
        
        move_uploaded_file($tempFile,$targetFile);
        echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
      // } else {
      //  echo 'Invalid file type.';
      // }
    }
  }

}