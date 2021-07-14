<?php
include_once "config.php";
echo "<br>";
echo "<br>";
if (!is_dir('uploads')) mkdir('uploads');

echo "request body: ";
var_dump($_POST);

echo '<br>';

echo "request method: ";
var_dump($_SERVER['REQUEST_METHOD']);
echo '<br>';


echo "FILES SUPER GLOBAL: ";
var_dump($_FILES);

echo '<br>';
echo '<br>';



function getRandomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

if ($_SERVER['REQUEST_METHOD']==='POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $id = $_POST['id'];
    $id = strtoupper($id);

$image = $_FILES['userimage'];

    $target_dir = "uploads/";
    $randomstr = getRandomString(8);
    $newdir = $target_dir.$randomstr;
    mkdir($newdir);

    if ($image){
        $imagePath = $newdir.'/'.$image['name'];
        $imagePath =  str_replace(' ', '', $imagePath);
        mkdir('../'.$imagePath);
        move_uploaded_file($image['tmp_name'],$imagePath);

    }

$pdo->exec("INSERT INTO users_profile (id,Name ,email,contact,image)  
                     VALUE ('$id','$name','$email','$contact','$imagePath')
                     ");

header('location:index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet"/>
    <title>Products CRUD</title>
</head>
<body>
<h1>Create new Product</h1>
<form method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" >
    </div>

    <div class="form-group">
        <label for="id">ID</label>
        <input maxlength="10" type="text" name="id" class="form-control" >
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label>Contact</label>
        <input  type="number" name="contact" class="form-control" ">
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="userimage" class="form-control-file">
    </div>

    <a href="index.php">
        <button type="submit"  class="btn btn-primary">Submit</button>
    </a>



</form>

</body>
</html>