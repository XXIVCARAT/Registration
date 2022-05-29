
<?php
$insert = false;

if(isset($_POST['name'])){

//set connection variables
$server = "localhost";
$username = "root";
$password = "";

//Create a Database connection
$con = mysqli_connect($server,$username,$password);
//if connection success
if(!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
}
// echo "Successful Connection";

$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);

$sql = " INSERT INTO `login`.`login` (`name`, `email`) 
        VALUES ('$name', '$email');";

//echo $sql;
// Execute the query
if($con -> query($sql)==true){
   // echo "Succesfully Inserted";

   // Flag for successful insertion
   $insert = true;
}
else{
    echo "ERROR : $sql <br> $con ->error";
}

    // Close the database connection
$con -> close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   <?php
        require 'partials/_nav.php'
    ?>
<div class="container">
    <h1>Please login to access your account</h1>

    <form action="login.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="email" name="email" id="email" placeholder="Enter your Email Address">
            <input type="password" name="pswd" id="pswd" placeholder="Enter your password">
           
<button class="submit">Submit</button>

        </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>