<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
require "db_connection.php";
// When form submitted, insert values into the database.
if (isset($_REQUEST["email"])) {
    // removes backslashes
    $name = stripslashes($_REQUEST["name"]);
    //escapes special characters in a string
    $name = mysqli_real_escape_string($con, $name);
    $age = stripslashes($_REQUEST["age"]);
    $age = mysqli_real_escape_string($con, $age);
    $school = stripslashes($_REQUEST["school"]);
    $school = mysqli_real_escape_string($con, $school);
    $email = stripslashes($_REQUEST["email"]);
    $email = mysqli_real_escape_string($con, $email);
    $phone = stripslashes($_REQUEST["phone"]);
    $phone = mysqli_real_escape_string($con, $phone);
    $pswd = stripslashes($_REQUEST["pswd"]);
    $pswd = mysqli_real_escape_string($con, $pswd);
    $cpswd = stripslashes($_REQUEST["cpswd"]);
    $cpswd = mysqli_real_escape_string($con, $cpswd);
    if ($pswd != $cpswd) {
        echo '<script type="text/javascript">
                window.onload = function () { 
                    alert("Password Doesnt Match");
                    
                } 
            </script>';
        echo "<div class='form'>
                  
                  <p class='link'>Click here to <a href='register.php'>register again</a> again.</p>
                  </div>";
    } else {
        $uppercase = preg_match("@[A-Z]@", $pswd);
        $lowercase = preg_match("@[a-z]@", $pswd);
        $number = preg_match("@[0-9]@", $pswd);
        $specialChars = preg_match("@[^\w]@", $pswd);
        if ($uppercase || $lowercase || $number || $specialChars || strlen($password) > 8) {
            $checkEmail = mysqli_query($con, "SELECT * FROM exam.registration WHERE email = '" . $_POST["email"] . "'");
            $checkPhone = mysqli_query($con, "SELECT * FROM exam.registration WHERE phone = '" . $_POST["phone"] . "'");
            if (mysqli_num_rows($checkEmail) != 0 || mysqli_num_rows($checkPhone) != 0) {
                echo '<script type="text/javascript">
                window.onload = function () { 
                    alert("Phone Number OR Email Id Already Exists");
                    
                } 
            </script>';

            echo "<div class='form'>
                  
            <p class='link'>Click here to <a href='register.php'>register again</a> again.</p>
            </div>";
            
            } else {
                $query = "INSERT into `registration` (name, age, school, email, phone, pswd, dt)
                     VALUES ('$name', '$age', '$school', '$email', '$phone', '" . md5($pswd) . "', current_timestamp());";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
                } else {
                    echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
                }
            }
        } else {
            echo '<script type="text/javascript">
                window.onload = function () { 
                    alert("Password Should contain atleast 1 Special Character,Number,Upper and Lowercase Letter And Should be greater than 8 character");
                    
                } 
            </script>';

            echo "<div class='form'>
                  
            <p class='link'>Click here to <a href='register.php'>register again</a> again.</p>
            </div>";
        }
    }
} else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" required />
        <input type="date" class="login-input" name="age" placeholder= "Enter your Date Of Birth">
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
        <input type="phone" class="login-input" name="phone" placeholder="Phone Number" required>
        <input type="text" class="login-input" name="school" placeholder="Enter your School Name">
        <input type="password" class="login-input" name="pswd" placeholder="Password">
        <input type="password" class="login-input" name="cpswd" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    
<?php
}
?>

</body>
</html>