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

			if(isset($_GET['bookTitle'])) {
				$title = $_GET['bookTitle'];
				echo $title . "<br>";
			}

			if(isset($_GET['bookAuthor'])) {
				$author = $_GET['bookAuthor'];
				echo $author . "<br>";
			}

			if(isset($_GET['bookClass'])) {
				$class = $_GET['bookClass'];
				echo $class. "<br>";
			}

			if(isset($_GET['bookISBN'])) {
				$isbn = $_GET['bookISBN'];
				echo $isbn . "<br>";
			}

			if(isset($_GET['price'])) {
				$price = $_GET['price'];
				echo $price. "<br>";
			}

			if(isset($_GET['bookImg'])) {
				$img = $_GET['bookImg'];
				echo $img . "<br>";
			}
		
			$dsn = new PDO("mysql:host=".CONST_HOST.";dbname=".CONST_DBNAME,CONST_USER,CONST_PASSWORD);
			$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "INSERT INTO textbook (title, author, price, isbn, password, bidding, class_id, student_id, img) 
			VALUES (:title, :author, :price, :isbn, :password, :bidding, :class_id, :student_id, :img)";
			$results= $dsn->prepare($query);
			$results->bindParam(":title", $title);
			$results->bindParam(":author", $author);
			$results->bindParam(":price", $email);
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

?>

<!DOCTYPE HTML>
<html>
<head class="no-js" lang="en">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>add books</title>
	<meta name="description" content="textbook exchange web application">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/custom.css">
	<link href="css/animate.css" rel="stylesheet">
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="js/main.js"></script>
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

	<form action="" method="GET">
		<fieldset class="form-group textEdit">
			<label for="exampleInputTitle">title</label>
			<input type="text" class="form-control" name="bookTitle" id="bookTitle" placeholder="title" required>
		</fieldset>
		<fieldset class="form-group textEdit">
			<label for="exampleInputAuthor">author</label>
			<input type="text" class="form-control" name="bookAuthor" id="bookAuthor" placeholder="author" required>
		</fieldset>
		<fieldset class="form-group textEdit">
			<label for="exampleInputClass">class</label>
			<input type="text" class="form-control" name="bookClass" id="bookClass" placeholder="class" required>
		</fieldset>
		<fieldset class="form-group textEdit">
			<label for="exampleInputISBN">isbn</label>
			<input type="text" class="form-control" name="bookISBN" id="bookISBN" placeholder="isbn" required>
		</fieldset>
		<div class="checkbox textEdit">
			<script type="text/javascript">
   				function showPrice(bid){
   					var auct = document.getElementById("price2");
   					var auct2 = document.getElementById("price3")
   					if(bid.checked){
   						auct.placeholder = "base price";
   						auct2.innerHTML = "base price";
   					} else {
   						auct.placeholder = "price";
						auct2.innerHTML = "price";
   					}
   				}
   			</script>
    		<label for="bid">
      			<input type="checkbox" id="auction" onclick="showPrice(this)" class="checkboxText">auction?
   			</label>
  		</div>
  		<fieldset class="form-group textEdit" id="price">
    		<label id="price3" class="form-group">price</label>
    		<input type="number" min="0" id="price2" class="form-control" name="price" placeholder="price">
		</fieldset>
		<fieldset class="form-group textEdit">
			<label for="exampleInputImageLink">image link</label>
			<input type="text" class="form-control" name="bookImg" id="bookImageLink" placeholder="image link">
		</fieldset>

		<center><button  class="btn btn-primary fancyButton" >submit</button></center>
	</form>
</body>
</html>