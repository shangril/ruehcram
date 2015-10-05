<?php
$target=$_GET ['software-get'];
$target=str_replace('./', '', $target);
if (!is_dir('./'.$target)&&file_exists('./'.$target)&&!strstr($target, '.conf.php'))
				{

	if ($target!='ruehcram.php'){

	readfile('./'.$target);
			}
	else {
		$content=file_get_contents('./'.$target);
		$protocol = (isset($_SERVER['HTTPS'])?'https':'http');
		$content=str_replace('$server="http://localhost/ruehcram";', '$server="'.$protocol.'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].str_replace('/index.php','',$_SERVER['SCRIPT_NAME']).'";', $content);
	
		echo $content;
		
	}
	}
?>
