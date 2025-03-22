<?php

$id = $_GET['id'];

$file = file_get_contents("users.txt");

$file = explode("\n",$file);
$index = 0;
foreach($file as $line){
    if ($line[0] == $id){
        unset($file[$index]);
        break;
    }
    $index += 1;
}
$file = implode("\n",$file);
file_put_contents("users.txt",$file);
header("location:allusers.php");
