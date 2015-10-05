<?php
if (file_exists('./'.str_replace('./','', $_GET['getmtime']))){
	echo filemtime($_GET['getmtime']);
}
else {
	echo 0;
}
?>
