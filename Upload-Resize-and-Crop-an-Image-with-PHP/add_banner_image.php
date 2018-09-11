 <?php include_once 'header.php'; ?>
<!-- Wrapper Start -->

<style>

body .sec-box header h2 {
  padding: 0;
  margin: 0;
  width: 57% !important;
float:left !important;
  
}
.sec-box header {
  width: 100%;
  padding: 27px 20px;
  border-bottom: #e6e7e8 solid 1px;
  float: left !important;
}
#category_id {
  height: 250px;
}

</style>

<div class="wrapper">
    <div class="structure-row">
        <!-- Sidebar Start -->
        <?php include_once 'side_bar.php'; ?>
        <!-- Sidebar End -->
        <!-- Right Section Start -->
        <div class="right-sec">
            <!-- Right Section Header Start -->
            <?php include_once 'top_right.php'; ?>
            <!-- Right Section Header End -->
            <?php
            $msg = '';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            
            ?>
      
      
      
            <?php
            if (isset($_POST['update']))
      {
      
            
        date_default_timezone_set("Asia/Bangkok");
        $added_on=date("Y-m-d");
                    $title=$_POST["title"]; 
            $description=$_POST["description"];
          
           if(!empty($_FILES['fileToUpload']['name']))
        { 
      include 'libs/img_upload_resize_crop.php';
  $your_image = new _image;
  
  //To Upload
  $your_image->uploadTo = 'banner_images/';
  $upload = $your_image->upload($_FILES['fileToUpload']);
  //echo "<div>" . $upload . "</div>";
  
  //To Resize
  $your_image->newPath = 'thumbs/';
  $your_image->newWidth = 400;
  $your_image->newHeight = 300;
  $resized = $your_image->resize();
 /* echo "<div>2" . $resized . "</div>";*/
  
  //To Crop
  $width = "150";
  $height = "100";
  $fromX = "0";
  $fromY = "0";
  $your_image->newPath = 'cropped/';
  $cropped = $your_image->crop($width,$height,$fromX,$fromY);
  /*echo "<div>1" . $cropped . "</div>";
*/
  

function replace($str){
  $newstring=str_replace("/"," ", $str);
  return $newstring;

  }

  $a=replace($resized);
//echo $a. "<br>";

$data = replace($resized);    
$whatIWant = substr($data, strpos($data, " ") + 1);    
//echo $whatIWant. "<br>";

                 $slider_option = $_POST['slider'];
                 if($slider_option == "golden"){
                    $package_link = "Y";
                    $mostviewedvideos = "N";
                    $Featured_videos ="N";
                 }if($slider_option == "mostviewed"){
                    $package_link = "N";
                    $mostviewedvideos = "Y";
                     $Featured_videos ="N";
                 }   if($slider_option == "Featured_videos"){
                    $package_link = "N";
                    $mostviewedvideos = "N";
                     $Featured_videos ="Y";
                   }

               $select_query = "INSERT INTO `tbl_banners` (`image`,`title`,`description`,`package_link`,`most_viewed_video_link`,`featured_videos`,`added_on` ) VALUES ('$whatIWant','$title','$description','$package_link','$mostviewedvideos','$Featured_videos','$added_on')";
    // exit;
               $res=mysql_query($select_query)or die(mysql_error());
    if(mysql_affected_rows()==1)
    
        
        {
                                //   echo'<script>window.location="http://webmobsoftware.com/hanil/hanil_admin/banners_details.php";</script>'; 
                  ?>         
                
<script type="text/javascript">

   window.location.href = "<?php echo $base_url; ?>banners_details.php";

</script>
                 <?php                //  $msg = "Successfully added ! ";
       
   

 $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Successfully added !'");
                                    $count = mysql_num_rows($qry);
                                    if($count > 0){
                                    $Successfullyupdated_data = mysql_fetch_assoc($qry);
                                     $msg =  $Successfullyupdated_data['persian'];
                                                     }else{
                                      $msg = "Successfully added !";
                                                       }       
    $_SESSION["errormsg"]=$msg;

 }else{




 $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Please Try Again'");
                                    $count = mysql_num_rows($qry);
                                    if($count > 0){
                                    $Successfullyupdated_data = mysql_fetch_assoc($qry);
                                     $msg1 =  $Successfullyupdated_data['persian'];
                                                     }else{
                                      $msg1 = "Please Try Again";
                                                       }       
    $_SESSION["errormsg"]=$msg1;

 }             
                             
                                
                           
//die();
      } 
      
      }
            $qry1=mysql_query("SELECT *FROM tbl_package WHERE `golden_package`='Y'"); 

           $mostviewedvideos = mysql_query( "SELECT `video_id`,count(*) as videocount  FROM `tbl_most_played_videos` group by `video_id` order by count(*) desc");
      ?>
      
            <!-- Content Section Start -->
            <div class="content-section">

                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12 marg-padd-rmv">
                            <div class="sec-box">
                                
                                <header>
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Add banner'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $Add_banner_data = mysql_fetch_assoc($qry);?>
                           <h2 class="heading"><?php echo  $Add_banner_data['persian'];?></h2>
<?php  }else{?>
 <h2 class="heading">Add Banner</h2>
             <?php   }

                 ?>
                 



    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Back to banner list'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $Add_User_data = mysql_fetch_assoc($qry);?>
                    <span id="add"><a href="banners_details.php"><?php echo  $Add_User_data['persian'];?></a></span>

<?php  }else{?> 
<span id="add"><a href="banners_details.php">Back to banner list</a></span>
             <?php   }

                 ?>


         <div class="close-dropdown-btn"> <!-- <a class="closethis">Close</a>  <a class="togglethis">Toggle</a> --></div>
                                </header>
                                <div class="contents">
                                    
                                    <div class="table-box">
                                        <table class="table">
                                            <thead>
                                                <tr>
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Description'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                            $Description_data = mysql_fetch_assoc($qry);?>
        <th class="col-md-4 text-right"><?php echo  $Description_data['persian'];?></th>
        <?php  }else{?> 
         <th class="col-md-4 text-right">Description</th>
                     <?php   }

                 ?>


    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Form Elements'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                            $Form_element_data = mysql_fetch_assoc($qry);?>
        <th class="col-md-4 text-right"><?php echo  $Form_element_data['persian'];?></th>
        <?php  }else{?> 
       <th class="col-md-8">Form Elements</th>
                     <?php   }

                 ?>

                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <form action="" id="updateUserData" name="update_user" method="post" enctype="multipart/form-data">
                      <?php
                        if ($msg != '') {
                        echo "<div class='alert alert-success'>" . $msg . "</div>";
                          }
                      ?>
                                            
                                                
                                                
                                                
                                                <tr>


                                                
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Image Upload'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $Image_Upload_data = mysql_fetch_assoc($qry);?>
      <td class="col-md-4"><?php echo  $Image_Upload_data['persian'];?></td>
<?php  }else{?> 
<td class="col-md-4">Image Upload</td>
             <?php   }

                 ?>        
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Select image to upload'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $Upload_data = mysql_fetch_assoc($qry);?>
    
                 <td class="col-md-8"><?php echo  $Upload_data['persian'];?>
                                                    <input type="file" name="fileToUpload" id="fileToUpload"  multiple="multiple" required="required" /><br>
                                                </td>
<?php  }else{?> 

                <td class="col-md-8">Select image to upload:
                                                    <input type="file" name="fileToUpload" id="fileToUpload"  multiple="multiple" required="required" /><br>
                                                </td>
             <?php   }

                 ?>        
                                                </tr>
               
                                                
                                                
                        
                                                <tr>

    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Title'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                            $title_data = mysql_fetch_assoc($qry);?>
        <td class="col-md-4"><?php echo  $title_data['persian'];?></td>
        <?php  }else{?> 
       <td class="col-md-4">title</td>
                     <?php   }

                 ?>                    
                    


    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Enter title'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                            $Enter_title = mysql_fetch_assoc($qry);?>
        <td class="col-md-8"><input type="text"  placeholder="<?php echo  $Enter_title['persian'];?>" name="title"  class="form-control" required>
         </td>
        <?php  }else{?>

         <td class="col-md-8"><input type="text"  placeholder="Enter title" name="title"  class="form-control" required></td>
                     <?php   }

                 ?>              
                 
                                                </tr>
                                              <!--   <tr>
                                                
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Description'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $Description_data = mysql_fetch_assoc($qry);?>
                    <td class="col-md-4"><?php echo  $Description_data['persian'];?></td>
<?php  }else{?> 
                                                <td class="col-md-4">description</td>            <?php   }
                 ?>
            
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Enter Description'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                            $Description_data = mysql_fetch_assoc($qry);?>
        <td class="col-md-8"><textarea id="description" placeholder="<?php echo  $Description_data['persian'];?> " name="description"  class="form-control" required ></textarea></td>
                         
                          <?php  }else{?>

 <td class="col-md-8"><textarea id="description"  placeholder="Enter Description" name="description"  class="form-control" required></textarea></td>
                         
                                   <?php   }

                 ?>              
                 
                    
            
                        
                                             </tr> -->
                                            <tr>
              
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Linking To'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $choose_data = mysql_fetch_assoc($qry);?>
      <td class="col-md-4"><?php echo  $choose_data['persian'];?></td>
<?php  }else{?> 
<td class="col-md-4">Linking To</td>
             <?php   }

                 ?> 

 <td><input type="radio"  name="slider" value="golden" required>

    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'golden package'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $packagetype_data = mysql_fetch_assoc($qry);?>
                   <?php echo  $packagetype_data['persian'];?>
<?php  }else{?> 
                                              golden package
                                                        <?php   }
                 ?>




   <input type="radio" name="slider"  value="mostviewed" required>
 
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Most viewed videos'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $packagetype_data = mysql_fetch_assoc($qry);?>
                   <?php echo  $packagetype_data['persian'];?>
<?php  }else{?> 
                                            Most viewed videos
                                                        <?php   }
                 ?>




   <input type="radio" name="slider"  value="Featured_videos" required>
 
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Featured video'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $packagetype_data = mysql_fetch_assoc($qry);?>
                   <?php echo  $packagetype_data['persian'];?>
<?php  }else{?> 
                                           Featured video
                                                        <?php   }
                 ?>

</td>

                       </tr>
                       <!--  <tr>
                                                                                         
    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Featured video'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $Featuredvideos_data = mysql_fetch_assoc($qry);?>
      <td class="col-md-4"><?php echo  $Featuredvideos_data['persian'];?></td>
<?php  }else{?> 
<td class="col-md-4">Featured video</td>
             <?php   }
                 ?>    
                              <td class="col-md-8">
                                               
                   <input type="checkbox" name="Featured_videos" value="Y" />Featured video<br>
                                          </td>
                                                </tr> -->
                                          <tr>
                                           

    <?php $qry = mysql_query("SELECT `persian` FROM `tbl_translation` WHERE `english` = 'Submit'");
                 $count = mysql_num_rows($qry);
                 if($count > 0){
                    $submit_data = mysql_fetch_assoc($qry);?>
                      <td class="col-md-1"><input type="submit" placeholder="" id="submit" name="update" value="<?php echo  $submit_data['persian'];?>" class="btn btn-primary style2"></td>
<?php  }else{?> 
   <td class="col-md-1"><input type="submit" placeholder="" id="submit" name="update" value="Submit" class="btn btn-primary style2"></td>
             <?php   }

                 ?> 

                                                </tr>
                                            </form>
                                          
<script>
function showit(it) {
  document.getElementById(it).style.display = "block";
}

function hideit(it) {
  document.getElementById(it).style.display = "none";
}

function hideall() {
  for (var i=1; i<=2; i++) {
    hideit("x" + i);
  }
}
</script>

                                            </script>
                                            <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
                                           <script type="text/javascript"> 
                                            CKEDITOR.replace( 'description' );
                           $(function () {
                               $("#submit").click(function () {
                                    
                                   var HoursEntry = $("#category_id option:selected").val(); 
                                   if(HoursEntry == 0){    
                                       $("#msg").html("<span style='color:red'>Please select one designation</span>"); 
                                       return false;  
                                   }else{
                                       return true;
                                   }     
                                   });
                            });
                       </script>   
                                            
                                            
                                          
                                              
                                            
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->
        </div>
        <!-- Right Section End -->
    </div>
</div>
<!-- Wrapper End -->
</body>
</html>
