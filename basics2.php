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

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = " INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

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
    <img class="bg" src="image.jpg" alt="VJTI MUMBAI">
    <div class="container">
        <h1>WELCOME TO VJTI MUMBAI</h1>
        <P>
            Enter your details to confirm your admission and submit this form
        </P>
        <?php
        if($insert == true)
        {
        echo "<p class='SubmitMsg'>Thanks for submitting the form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gander" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information">
</textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>


</body>

</html>