<?php
	include("header.php");


if(isset($_POST['submit_image'])) {
$upload_image=$_FILES["myimage"]["name"];
//$folder="localhost/zutee/res/img";
    $folder="uploads/";


move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);

$insert_path="INSERT INTO image_table VALUES('$folder','$upload_image')";

$var=mysqli_query($con,$insert_path);

}

?>
<html>
<body>
		
<form method="POST" action="test.php" enctype="multipart/form-data">
 <input type="file" name="myimage">
 <input type="submit" name="submit_image" value="Upload">
</form>

</body>
</html>