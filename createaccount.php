<?php
echo 'Creating account...';
	require_once('./getpassword.php');
	$password=getpassword();
	require_once('getconfig.php');
	$handle=getconfig('username');
	if (!file_exists('./publishserver.conf.php')){
		echo 'publish server is not set, using server as a fallback.'."\n";
		$publishserver=getconfig('server');
	}
	else {
		$publishserver=getconfig('publishserver');
	}
	$ch = curl_init($publishserver.'/?accountcreator=accountcreator');

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array('password'=>$password, 'username'=>$handle));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	echo curl_exec($ch)."\n";
	curl_close($ch);

?>
