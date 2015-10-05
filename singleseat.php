<?php
if (!isset($_SERVER['HOME'])){die();}
if (isset($argv[0])){
		echo 'setting username for a single diary web install name '.$argv[0].'...';
		$argv[1]=$argv[0];
		$argv[0]='singleseat';
		
		
		include ('setconfig.php');
		echo 'done'."\n";
	
	
	}
else {
		include_once('getconfig.php');
		echo getconfig('singleseat')."\n";
	
	
	}

?>
