<?php
$contentup=scandir('./data');
sort($contentup);
$contentup=array_reverse($contentup);
foreach ($contentup as $tokenup) 
{
if (is_dir('./data/'.$tokenup)){
$content=scandir('./data/'.$tokenup);

foreach ($content as $token) 
{
		if (!is_dir('./data/'.$tokenup.'/'.$token)&&strstr(mime_content_type('./data/'.$tokenup.'/'.$token), 'video/')){
			
			exec ('avconv -i ./data/'.$tokenup.'/'.$token.' ./data/'.$tokenup.'/'.$token.'.ogv');
			unlink ('./data/'.$tokenup.'/'.$token);



	}else if  (strstr(mime_content_type('./data/'.$tokenup.'/'.$token), 'audio/')){
			
			exec ('avconv -i ./data/'.$tokenup.'/'.$token.' ./data/'.$tokenup.'/'.$token.'.oga');
			unlink ('./data/'.$tokenup.'/'.$token);



	}
}
}
}



?>
