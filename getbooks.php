<?php
try {
	require_once 'resources/constants.inc.php';
} catch (Exception $e) {
	$error = $e->getMessage();
}

include('resources/functions.php');





			if (isset($_GET['q']) && isset($_GET['cat'])) {
			$str = $_GET['q'];
			$cat = $_GET['cat'];

			echo "string is " . $str. " and cat is " . $cat;
			}


		

			//establishing connection with server by passing server_name, username and password
			
try 
    {
    $con = new PDO("mysql:host=".CONST_HOST.";dbname=".CONST_DBNAME,CONST_USER,CONST_PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    switch($cat) {
    	case 1:
		    $sql = "select * from textbook where title like '$str%'";
		    $totalresults = $con->prepare($sql);
		    //$totalresults->bindValue(":str", $str);
		    
		    $myarray = $totalresults->execute();
		    $rows = $totalresults->fetchAll();
			if($rows > 0) {
				
				echo '<table class="table table-bordered">';
				for($i = 0; $i < count($rows); $i++) {

				echo booktable($rows[$i]['title'], $rows[$i]['author'], $rows[$i]['price'], $rows[$i]['isbn'], $rows[$i]['class_id'], $rows[$i]['student_id'], $rows[$i]['img']);

			}
				echo '</table>';
				
			}
				else{
				
				$errmsg = "Invalid email and/or password.";
				echo $errmsg;
			}
			break;
		case 2:	
		 $sql = "select * from textbook where author like '$str%'";
		    $totalresults = $con->prepare($sql);
		    //$totalresults->bindValue(":str", $str);
		    
		    $myarray = $totalresults->execute();
		    $rows = $totalresults->fetchAll();
			if($rows > 0) {
				
				echo '<table class="table table-bordered">';
				for($i = 0; $i < count($rows); $i++) {

				echo booktable($rows[$i]['title'], $rows[$i]['author'], $rows[$i]['price'], $rows[$i]['isbn'], $rows[$i]['class_id'], $rows[$i]['student_id'], $rows[$i]['img']);

			}
				echo '</table>';
				
			}
				else{
				
				$errmsg = "Invalid email and/or password.";
				echo $errmsg;
			}
			break;
		case 3:	
				 $sql = "SELECT textbook.title, textbook.author, textbook.price, textbook.isbn, textbook.class_id, textbook.student_id, textbook.img, professor.name
					FROM textbook, professor, class
					WHERE textbook.class_id = class.id
					AND class.prof_id = professor.prof_id
					AND professor.name LIKE  '$str%'
					LIMIT 0 , 30";
		    $totalresults = $con->prepare($sql);
		   
		    $myarray = $totalresults->execute();
		    $rows = $totalresults->fetchAll();
			if($rows > 0) {
				
				echo '<table class="table table-bordered">';
				for($i = 0; $i < count($rows); $i++) {

				echo booktable($rows[$i]['title'], $rows[$i]['author'], $rows[$i]['price'], $rows[$i]['isbn'], $rows[$i]['class_id'], $rows[$i]['student_id'], $rows[$i]['img']);

			}
				echo '</table>';
				
			}
				else{
				
				$errmsg = "Invalid email and/or password.";
				echo $errmsg;
			}
			break;

		case 4:	
				 $sql = "SELECT textbook.title, textbook.author, textbook.price, textbook.isbn, textbook.class_id, textbook.student_id, textbook.img, class.name
					FROM textbook, professor, class
					WHERE textbook.class_id = class.id
					AND class.name LIKE  '$str%'
					GROUP BY class.name
					LIMIT 0 , 30";
		    $totalresults = $con->prepare($sql);
		   
		    $myarray = $totalresults->execute();
		    $rows = $totalresults->fetchAll();
			if($rows > 0) {
				
				echo '<table class="table table-bordered">';
				for($i = 0; $i < count($rows); $i++) {

				echo booktable($rows[$i]['title'], $rows[$i]['author'], $rows[$i]['price'], $rows[$i]['isbn'], $rows[$i]['class_id'], $rows[$i]['student_id'], $rows[$i]['img']);

			}
				echo '</table>';
				
			}
				else{
				
				$errmsg = "Invalid email and/or password.";
				echo $errmsg;
			}
			break;
		default:

		break;
		} //end switch
	

	}
catch (Exception $e) 
	{
	$error = $e->getMessage();
	echo $error;
	}

$con = null;


	
?>
	
	