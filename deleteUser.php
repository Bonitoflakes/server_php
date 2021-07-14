<?php
include_once "config.php";

$id = $_POST['id'];
$folder = 'uploads';
$imageToBeRemoved = $_POST['imagepath'];
$explodedImage = explode('/',$imageToBeRemoved);

//var_dump(str_replace('uploads','',$imageToBeRemoved));
//print_r(getcwd());
unlink($imageToBeRemoved);
rmdir($folder.'/'.$explodedImage[1]);

$statement = "DELETE FROM users_profile WHERE id ='$id'";


$pdo->exec($statement);
echo "User deleted successfully";
header('location:index.php');
