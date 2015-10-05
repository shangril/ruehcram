<?php
if (!isset($_SERVER['HOME'])){die();}
function getpassword(){
	if (!file_exists('./username.conf.php')){
		echo 'Fatal error. Username is not set. Please set an username using the setusername command';
		die();
		
	}
	require_once('getconfig.php');
	$handle=getconfig('username');
	
	if (!file_exists('./password.conf.php')){
					if (!file_exists('./publishserver.conf.php')){
		echo 'publish server is not set, using server as a fallback.'."\n";
		$publishserver=getconfig('server');
							}
								else {
		$publishserver=getconfig('publishserver');
	}
	echo 'Please enter your password for user '.$handle.' on publishserver '.$publishserver."\n";
				$input = fgets(STDIN);
				$input = trim ($input);
				return $input;
		}
	else {
		return getconfig('password');
	}
}
?>
