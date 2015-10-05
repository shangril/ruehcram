<?php
if (!isset($_SERVER['HOME'])){die();}
if (isset($argv[0])){
		echo 'setting publishserver name '.$argv[0].'...';
		$argv[1]=$argv[0];
		$argv[0]='publishserver';
		
		
		include ('setconfig.php');
		echo 'done'."\n";
	
	
	}
else {
		include_once('getconfig.php');
		echo getconfig('publishserver')."\n";
	
	
	}

?>
