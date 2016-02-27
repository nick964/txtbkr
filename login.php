<?php
try {
	require_once 'resources/constants.inc.php';
} catch (Exception $e) {
	$error = $e->getMessage();
}

echo "hello";

session_start();
$errmsg='';
		if(isset($_GET['submit'])) {
		if(empty($_GET['email']) || empty($_GET['password'])) {
		$error = "Email or Password is invalid! Please reenter email or Password.";
		}
		else 
		{
			//define $username and $password
			$email=$_GET['email'];
			$password=md5($_GET['password']);
			//establishing connection with server by passing server_name, username and password
			
try 
	{
	$con = new PDO("mysql:host=".CONST_HOST.";dbname=".CONST_DBNAME,CONST_USER,CONST_PASSWORD);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "select * from student where email = :email and password = :password";
	$results = $con->prepare($sql);
	$results->bindParam(":email", $email);
	$results->bindParam(":password", $password);
	$myarray = $results->execute();
	$rows = $results->fetch(PDO::FETCH_NUM);
	if($rows > 0) {
		
		$_SESSION['userid'] = $rows[0][0];
		header("Location: homepage.php");
		
	}
		else{
		
		$errmsg = "Invalid email and/or password.";
		echo $errmsg;
	}	

	}
catch (Exception $e) 
	{
	$error = $e->getMessage();
	echo $error;
	}

$con = null;


		}
		}
?>
	
	