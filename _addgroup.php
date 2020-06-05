    <?php include("config.php");

        $username=$_SESSION['userLoggedIn'];

    $groupname = $_POST['groupname'];
$groupdescription = $_POST['groupdes'];
       $interest = $_POST['interest'];
	$city = $_POST['city']; 
      $zipcode = $_POST['zipcode'];
	$state = $_POST['state'];

$upload_image=$_FILES["myimage"]["name"];
    $folder="groupsimg/";


move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);

//$insert_path="INSERT INTO pos VALUES('$folder','$upload_image')";
        $postedtime= date("Y-m-d H:i:s");
      
      
      
      
      $result = mysqli_query($con,"INSERT INTO groups VALUES ('','$groupname','$groupdescription','$username','$interest','$city' ,'$state','$zipcode','$folder','$upload_image','$postedtime')" ) ;
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

}



      
      
    header("Location:_joingroup.php?groupname=$groupname");




?>