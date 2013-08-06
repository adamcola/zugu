<?php

$name = $_POST['name'];
$email = $_POST['email'];

$fp = fopen("data.txt","a");

if(!$fp) {
    echo 'Error: Cannot open file.';
    exit;
}

fwrite($fp, $name."||".$email."\n");

fclose($fp);
?>