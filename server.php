<?php
if (!isset($_SERVER['HOME'])){die();}
if (isset($argv[0])){
		echo 'setting server name '.$argv[0].'...';
		$argv[1]=$argv[0];
		$argv[0]='server';
		
		
		include ('setconfig.php');
		echo 'done'."\n";
	
	
	}
else {
		include_once('getconfig.php');
		echo getconfig('server')."\n";
	
	
	}

?>
