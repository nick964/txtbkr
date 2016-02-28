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

 
 ?>
