    <?php include("config.php");


		$username=$_SESSION['userLoggedIn'];
        $group_name=$_SESSION['gname'];

    
    $eventname = $_POST['eventname'];
$eventdescription = $_POST['eventdes'];
       $eventvenue = $_POST['eventvenue'];
//	$st = $_POST['st']; 
//      $et = $_POST['et'];
$st=$et=date("Y-m-d-H-i-s");
	$zip = $_POST['zipcode'];
      
 $result = mysqli_query($con,"INSERT INTO events VALUES ('','$eventname','$eventdescription','$st','$et','$eventvenue','$zip','$group_name','$username')" ) ;
            if (!$result) {
                
                  echo("Error description: ".mysqli_error($con));

            }

		header("Location: group-home.php?gname=$group_name");

            


?>