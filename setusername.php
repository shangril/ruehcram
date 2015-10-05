<?php
if (!isset($_SERVER['HOME'])){die();}

if (!isset($argv[0])){
	echo 'usage setusername <username>'."\n";
	
}
else {
	$argv[1]=$argv[0];
	$argv[0]='username';
	include ('./setconfig.php');
	
}

?>
