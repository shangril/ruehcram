<?php
unset($_SESSION['nodisplay']);

if (!isset ($_GET['media'])){
	$_SESSION['nodisplay']['media']=true;
}
if (!isset ($_GET['text'])){
	$_SESSION['nodisplay']['text']=true;
}
if (!isset ($_GET['picture'])){
	$_SESSION['nodisplay']['picture']=true;
}
if (!isset ($_GET['attachment'])){
	$_SESSION['nodisplay']['attachment']=true;
}
unset($_GET['nodisplay']);
unset($_GET['text']);
unset($_GET['media']);
unset($_GET['picture']);
unset($_GET['attachment']);
include ('./index.php');
?>
