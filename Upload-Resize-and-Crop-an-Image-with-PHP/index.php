<html>
	<head>
		<title>Upload, Resize and Crop an Image with PHP - http://www.codeofaninja.com/</title>
	
	</head>
<body>
<?php
include 'config.php';

?>
 <span style="color:green" id="success"></span>
 <span style="color:red" id="danger"></span>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div><input type="file" name="image" id="image" /></div>
    <div><input type="submit" name="button"  id="button" value="Submit" /></div>
</form>
</body>
</html>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript">


$(document).ready(function (e) {
    $('#form1').on('submit',(function(e) {
        e.preventDefault();
        /*var formData = new FormData(this);
formData.append('file', $('#image')[0].files[0]);*/
      var formData = new FormData($(this)[0]);
        $.ajax({
            type:'POST',
            url: "upload_files_images.php",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
      
            success:function(data){
alert(data);
if(data.trim =="1"){
    //alert(data);
     //   $("#success").html("<span class='alert alert-success' style='width: 100%;float: left;text-align: center'>Image uploaded successfully</span>").show().delay(3000).fadeOut('slow');

}else{
    //alert(data);
$("#danger").html("<span class='alert alert-danger' style='width: 100%;float: left;text-align: center'>Image uploaded successfully</span>").show().delay(3000).fadeOut('slow');

}
            	//$("#message").text('Image uploaded successfully').show().delay(3000).fadeOut('slow');
            }
        });
    }));

    $("#image").on("change", function() {
        $("#form1").submit();
    });
});

</script>