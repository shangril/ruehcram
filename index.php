<?php
error_reporting(0);

if (!$sessionstarted){	
	
	session_start();
	$sessionstarted=true;
}
if (isset($_GET ['ruehcram'])){
		$handle=$_GET ['ruehcram'];
		}
		
if (isset($_GET ['software-list']))
{
		include ('software-list.php');
		die();
		
		}
else if (isset($_GET ['nodisplay']))
{
		include ('nodisplay.php');
		die();
		
		}

else if (isset($_GET ['software-get']))
{
		include ('software-get.php');
		die();
		
		}
else if (isset($_GET ['thumbnailer']))
{
		include ('thumbnailer.php');
		die();
		
		}
else if(!isset($handle))
{
		include ('site.php');
		die();
		}
$dates=array();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title><?php echo file_get_contents('./'.$handle.'/meta/title.txt'); 
				echo file_get_contents('./'.$handle.'/meta/shortdescription.txt');
					
	
	?>
	</title>
	<script>var clicked=false;
	var paused=false;
	var next='';
	function shownext(paused, next)
{
	if (!paused&&next!=''){
	
				window.location.href='./?ruehcram=<?php echo urlencode($handle); ?>&min='+encodeURI(next)+'&max='+encodeURI(next);
				return true;
			}
		
			
}

	
	</script>
<style>
body {
		background-image:url("./malatrait.jpg");
	}

</style>
	<meta name="description" value="<?php echo str_replace ('"', '', file_get_contents('./'.$handle.'/meta/longdescription.txt'));?>"/>

</head>
<body style="margin-left:8%;margin-right:8%;font-family:Sans;padding-left:2%;" >
	<a href="./">../</a><br/>
	<h1><?php echo '<a href="./?ruehcram='.urlencode($handle).'">'.file_get_contents('./'.$handle.'/meta/title.txt').'</a>';?>
	</h1><h2>
	<?php
			//	echo file_get_contents('./'.$handle.'/meta/shortdescription.txt');
					
	
	?>
	</h2>
	<div><?php echo file_get_contents('./'.$handle.'/meta/longdescription.txt');?></div>
	<h3 style="display:inline;">Timeline : </h3><br/>
	<?php
	if( !isset($_GET ['min'] ) &&
		!isset($_GET ['max'] )){
			echo'<h4>Select an item to get started</h4>';
		}
		else if (!isset($_GET['ride']))
		{
			echo'<script>
			
				window.location.href+='."'#".htmlentities($_GET ['min'])."'".';
				
			</script>';
		}
	else {
			echo'<script>
			
				window.location.href+='."'#".htmlentities($_GET ['ride'])."'".';
				
			</script>';
		
		
		}
		
	?>
	<!-- -end of headers here, now the content- -->
<?php
$contentup=scandir('./'.$handle.'/data');
sort($contentup);
$contentup=array_reverse($contentup);
$nextneeded=false;
$next='';
foreach ($contentup as $tokenup) 
{
	if ($tokenup[0]!=='.'&&file_exists('./'.$handle.'/data/'.$tokenup.'/meta/title.txt')){
		
				echo '<h1 style="clear:both;"><a name="'.htmlentities(trim(file_get_contents('./'.$handle.'/data/'.$tokenup.'/meta/title.txt'))).'" href="?ruehcram='.urlencode($handle).'&ride='.urlencode(htmlentities(trim(file_get_contents('./'.$handle.'/data/'.$tokenup.'/meta/title.txt')))).'">'.htmlentities(trim(file_get_contents('./'.$handle.'/data/'.$tokenup.'/meta/title.txt'))).'</a></h1>';
		
		}
	
	
	
if (is_dir('./'.$handle.'/data/'.$tokenup)&&(
				isset($_GET ['ride']) &&
				$_GET ['ride']===trim(file_get_contents('./'.$handle.'/data/'.$tokenup.'/meta/title.txt'))
				)
				||
				(
				isset($_GET['min'])
				)
				){
$content=scandir('./'.$handle.'/data/'.$tokenup);
sort($content);

foreach ($content as $token) 
{			if (!is_dir('./'.$handle.'/data/'.$tokenup.'/'.$token)&&$token[0]!=='.'&&!strstr($token, '.direction.txt'))
			

			{	
				$mime = mime_content_type('./'.$handle.'/data/'.$tokenup.'/'.$token);
				
				$running=true;
				
				if (strstr($mime, 'image/')&&isset ($_SESSION['nodisplay']['picture'])){
						$running=false;
				}
				else if ((strstr($mime, 'audio/')
						||strstr($mime, 'video/')
						||strstr($mime, '/ogg')

				
						)&&isset ($_SESSION['nodisplay']['media'])){
						$running=false;
				}
				else if (strstr($mime, 'text/')&&isset ($_SESSION['nodisplay']['text'])){
						$running=false;
				}
				else if (isset ($_SESSION['nodisplay']['attachment'])){
						$running=false;
				}
				if ($running){
					if ($nextneeded)
						{
							$next=$token;
							$nextneeded=false;
							?>
							<script>
								next='<?php echo htmlentities($next);?>';


	</script>
							
							<?php
							}
					
					$mime = mime_content_type('./'.$handle.'/data/'.$tokenup.'/'.$token);
					$time=explode('_',$token);
					$date=explode ('-', $time[0]);
							$hour=explode ('-', $time[1]);
							
							$Y=$date[0];
							$m=$date[1];
							$d=$date[2];
							
							$H=$hour[0];
							$i=$hour[1];
							$final=explode('.', $hour[2]);
							$ressource=$final[0];
							$strdate=$Y.'/'.$m.'/'.$d;
							if (isset($dates[$strdate])){
								
								$strdate=''; 
								}
							else
								{
								$dates[$strdate]=$strdate;
								}
						echo '<span style="background-color:#C0C0EF;float:left;border:solid 1px;padding:2px;">';
						$mime = mime_content_type('./'.$handle.'/data/'.$tokenup.'/'.$token);
						echo '<span style="font-size:68%;">';
						if (strstr($mime, 'video/')) {
							
							
							echo '▶';
							
							}
						else if (strstr($mime, 'audio/')) {
							
							
							echo '▶';
							
							}
						else if (strstr($mime, '/ogg')) {
							
							
							echo '▶';
							
							}
						else if (strstr($mime, 'text/')) {
							
							
							echo '✍';
							
							}
						else if (strstr($mime, 'image/')) {
							
							
							echo '❂';
							
							}	
							else
							{
								echo '⬇';
								
							}
						echo '</span>';
						
						echo '<a style="background-color:rgba(180, 180, 210, 0.6);text-decoration:none;" href="?min='.urlencode($token).'&max='.urlencode($token).'&ruehcram='.urlencode($handle).'&ride='.urlencode(htmlentities(trim(file_get_contents('./'.$handle.'/data/'.$tokenup.'/meta/title.txt')))).'">
						'.$strdate.' '.$H.':'.$i.'</a><a name="'.htmlentities($token).'"><br/></a>
						<input type="hidden" id="'.$Y.$m.$d.$H.$i.htmlentities($ressource).'min" name="" value=""/>
						<input type="hidden" id="'.$Y.$m.$d.$H.$i.htmlentities($ressource).'max" name="" value=""/>
						
						<span id=""></span>
						
						';
						
						/*?>
						<a href="javascript:void(0);" onClick="document.getElementById('<?php
											
																echo $Y.$m.$d.$H.$i.htmlentities($ressource).'min'
						
																?>').value='<?php
																
																echo htmlentities ($token);
																
																
																?>';document.getElementById('<?php
																
											
																echo $Y.$m.$d.$H.$i.htmlentities($ressource).'min'
						
																?>').name='min';if(clicked){document.getElementById('form').submit();}clicked=true;<?php
																
																
																?>">&lt;-</a> 
						<a  href="javascript:void(0);" onClick="document.getElementById('<?php
											
																echo $Y.$m.$d.$H.$i.htmlentities($ressource).'max'
						
																?>').value='<?php
																
																echo htmlentities ($token);
																
																
																?>';document.getElementById('<?php
																
											
																echo $Y.$m.$d.$H.$i.htmlentities($ressource).'max'
						
																?>').name='max';if(clicked){document.getElementById('form').submit();}clicked=true;<?php
																
																
																?>">&gt;-</a> 
						<?php*/
						echo '
						
						</span>';	
		
		}
		
		
		
			if (!is_dir('./'.$handle.'/data/'.$tokenup.'/'.$token)&&
			
					isset($_GET ['min'] ) &&
					isset($_GET ['max'] ) &&
					$token>= $_GET ['min']&&
					$token<= $_GET ['max'] 
			
			
			){
				echo '<br style="clear:both;"/><form style="display:inline;" id="nodisplay" method="GET" action="./">
				<input type="hidden" name="nodisplay" value="nodisplay"/>
				▶<input type="checkbox" ';
					if (!isset($_SESSION['nodisplay']['media'])){
					echo 'checked';
				}
				echo ' name="media"  onclick="document.getElementById('."'".'nodisplay'."'".').submit();"/>
				✍<input type="checkbox" ';
					if (!isset($_SESSION['nodisplay']['text'])){
					echo 'checked';
				}
				echo ' name="text"  onclick="document.getElementById('."'".'nodisplay'."'".').submit();"/>

				❂<input type="checkbox" ';
				if (!isset($_SESSION['nodisplay']['picture'])){
					echo 'checked';
				}
				echo ' name="picture" onclick="document.getElementById('."'".'nodisplay'."'".').submit();"/>

				⬇<input type="checkbox" ';
				if (!isset($_SESSION['nodisplay']['attachment'])){
					echo 'checked';
				}
				echo ' name="attachment" onclick="document.getElementById('."'".'nodisplay'."'".').submit();"/>';
				foreach (array_keys($_GET) as $get){
					
					echo '<input type="hidden" name="'.htmlspecialchars($get).'" value="'.htmlspecialchars($_GET[$get]).'"/>';
				}
				echo '
				</form><br/><a style="float:right;" href="javascript:void(0);" onclick="paused=!paused;">pause</a><div style="clear:both;"><br/>'; 
				$mime = mime_content_type('./'.$handle.'/data/'.$tokenup.'/'.$token);
				if (strstr($mime, 'image/')){
					if ($mime==='image/jpeg'){
						
						echo '<span style="width:19%;font-size:800%;">';
						 if (file_exists('./'.$handle.'/data/'.$tokenup.'/'.$token.'.direction.txt')){
							 readfile ('./'.$handle.'/data/'.$tokenup.'/'.$token.'.direction.txt');
							 
						 }
						 
						 echo '</span><a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'">
						
						
						<img onload="setTimeout ('."'".'shownext(paused, next)'."'".', 5000);" id="'.htmlspecialchars('./'.$handle.'/data/'.$tokenup.'/'.$token).'" 
						
						
						 style="width:80%;"/>
						 
						 <script>
						 
						 document.getElementById('."'".htmlspecialchars('./'.$handle.'/data/'.$tokenup.'/'.$token)."'".').src='."'".'./?thumbnailer='."'".'+encodeURI('."'".htmlspecialchars($handle.'/data/'.$tokenup.'/'.$token)."'".')+'."'".'&viewportwidth='."'".'+encodeURI(document.documentElement.clientWidth);
						 
						 </script>
						 
						 </a>';
						echo '<br/><a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'">Download attached file</a>';
						$nextneeded=true;
						
						
						
					}
					
					
					else {
						
						echo '<a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'"><img onload="setTimeout ('."'".'shownext(paused, next)'."'".', 5000);" src="./'.$handle.'/data/'.$tokenup.'/'.$token.'" style="width:80%;"/></a>';
						echo '<br/><a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'">Download attached file</a>';
						$nextneeded=true;
						}	
				}
				else if (strstr($mime, 'audio/')){
					echo '<audio onEnded="shownext(paused,next);" onAbort="shownext(paused,next);"; src="./'.$handle.'/data/'.$tokenup.'/'.$token.'" autoplay>No inline media support</audio>';
					
					echo '<br/><a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'">Download attached file</a>';
					$nextneeded=true;
					echo '<script>
	setTimeout ('."'".'shownext(paused, next)'."'".', 5000);
	</script>	
	';
				}
				else if (strstr($mime, 'video/')){
					echo '<video autoplay onEnded="shownext(paused,next);" onAbort="shownext(paused,next);" > <source type="'.htmlentities($mime).'" src="./'.$handle.'/data/'.$tokenup.'/'.$token.'"/>No inline media support</video>';
					
					echo '<br/><a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'">Download attached file</a>';
					$nextneeded=true;
					echo '<script>
	setTimeout ('."'".'shownext(paused, next)'."'".', 5000);
	</script>	
	';
				
				}
				else if (strstr($mime, '/ogg')){
					echo '<video autoplay onEnded="shownext(paused,next);" onAbort="shownext(paused,next);"> <source type="'.htmlentities($mime).'" src="./'.$handle.'/data/'.$tokenup.'/'.$token.'"/>No inline media support</video>';
					
					echo '<br/><a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'">Download attached file</a>';
					$nextneeded=true;
					echo '<script>
	setTimeout ('."'".'shownext(paused, next)'."'".', 5000);
	</script>	
	';
				}
				else if (strstr($mime, 'text/html')){
						readfile ('./'.$handle.'/data/'.$tokenup.'/'.$token);
						echo '<script>
	setTimeout ('."'".'shownext(paused, next)'."'".', '.ceil(filesize('./'.$handle.'/data/'.$tokenup.'/'.$token)/12)*(410).');
	</script>	
	';
						$nextneeded=true;
						}
				else if (strstr($mime, 'text/plain')&&
				
						!strstr($token, '.direction.txt')
				
						){
						readfile ('./'.$handle.'/data/'.$tokenup.'/'.$token);
						$nextneeded=true;
						echo '<script>
	setTimeout ('."'".'shownext(paused, next)'."'".', '.ceil(filesize('./'.$handle.'/data/'.$tokenup.'/'.$token)/12)*(410).');
	</script>	
	';
				}
				else if (!strstr($token, '.direction.txt')) {
					echo '<a href="./'.$handle.'/data/'.$tokenup.'/'.$token.'">Download attached file</a>';
					$nextneeded=true;
					echo '<script>
	setTimeout ('."'".'shownext(paused, next)'."'".', 5000);
	</script>	
	';
				}
				echo '</div>';
	}
}
}
}
}

?>
</body>
</html>
