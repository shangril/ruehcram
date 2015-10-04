<?php
$dirs=scandir('./');
$commands=array();
$text=array();
$cats=array();

foreach ($dirs as $dir){
	if (strstr($dir, '.php.txt')){
		$command = str_replace('.php.txt', '', $dir);
		$doc = file('./'.$dir);
		$text[$command]= '<em><strong>'.htmlentities($command).'</em></strong><br/>'.str_replace("\n", '<br/>', htmlentities (file_get_contents('./'.$dir)));
		array_push($commands, $command);
		$cats[$doc[0]]=$doc[0];
	
	}
}
sort($cats);
?><!DOCTYPE html>
<html>
<head>
<title>Ruehcram commands and web scripts reference</title>
</head>
<a href="./">../</a>
<h1>Ruehcram commands and web scripts reference</h1>
<?php
foreach ($cats as $cat){
$prevtoken='';
$tokens=explode ('/',$cat);
foreach ($tokens as $token){
	echo '<a href="./?reference=reference&target='.urlencode($prevtoken.$token).'">'.htmlentities($token).'</a>/';
	$prevtoken.=$token.'/';
	
	}
	foreach ($commands as $cont) {
			if (
			strstr($cat, $_GET['target'])
			&&
			strstr($cat, file('./'.$cont.'.php.txt')[0])
			
			&&
			strstr(file('./'.$cont.'.php.txt')[0], $_GET['target'])){echo '<br/>'.$text[$cont];}
		
	}
echo '<br/>';
}
?>
</html>
