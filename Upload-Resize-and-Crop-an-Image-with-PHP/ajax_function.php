<?php
include 'config.php';

if( isset($_FILES['image'] ) ) {

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



list($width, $height, $type, $attr) = getimagesize($file_tmp);


     if ($your_image->newWidth == 1920 && $your_image->newHeight == 800 ){      

        echo $select_query = "INSERT INTO `uploadimage` (`image`) VALUES ('$resized')";
               $res=mysql_query($select_query)or die(mysql_error());
               if(mysql_affected_rows()==1){
         echo "Image uploaded"; 
                  }

    }
    else
    {
echo "Image not upload.Image size should be 1920 x 800";
    
    }
  
  
 
}


?>
