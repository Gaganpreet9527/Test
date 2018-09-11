
<?php
include 'config.php';
//echo "abc";
if( isset($_FILES['image']["type"] ) ) {
//echo "asdf";
  include 'libs/img_upload_resize_crop.php';
   $your_image = new _image;
  
  
  
  
  //To Upload
  $your_image->uploadTo = 'uploads/';
  $upload = $your_image->upload($_FILES['image']);
  //echo "<div>3" . $upload . "</div>";
   
   //To Resize
  /*$your_image->newPath = 'thumbs/';
  $your_image->newWidth = 600;
  $your_image->newHeight = 248;
  $resized = $your_image->resize();*/
  //echo "<div>2" . $resized . "</div>";
  
  $your_image->newPath = 'thumbs/';
    $your_image->newWidth = 1920;
    $your_image->newHeight = 800;
  $resized = $your_image->resize();
    //  echo "<div>2" . $resized . "</div>";  


  //To Crop
  $width = "220";
  $height = "220";
  /*$fromX = "0";
  $fromY = "0";*/
  $your_image->newPath = 'cropped/';
  $cropped = $your_image->crop($width,$height);
//  echo "<div>1" . $cropped . "</div>";

  $width = "146";
  $height = "177";
  /*$fromX = "0";
  $fromY = "0";*/
  $your_image->newPath = 'cropped/';
  $cropped = $your_image->crop($width,$height);
//  echo "<div>1" . $cropped . "</div>";

function replace($str){
  $newstring=str_replace("/"," ", $str);
  return $newstring;

  }

  $a=replace($cropped);
//echo $a. "<br>";

$data = replace($cropped);    
$whatIWant = substr($data, strpos($data, " ") + 1);    
//echo $whatIWant. "<br>";


list($width, $height, $type, $attr) = getimagesize($file_tmp);

 // $id = $_REQUEST['id'];
 //  mysql_query("update `tbl_files` set `pic`='$whatIWant' where id = '".$id."'");



     if ($your_image->newWidth == 1920 && $your_image->newHeight == 800 ){      

       $select_query = "INSERT INTO `uploadimage` (`image`) VALUES ('$resized')";
               $res=mysql_query($select_query)or die(mysql_error());
               if(mysql_affected_rows()==1){
         echo "1"; 
                  }else{
                    echo "0";
                  }

    }
    else
    {
echo "2";
    
    }
  
  

}







?>

