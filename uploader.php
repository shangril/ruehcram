<?php
if(strpos(basename($_FILES['file']['name']),'"')==false){
$handle = $_POST['username'];
$password = $_POST['password'];
if (strstr($_FILES['file']['name'], '.php')) {die();}
if (strstr($_GET['uploader'], '.php')) {die();}

if (!preg_match("/^[A-Za-z0-9\\-_.]*$/",$_FILES['file']['name'])){
		
		echo 'fatal error on file '.$_FILES['file']['name'].'. Filename can contain only A-Z, a-Z, 0-9, -, _ and . '."\n";
		die();
	}
	
if (is_dir($handle) &&
		crypt($password, $password)===unserialize(file_get_contents($handle.'/meta/pwd.php'))

	) {	$file=str_replace('./','',$_GET['uploader']);
		
		
		
		$path=explode('/', $file);
		array_reverse($path);
		$filename = array_shift($path);

if (!preg_match("/^[A-Za-z0-9\\-_.]*$/",$filename)){
		
		echo 'fatal error on file '.$_FILES['file']['name'].'. Filename can contain only A-Z, a-Z, 0-9, -, _ and . '."\n";
		die();
	}


		array_reverse($path);
		foreach ($path as $dir) {
			mkdir ($handle.'/'.$oldpath.$dir);
			$oldpath.=$dir.'/';
		}
	if(move_uploaded_file($_FILES['file']['tmp_name'], './'.$handle.'/'.$oldpath.'/'.$filename ))
     {
          echo 'Upload OK ! ';
     }
     else 
     {
          echo 'Sorry, the system encountered an error.';
	  }
	}
}
