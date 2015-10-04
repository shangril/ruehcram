<?php
if (!isset($argv[1])){
	echo 'setconfig error : either optionname or value is not provided'."\n";
	die();
}
$optionname=str_replace('./', '', $argv[0]);
$optionvalue=$argv[1];
if (file_exists('./'.$optionname.'.conf.php')){
	unlink ('./'.$optionname.'.conf.php');
}
file_put_contents('./'.$optionname.'.conf.php', serialize($optionvalue));

?>
