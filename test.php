<?php
$folder = 'uploads';


$id = $_POST['id'];
$imageToBeRemoved = $_POST['imagepath'];
$explodedImage = explode('/',$imageToBeRemoved);

//var_dump(str_replace('uploads','',$imageToBeRemoved));
//print_r(getcwd());
unlink($imageToBeRemoved);
rmdir($folder.'/'.$explodedImage[1]);
header('location:index.php');