<?php
$files=scandir('./');
foreach ($files as $file)
		{
		if (!is_dir($file)&&$file[0]!=='.')
			{
			if (
					(isset ($_GET ['newerthan'])&&filemtime('./'.$file)>$_GET ['newerthan'])
					||
					(!isset($_GET ['newerthan']))
			) {
					echo $file."\n";
				}
			}
		
		
		
		
		}

?>
