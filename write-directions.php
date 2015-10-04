<?php
if (isset($argv[0])){

$upfiles=scandir('./data/'.$argv[0]);
	$upfile=$argv[0];
//	echo $upfile."\n";
		foreach ($upfiles as $file) {
		//	echo $file."\n";
			if (!is_dir('./data/'.$upfile.'/'.$file)&&!strstr(mime_content_type('./data/'.$upfile.'/'.$file), 'text/')&&
				strstr(mime_content_type('./data/'.$upfile.'/'.$file), 'image/')
			
			){
				echo 'opening file : '.$file."\n";
				$helper= exec ('xdg-mime query default '.mime_content_type('./data/'.$upfile.'/'.$file));
				$helper=str_replace('.desktop', '', $helper);
				var_dump($helper);
				$pid = exec ($helper.' ~/.ruehcram/data/'.$upfile.'/'.$file.' > /dev/null  2> /dev/null 1> /dev/null & echo $! ;');
			var_dump($pid);
				echo 'enter direction to be associated with this picture : (f)orward, (l)eft, (r)ight, (b)ackward or empty line for no change. Use write-direction <episode timestamp> erase for empty line to erase direction'."\n";
				$input = fgets(STDIN);
				exec ('kill '.$pid);
				$input = trim ($input);
				if ($input!=='') {
					//$timestamp = substr($file, 0, 19);
					if ($input==='f'){
						$input='↑';
					}
					else if ($input==='l'){
						$input='↰';
					}
					else if ($input==='r'){
						$input='↱';
					}
					else if ($input==='b'){
						$input='↓';
					}
					
					
					
					
					file_put_contents('./data/'.$upfile.'/'.$file.'.direction.txt', $input);
				
					
					}
					else if (isset($argv[1])&&$argv[1]==='erase')
					{
						unlink ('./data/'.$upfile.'/'.$file.'.direction.txt');
				
						
						}
			
			
			}
		}
	
}
else {
	
	echo 'usage : write-debriefing <episode-data-directory-name> [erase]'."\n";
}


?>
