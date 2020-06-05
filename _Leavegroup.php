    <?php include("config.php");
    $groupname = $_GET['groupname'];



		$username=$_SESSION['userLoggedIn'];


$result = mysqli_query($con,"DELETE FROM group_members WHERE group_name='$groupname' AND username='$username';
" ) ;
            if (!$result) {
                
                  echo("Error description: ".mysqli_error($con));

            }
//		header("Location: group-home.php?gname=$gname");
header("Location: home.php");



?>