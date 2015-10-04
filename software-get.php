<?php
$target=$_GET ['software-get'];
$target=str_replace('./', '', $target);
if (!is_dir('./'.$target)&&file_exists('./'.$target))
				{
	readfile('./'.$target);
			}

?>
