<?php

function getconfig($optionname){

if (!isset($optionname)){
	echo 'getconfig error : optionname is not provided'."\n";
	die();
}
$optionname=str_replace('./', '', $optionname);
$optionname.='.conf.php';	
if (file_exists('./'.$optionname)){
return unserialize(file_get_contents('./'.$optionname));
}
else {
	
	echo 'Fatal ! Config option file '.$optionname.' not found'."\n";
	die();
	}
}
?>
