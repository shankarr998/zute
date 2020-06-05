<?php
	session_start();

include("config.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
//		header("Location: home.php");
        header("Location: home.php");



}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to  Zute!</title>
</head>

<body>
	Hello!
</body>

</html>