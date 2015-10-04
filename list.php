<?php
echo 'Listing installed software for category : ';
if (isset($argv[0])){
	echo $argv[0]."\n";
			}
else
		{
	echo '(none)'."\n";
	
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
					$argv [0]==trim($doc[0])
					
			
			
				)
	
	
	
	)
				{
			$doc=file($file.'.txt');
			echo 'Command : '.str_replace('.php', '', $file).' - Category : '.$doc[0];
			echo $doc[1]."\n";
			}
	
			}
	}
?>
