<?php
if (!isset($_SERVER['HOME'])){die();}
if (!file_exists($_SERVER['HOME'].'/.ruehcram/')) {
		mkdir($_SERVER['HOME'].'/.ruehcram/');

	}
if (!file_exists($_SERVER['HOME'].'/.ruehcram/data')) {
		mkdir($_SERVER['HOME'].'/.ruehcram/data');

	}
if (!file_exists($_SERVER['HOME'].'/.ruehcram/datapre')) {
		mkdir($_SERVER['HOME'].'/.ruehcram/datapre');

	}
if (!file_exists($_SERVER['HOME'].'/.ruehcram/meta')) {
		mkdir($_SERVER['HOME'].'/.ruehcram/meta');

	}
if (!file_exists($_SERVER['HOME'].'/.ruehcram/ruehcram.php')) {
		exec ('cp ./ruehcram.php ./ruehcram '.$_SERVER['HOME'].'/.ruehcram/');
		include ($_SERVER['HOME'].'/.ruehcram/ruehcram.php');
		die(); 
	}
$root=$_SERVER['HOME'].'/.ruehcram/';
chdir($root);
echo array_shift($argv)."\n";
$command=array_shift($argv);
$lastupdate=0;
echo 'checking last update time... '."\n" ;
if (file_exists($root.'.lastupdate'))
				{
					$lastupdate=filemtime($root.'.lastupdate');
				}
		
		
if (!file_exists('./server.conf.php'))
	{
	$server="http://localhost/ruehcram";
	echo 'Server name is not set. Please set a server name using the server command'."\n";
	}
else
	{
	$server=unserialize(file_get_contents('./server.conf.php'));
	}
echo 'contacting server for software update...'."\n";
if($files=file($server.'/?software-list=software-list&newerthan='.urlencode($lastupdate)))
		{
	echo 'Server '.$server.' reached. List received.'."\n";
	touch($root.'.lastupdate');
	}
	else
	{
	echo 'No update available'."\n";
	}
	
	
foreach ($files as $file)
			{
			echo 'Downloading '.$file;
			$file=trim($file);
			if (file_exists($root.$file))
					{			
					unlink ($root.$file);
					}
			file_put_contents($root.$file, file_get_contents ($server.'/?software-get='.urlencode($file)));

	}
echo ' Update finished'."\n";
if (!isset($command))			{
			echo 'try ruehcram help for the online help, or ruehcram list for a list of commands'."\n";
	}
else {
	if (file_exists($root.$command.'.php'))
				{
				echo 'Running command '.$command."\n";
				include ($root.$command.'.php');
		} else 
		{
				echo 'Unknown command '.$command."\n";
		}
}
echo 'exiting...';


?>
	
