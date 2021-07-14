<?php /** @noinspection ALL */
include_once "config.php";
$sql = 'SELECT * FROM users_profile ORDER BY name';

$statement = $pdo->query($sql);
//var_dump($stmt);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
//The result is an array of objects. a.k.a an array of hashmaps



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css" type="text/css">
    <title>Hello, world!</title>
  </head>
  <body>
  <h1>USERS CRUD</h1>


  <a href="createUser.php" class="btn btn-success ">Create User</a>


  <table class="table my-3 table-striped table-info table-hover">
      <thead>
      <tr class="table-danger">
          <th scope="col">#ID</th>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Contact</th>
          <th scope="col">Actions</th>
      </tr>
      </thead>
      <tbody>

      <?php

      foreach ($result as $key => ['id' => $id , 'Name' => $name, 'email'=>$email,'contact'=>$contact, 'image'=>$image ]){
          print("
      <tr>
          <th scope='row'> $id </th>
          <td>
          <img class='customimg' src=$image>
          </td>
          <td>$name</td>
          <td>$email</td>
          <td>$contact </td>
          <td>
              <form method='post' style='display: inline-block' action='updateUser.php'>
          <input type='hidden' name='id' value=$id>
          <button type='submit' class='btn btn-dark'>Edit</button>
          </form>
          
          <form method='post' style='display: inline-block' action='deleteUser.php'>
          <input type='hidden' name='id' value=$id>
          <input type='hidden' name='imagePath' value='$image'>
          <button type='submit' class='btn btn-danger'>Delete</button>
          </form>
          
          </td>

      </tr>");
      }
      ?>




      </tbody>
  </table>


  </body>
</html>

