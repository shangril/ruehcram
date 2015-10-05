<?php
if (!isset($_SERVER['HOME'])){die();}
require_once('./getpassword.php');
function processfile($file, $password){


	if (is_dir($file)){
		$dirs=scandir($file);
		foreach ($dirs as $dir){
			if ($dir[0]!=='.'){
			
				processfile($file.'/'.$dir, $password);
		
		}
		
		}
		
	}



	require_once ('./getconfig.php');
	require_once ('./getpassword.php');
	$handle=getconfig('username');

		if (!file_exists('./publishserver.conf.php')){
		echo 'publish server is not set, using server as a fallback.'."\n";
		$publishserver=getconfig('server');
	}
	else {
		$publishserver=getconfig('publishserver');
	}
	$local=filemtime('./'.$file);
	$remote=intval(file_get_contents($publishserver.'/?getmtime='.urlencode($handle.'/'.$file)));
	if ($local>$remote) {
		$cfile = new CURLFile('./'.$file, mime_content_type('./'.$file)); 
		$data = array('file' => $cfile, 'username'=>$handle, 'password'=>$password);
		echo 'uploading file '.$file."\n";
		$curl=curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $publishserver.'/?uploader='.urlencode($handle.'/'.$file));
		
		curl_setopt($curl, CURLOPT_POST, true); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
		echo curl_exec($curl)."\n"; 
		curl_close($curl);
	
	}
	else {echo 'file '.$file.' do not need to be uploaded'."\n"; }
}

$password=getpassword();
$dirs=scandir('./data');
foreach ($dirs as $dir){
if ($dir[0]!=='.') {
	
	
	$dires=scandir('./data/'.$dir);
	foreach ($dires as $dire){

		if ($dire[0]!=='.') {
		processfile('data/'.$dir.'/'.$dire, $password);
}			
	}
}
}
$dirs=scandir('./meta');
foreach ($dirs as $dir){
if ($dir[0]!=='.') {

	$dires=scandir('./meta'.$dir);
	foreach ($dires as $dire){

if ($dire[0]!=='.') {
		
		processfile('meta/'.$dir.'/'.$dire, $password);
}
	}

}
}
?>
