<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db_connection.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $pswd = stripslashes($_REQUEST['pswd']);
        $pswd = mysqli_real_escape_string($con, $pswd);
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE pswd='" . md5($pswd) . "' AND email='$email'";
        $result = mysqli_query($con, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            // Redirect to user dashboard page
            header("Location: adminDashBoard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect email/password.</h3><br/>
                  <p class='link'>Click here to <a href='adminLogIn.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Admin Login</h1>
        <input type="email" class="login-input" name="email" placeholder="Email Address" autofocus="true"/>
        <input type="password" class="login-input" name="pswd" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register.php">New Registration</a></p>
        <p class="link"><a href="login.php">Student Login</a></p>
  </form>
<?php
    }
?>
</body>
</html>
