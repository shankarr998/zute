    <?php include("config.php");
    $eid=$_GET['eid'];



		$username=$_SESSION['userLoggedIn'];

$result = mysqli_query($con,"INSERT INTO attend VALUES ($eid,'$username')" ) ;
            if (!$result) {
                
                  echo("Error description: ".mysqli_error($con));

            }
		header("Location: event-home.php?eid=$eid");


?>