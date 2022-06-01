<?php
$insert = false;

if(isset($_POST['name'], $_POST['email'], $_POST['pswd'], $_POST['cpswd'])){
            if($_POST['pswd']!=$_POST['cpswd']) {
echo"Passwords don't match";
            }
            else{
   
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
$pswd = strip_tags($_POST['pswd']);
$cpswd = strip_tags($_POST['cpswd']);

//query to pull rows which have email id equal to entered email id
$queryCheckEmail = mysqli_query($con ,"SELECT * FROM trip.trip WHERE email = '".$_POST['email']."'"); 

//query to pull rows which have phone number equal to entered email id
$queryCheckPhone = mysqli_query($con ,"SELECT * FROM trip.trip WHERE phone = '".$_POST['phone']."'");

  if (mysqli_num_rows($queryCheckEmail) != 0) //if no. of rows with emailid != 0 ; if statement executed
  {
      echo "Email Id already exists";
  }
  
  else if (mysqli_num_rows($queryCheckPhone) != 0) //if no. of rows with phone != 0 ; if statement executed
  {
      echo "Phone Number already exists";
  }

  else //only executed when there is no duplicate email and phone no.
  {
             $sql = " INSERT INTO `trip`.`trip` (`name`, `age`, `school`, `email`, `phone`, `other`, `pswd`,`cpswd`,`dt`) 
                     VALUES ('$name', '$age', '$school', '$email', '$phone', '$desc', '$pswd', '$cpswd', current_timestamp());";
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

                 echo "You have successfuly registered";

}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Added later for nav bar -->
<?php
        require 'partials/_nav.php'
    ?>

    <div class="container">
        <h1>STUDENT EXAM REGISTRATION PORTAL</h1>
        <P>
            Enter your details to access exam portal
        </P>

        <form action="register.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="date" name="age" id="age" placeholder= "Enter your Date Of Birth">
            <input type="email" name="email" id="email" placeholder="Enter your Email Address">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
            <input type="text" name="school" id="school" placeholder="Enter your School Name">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your School Address">
</textarea>
<input type="password" name="pswd" id="pswd" placeholder="Please choose a password">
<input type="password" name="cpswd" id="cpswd" placeholder="Re-type to confirm your password">
<button class="submit">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>


</body>

</html>
