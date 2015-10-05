<?php
if (!isset($_SERVER['HOME'])){die();}
if (isset($argv[0])){
	echo 'for '.$argv[0]."\n";
			}
else
		{
	$argv[0]='help';
	
			}
$files=scandir('./');
sort($files);
$doc=array();
foreach ($files as $file)
	{ if (file_exists($file.'.txt')) {
		$doc=file($file.'.txt');
		
	if (strstr($file, '.php') && !strstr($file, '.php.')
			 
			&& (
					!isset ($argv [0])
					||
					$argv [0]===str_replace ('.php', '', $file)
					
			
			
				)
	
	
	
	)
				{
			$doc=file($file.'.txt');
			echo 'Command : '.str_replace('.php', '', $file).' - Category : '.$doc[0];
			echo $doc[1];
			if (count($doc)==3) { echo $doc[2]; }
			echo "\n";
			}
	
			}
	}
?>
