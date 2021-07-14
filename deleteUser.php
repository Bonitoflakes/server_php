<?php
include_once "config.php";

$id = $_POST['id'];
$imageToBeRemoved = $_POST['imagepath'];
var_dump(is_string($id));
$statement = "DELETE FROM users_profile WHERE id ='$id'";
//$statement =  "DELETE FROM `users_profile` WHERE `users_profile`.`id`='19-UCA-003'";

var_dump($statement);

$pdo->exec($statement);
echo "User deleted successfully";
header('location:index.php');
