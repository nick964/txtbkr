<?php

include('resources/functions.php');


try {
	require_once 'resources/constants.inc.php';

} catch (Exception $e) {
	$error = $e->getMessage();
}

session_start();
$error='';
		if(isset($_GET['submit'])) {
		if(empty($_GET['email']) || empty($_GET['password'])) {
		$error = "Username or Password is invalid! Please reenter Username or Password.";
		} else if (confirmPassword($_GET['password'], $_GET['confirm']) == false) {
			$error = "Password doesn't match. Please try again.";
		}
		else 
		{
			//define $username and $password
			$email=$_GET['email'];
			$password=$_GET['password'];
			$firstname=$_GET['firstname'];
			$lastname=$_GET['lastname'];
			$major=$_GET['major'];
			//establishing connection with server by passing server_name, username and password
			$dsn = new PDO("mysql:host=".CONST_HOST.";dbname=".CONST_DBNAME,CONST_USER,CONST_PASSWORD);
			$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "INSERT INTO student (firstname, lastname, email, major, password) 
			VALUES (:firstname, :lastname, :email, :major, :password)";
			$results= $dsn->prepare($query);
			$results->bindParam(":firstname", $firstname);
			$results->bindParam(":lastname", $lastname);
			$results->bindParam(":email", $email);
			$results->bindParam(":major", $major);
			$results->bindParam(":password", $password);
			$insertresult = $results->execute();
			
			if($insertresult) {
				$db = null;
				header("Location: userconfirmation.php");
			}
			else {
				$error = $e->getMessage();
				echo $error;
			}
		}
		}



?>


<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/custom.css">
        <link href="css/animate.css" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>

            <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <p id="logo">txtbkr.</p>
                    </a>
                </div>
            </div>
        </nav>

<div id="container-fluid">

	<div class="row">

		<div class="col-md-12" style="text-align: center">
		<h2>Signup Page</h2><br>
		  
	<?php
    if(isset($error)) {
      echo "<h1>". $error . "</h1>";
    }
	
	?>
		</div>
		</div>


		<div class="row">

		<div class="col-md-3">
		<span></span>
		</div>        


			<div class="col-md-6">        

		<form id="signupform" class="signupform"  method="get" action="">
		
							<div class="form-group">
			<table id="table_signup" class="table-responsive" align="center">		
			<tr class="spaceUnder"><td>
			<input type="" name="firstname" id="firstname" value="" placeholder="First Name" size="20" maxlength="20" required>
			</td></tr>
			<br>	
			<tr class="spaceUnder"><td>
			<input type="" name="lastname" id="lastname" value="" placeholder="Last Name" size="20" maxlength="20" required>
			</td></tr>
			<br>
			<tr class="spaceUnder"><td>
			<input type="text" name="email" id="email" value="" placeholder="Email" size="20" maxlength="20" required> 
			</td></tr>
			<br>
			<tr class="spaceUnder"><td>
			<select form="signupform" name="major" id="major">
			  <option name="major" id="major" value="School of Art">School of Art</option>
			  <option name="major" id="major" value="School of Business">School of Business</option>
			  <option name="major" id="major" value="School of Dentistry">School of Dentistry</option>
			  <option name="major" id="major" value="College of Education">College of Education</option>
			  <option name="major" id="major" value="School of Law">College of Law</option>
			  <option name="major" id="major" value="College of Liberal Arts">College of Liberal Arts</option>
			  <option name="major" id="major" value="College of Media and Communication">College of Media and Communication</option>
			  <option name="major" id="major" value="School of Medicine">School of Medicine</option>
			  <option name="major" id="major" value="College of Science and Technology">College of Science and Technology</option>
			</select>
			</td></tr>
			<br>
			<tr class="spaceUnder"><td>
			<input type="password" name="password" id="password" value="" placeholder="Password" size="20" maxlength="20" required><br>
			</td></tr>
			<tr class="spaceUnder"><td>
			<input type="password" name="confirm" id="confirm" value="" placeholder="Confirm Password" size="20" maxlength="20" required>
			</td></tr>
			</table>
			</div>
		
		<p align="center"><input class="btn" type="submit" name="submit" id="submit" value="Submit"></p>
		<div class="wrapper">
		<button id="backBtn" align="center" class="btn"><a id="backBtn" href="index.html">Return to Homepage</a></button>	
		</div>
		
		
		</form> 
	
		</div>

		<div class="col-md-3">
		<span></span>
		</div>    


	</div>
		
</div>
	
	
	
</body>
</html>

