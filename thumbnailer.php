<?php
  if (!(isset($_GET['thumbnailer'])&&$_GET['viewportwidth'])){
	  die();
  }
  
  $file = $_GET['thumbnailer'];
  $viewportwidth= $_GET['viewportwidth'];
  
  // 
  $file = str_replace('./', '', $file);
  
  
  if (file_exists('./'.$file) && mime_content_type('./'.$file)==='image/jpeg'){   
  
  header('Content-type: image/jpeg'); 
  list($width, $height) = getimagesize($file);
  $size=intval($viewportwidth)/$width; 
    $modwidth = $width * $size;
      $modheight = $height * $size;   
        $tn= imagecreatetruecolor($modwidth, $modheight); 
         $source = imagecreatefromjpeg($file);   
         imagecopyresized($tn, $source, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);
           imagejpeg($tn); 
           
	   }
 ?>
