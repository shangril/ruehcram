<?php
if (isset($argv[0])){

$upfiles=scandir('./data/'.$argv[0]);
	$upfile=$argv[0];
//	echo $upfile."\n";
		foreach ($upfiles as $file) {
		//	echo $file."\n";
			if (!is_dir('./data/'.$upfile.'/'.$file)&&!strstr(mime_content_type('./data/'.$upfile.'/'.$file), 'text/')){
				echo 'opening file : '.$file."\n";
				exec ('xdg-open ~/.ruehcram/data/'.$upfile.'/'.$file.' > /dev/null  2> /dev/null 1> /dev/null &');
				echo 'enter text or html to be inserted before this element, or blank line for none'."\n";
				$input = fgets(STDIN);
				$input = trim ($input);
				if ($input!=='') {
					$timestamp = substr($file, 0, 19);
					
					file_put_contents('./data/'.$upfile.'/'.$timestamp.'.html', $input);
				
					
					}
			
			
			}
		}
	
}
else {
	
	echo 'usage : write-debriefing [<episode-data-directory-name>]'."\n";
}


?>
