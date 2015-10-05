<?php
if (!isset($_POST['username'])||!isset($_POST['password'])){
	echo 'username and or password not provided';
	die();
	
}
$username=$_POST['username'];
$password=$_POST['password'];
if (!preg_match("/^[A-Za-z\\-]*$/", $username)){
	echo 'username can only contain a-z, A-Z, and -';
	die();
	
}
mkdir('./'.$username);
mkdir('./'.$username.'/data');
mkdir('./'.$username.'/meta');
if (!file_exists('./'.$username.'/meta/pwd.php')){
if (count($password)>5) {

file_put_contents('./'.$username.'/meta/pwd.php', serialize(crypt($password, $password)));
echo 'Account created ok';

	}
else {
	echo 'password too short, aborting...';
}
}
else{
	echo 'sorry, this username is already in use, please choose another one';
}
?>
