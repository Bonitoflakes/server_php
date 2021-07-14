<?php

$host = 'localhost';
$dbname = 'users_crud';
$dsn = "mysql:dbname=$dbname;host=$host";
$user = "root";
$password = "";

try {
//    DB connection
    $pdo = new PDO($dsn, $user, $password);

//    Enabling error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    Default fetch mode set to object
//    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    echo "CONNECTED TO DB SUCCESSFULLY!";
//
}
catch (PDOException $error){
    echo "CONNECTION FAILED!".$error->getMessage();
}


