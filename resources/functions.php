<?php

/****************************************************
Name: Confirm Password
Purpose: This function will check that the password is working

date		developer		comment
20150206	Nick Robinson	none so far
*****************************************************/

function confirmPassword($password, $confirm) {
	$result = false;

	if($password == $confirm) {
		$result = true;
	}

	return $result;
}

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

function booktable($title, $author, $price, $isbn, $class_id, $student_id, $img) {

ob_start();
?>
			<div>
			<table class="table table-hover">
    <tbody>
      <tr>
        <td class="col-md-3">
        	<img src="<?php echo $img ?>" class="img-responsive img-thumbnail bookdisplay" alt="testtheimage" />
        </td>
        <div>
        <td class="col-md-9">
        	<div id="bookinfo">
        		<h3><?php echo $title ?></h3>
	      	    <h4>by <?php echo $author ?></h4>
	      	    <br>
	      	    <h4>list price: $<?php echo $price ?></h4>
	      	    <button type="button" class="btn btn-primary fancyButton" value="Contact" >contact student</button>
        	</div>
        </td>
    </div>
      </tr>
    </tbody>
			</table>
<?php 

return ob_get_clean();

}

function curl_get_contents($url)
	{
	  $ch = curl_init($url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
	}

function cleanISBN($string) {
	$string = str_replace("-","",$string);
	$string = str_replace(" ","",$string) ;
	return $string;
}

 
 ?>
