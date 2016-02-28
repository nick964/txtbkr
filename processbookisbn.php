<?php

include('resources/functions.php');


try {
	require_once 'resources/constants.inc.php';

} catch (Exception $e) {
	$error = $e->getMessage();
}
echo "here";




			$title = $_GET['bookTitle'];
			$author = $_GET['bookAuthor'];
			$price = $_GET['bookPrice'];
			$isbn = $_GET['bookISBN'];
			$bidding = $_GET['bid'];
			$class_id = 1;
			$student_id = "2";
			$img = $_GET['img'];
		
			$dsn = new PDO("mysql:host=".CONST_HOST.";dbname=".CONST_DBNAME,CONST_USER,CONST_PASSWORD);
			$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "INSERT INTO textbook (title, author, price, isbn, bidding, class_id, student_id, img) 
			VALUES (:title, :author, :price, :isbn, :bidding, :class_id, :student_id, :img)";
			$results= $dsn->prepare($query);
			$results->bindParam(":title", $title);
			$results->bindParam(":author", $author);
			$results->bindParam(":price", $price);
			$results->bindParam(":major", $major);
			$results->bindParam(":img", $img);
			$results->bindParam(":isbn", $isbn);

			$insertresult = $results->execute();
			
			if($insertresult) {
				$db = null;
				//header("Location: userconfirmation.php");
				echo "success";
			}
		


		

?>
