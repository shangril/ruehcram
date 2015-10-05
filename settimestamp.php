<?php
if (!isset($_SERVER['HOME'])){die();}
$dirs=scandir('./data');
sort($dirs);
array_reverse($dirs);

$dir=$dirs[0];

if (isset($argv[0])){
		$dir=$argv[0];
	
}

$content=scandir('./datapre');
foreach ($content as $token) 
{
		if (!is_dir('./datapre/'.$token)){
			$time=filemtime('./datapre/'.$token);
			
			
			$target = date('Y-m-d_H-i-s', $time).$token;
			exec ('mv ./datapre/'.$token.' ./data/'.$dir.'/'.$target);
			



	}
}




?>
