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
$age = strip_tags($_POST['age']);
$school =strip_tags( $_POST['school']);
$email = strip_tags($_POST['email']);
$phone = strip_tags($_POST['phone']);
$desc = strip_tags($_POST['desc']);

$sql = " INSERT INTO `trip`.`trip` (`name`, `age`, `school`, `email`, `phone`, `other`, `dt`) 
        VALUES ('$name', '$age', '$school', '$email', '$phone', '$desc', current_timestamp());";

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
    <title>Welcome To Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="image2.jpg" alt="Powered by Megavision Technologies">
    <div class="container">
        <h1>STUDENT EXAM PORTAL</h1>
        <P>
            Enter your details to access exam portal
        </P>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="date" name="age" id="age" placeholder= "Enter your Date Of Birth">
            <input type="email" name="email" id="email" placeholder="Enter your Email Address">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
            <input type="text" name="school" id="school" placeholder="Enter your School Name">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your School Address">
</textarea>
<button class="submit">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>


</body>

</html>