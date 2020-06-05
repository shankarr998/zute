<?php
	include("header.php");

//---------------------------------------------------------------------------------------------------------------------------------
//account.php
class Account {

		public $con;
		public $errorArray;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		public function login($un, $pw) {

			echo $un,$pw;

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
            
if(!$query) {
                
                  echo("Error description: " . mysqli_error($this->con));

}
			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}

		}

		public function register($un, $fn, $zip, $em, $em2,$ph ,$pw, $pw2) {

			$this->validateUsername($un);
			$this->validateFirstName($fn);
//			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($un, $fn, $zip, $em, $pw,$ph);
						echo $un, $fn, $ln, $em;
			}
			else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($un, $fn, $zip, $em, $pw,$ph) {
			$encryptedPw = md5($pw);

			$date = date("Y-m-d");

//			$result = mysqli_query($this->con, "INSERT INTO `test`(`col`) VALUES (44)");
//$result = mysqli_query($this->con,"INSERT INTO user (`userId`, `userName`, `firstName`, `zipcode`, `emailId`, `phoneNumber`, `password`, `dateOfJoining`) VALUES ('','$un','$fn','$zip','$em','$ph','$pw','$date')" );
            
            $result = mysqli_query($this->con,"INSERT INTO users VALUES ('','$un','$em','$pw','$fn','$ph','$zip')" ) ;
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($this->con));

}





			return $result;
		}

		private function validateUsername($un) {

			if(strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}

			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
			if(mysqli_num_rows($checkUsernameQuery) != 0) {
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}

		}

		private function validateFirstName($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email  FROM users WHERE email='$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

		}

		private function validatePasswords($pw, $pw2) {
			
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

		}


	}
//----------------------------------------------------------------------------------------------------------------------
//constanst.php
//has constants for showing error
class Constants {

	public static $passwordsDoNoMatch = "Your passwords don't match";
	public static $passwordNotAlphanumeric = "Your password can only contain numbers and letters";
	public static $passwordCharacters = "Your password must be between 5 and 30 characters";
	public static $emailInvalid = "Email is invalid";
	public static $emailsDoNotMatch = "Your emails don't match";
	public static $emailTaken = "This email is already in use";
	public static $lastNameCharacters = "zip code has to be only 6 digits";
	public static $firstNameCharacters = "Your first name must be between 2 and 25 characters";
	public static $usernameCharacters = "Your username must be between 5 and 25 characters";
	public static $usernameTaken = "This username already exists";

	public static $loginFailed = "Your username or password was incorrect";

}
	$account = new Account($con);

//login  handler---------------------------------------------------------------

if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);
    
    echo $username, $password;

	if($result == true) {
        	session_start();

		$_SESSION['userLoggedIn'] = $username;
        
        	$result = mysqli_query($con, "SELECT * FROM users where username='$username'");
            
            if(!$result) {
                
                  echo("Error description: " . mysqli_error($con));

                }   
			 while ($row = $result->fetch_assoc()) {
                        $_SESSION['user-id']=$row["user-id"];

    }
		
        echo $username;
		header("Location: index.php");
	}

}


//register handler--------------------------------------

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


if(isset($_POST['registerButton'])) {
	//Register button was pressed
	$username = sanitizeFormUsername($_POST['username']);
	$phone = $_POST['phone'];

	$firstName = sanitizeFormString($_POST['firstName']);
	$zipcode = sanitizeFormString($_POST['Zip-Code']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstName, $zipcode, $email, $email2,$phone ,$password, $password2);

	if($wasSuccessful == true) {
        	session_start();

		$_SESSION['userLoggedIn'] = $username;
$result = mysqli_query($con, "SELECT * FROM users where username='$username'");
            
            if(!$result) {
                
                  echo("Error description: " . mysqli_error($con));

                }   
			 while ($row = $result->fetch_assoc()) {
                                         $_SESSION['user-id']=$row["user-id"];

                 

    }		echo "<h1>".$username."</h1>";
        header("Location: register-landing-page.php");

	}

}
	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>

	<title>Welcome to  Zute!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

	<div class="container">
  <div class="row">
    <div class="col-sm-4">
<!--
     <form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername') ?>" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
					</p>

					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
					</div>
					
				</form>
-->
     <form id="loginForm" action="register.php" method="POST">
         					<h2>Login to your account</h2>

  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" id="loginUsername" name="loginUsername" type="text" value="<?php getInputValue('loginUsername') ?>"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" id="loginPassword" name="loginPassword" type="password" placeholder="Your password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
      </div>
  <button type="submit" name="loginButton"class="btn btn-primary">LOG IN</button>
</form>
    </div>
      <br>
    <div class="col-sm-4"> 
      <form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username</label>
						<input class="form-control"  id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First name</label>
						<input id="firstName" class="form-control" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="Zip-Code">Zip-Code</label>
						<input class="form-control" id="Zip-Code" name="Zip-Code" type="text" placeholder="e.g.560023" value="<?php getInputValue('Zip-Code') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input  class="form-control"id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
					</p>

					
					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="phone number">phone number</label>
						<input id="phone"class="form-control"  name="phone" type="text" placeholder="your phone number" value="<?php getInputValue('phone') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password</label>
						<input class="form-control" id="password" name="password" type="password" placeholder="Your password" required>
					</p>

					<p>
						<label for="password2">Confirm password</label>
						<input class="form-control" id="password2" name="password2" type="password" placeholder="Your password" required>
					</p>
                            
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  Terms and Conditions
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Terms and conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
The Intellectual Property disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.
A Termination clause will inform that users' accounts on your website and mobile app or users' access to your website and mobile (if users can't have an account with you) can be terminated in case of abuses or at your sole discretion.
A Governing Law will inform users which laws govern the agreement. This should the country in which your company is headquartered or the country from which you operate your website and mobile app.
A Links To Other Web Sites clause will inform users that you are not responsible for any third party websites that you link to. This kind of clause will generally inform users that they are responsible for reading and agreeing (or disagreeing) with the Terms and Conditions or Privacy Policies of these third parties.
If your website or mobile app allows users to create content and make that content public to other users, a Content section will inform users that they own the rights to the content they have created. The "Content" clause usually mentions that users must give you (the website or mobile app developer) a license so that you can share this content on your website/mobile app and to make it available to other users.

Because the content created by users is public to other users, a DMCA notice clause (or Copyright Infringement ) section is helpful to inform users and copyright authors that, if any content is found to be a copyright infringement, you will respond to any DMCA takedown notices received and you will take down the content.

A Limit What Users Can Do clause can inform users that by agreeing to use your service, they're also agreeing to not do certain things. This can be part of a very long and thorough list in your Terms and Conditions agreements so as to encompass the most amount of negative uses.      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
          <p><input type="checkbox"  required id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1">Accept terms and conditions</label><br>
          </p>
          <p>
					<button type="submit" name="registerButton">SIGN UP</button>
          </p>

					<div class="hasAccountText">
					</div>
					
				</form>
    </div>
  
  </div>
</div>

	
				



				



<?php
	include("footer.php");?>