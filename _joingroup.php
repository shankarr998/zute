    <?php include("config.php");
    $groupname = $_GET['groupname'];



		$username=$_SESSION['userLoggedIn'];
$d=date("Y-m-d H:i:s");


$result = mysqli_query($con,"INSERT INTO group_members VALUES ('$groupname','$username','$d')" ) ;
            if (!$result) {
                
                  echo("Error description: ".mysqli_error($con));

            }
//		header("Location: group-home.php?gname=$gname");
header("Location: group-home.php?gname=$groupname");



?>