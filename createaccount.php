<?php
if (!isset($_POST['username'])||!isset($_POST['password']){
	echo 'username and or password not provided';
	die();
	
}
$username=$_POST['username'];
$password=$_POST['password'];
if (!preg_match("/^[A-Za-z\\-]*$/", $username)){
	echo 'username can only contain a-z, A-Z, and -';
	die();
	
}

?>
