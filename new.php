<?php
$dir = date('Y-m-d_H-i-s');
if (file_exists('./data/')){
mkdir('./data/'.$dir);

echo 'Episode '.$dir.' created'."\n";
}
?>
