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
<select class="js-example-basic-single form-control" name="state" id="state">
  <option value="AL">Alabama</option>
  <option value="n">new</option>
  <option value="t">test</option>
  <option value="g">gagan</option>
  <option value="WY">Wyoming</option>
</select>
</form>
</body>
</html>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
                            

<script type="text/javascript">

$(document).ready(function() {
    $('#state').select2();
});
</script>
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