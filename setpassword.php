<?php
if (!isset($_SERVER['HOME'])){die();}
if (!isset($_SERVER['HOME'])){die();}

if (!isset($argv[0])){
	echo 'usage setpassword <password>'."\n";
	
}
else {
	$argv[1]=$argv[0];
	$argv[0]='password';
	include ('./setconfig.php');
	
}

?>
