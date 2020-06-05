    <?php include("config.php");

        
        $username=$_SESSION['userLoggedIn'];
        $group_name=$_SESSION['gname'];

    
    $caption = $_POST['caption'];
    $postdes = $_POST['postdes'];


        
$upload_image=$_FILES["myimage"]["name"];
    $folder="post/";


move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);

//$insert_path="INSERT INTO pos VALUES('$folder','$upload_image')";
        $postedtime= date("Y-m-d H:i:s");


//echo "<h1>".$caption."-".$postdes."-".$folder."-".$upload_image."-".$group_name."-".$username."-".$et."-"."</h1>";

$result=mysqli_query($con,"INSERT INTO post VALUES('','$caption','$postdes','$folder','$upload_image','$group_name','$username','$postedtime')");
        if (!$result) {
                
                  echo("Error description: ".mysqli_error($con));

            }
		header("Location: group-home.php?gname=$group_name");


 
?>