<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href='cssfile/style_signuppage2.css' />
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $first_name = stripslashes($_REQUEST['first_name']);
        //escapes special characters in a string
        $first_name = mysqli_real_escape_string($mysqli, $first_name);
        $last_name = stripslashes($_REQUEST['last_name']);
        //escapes special characters in a string
        $last_name = mysqli_real_escape_string($mysqli, $last_name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($mysqli, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (first_name, last_name, password, email, create_datetime)
                     VALUES ('$first_name','$last_name', '$password', '$email', '$create_datetime')";
        $result   = mysqli_query($mysqli, $query);
        if ($result) {
            echo "<div class='form1'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form2'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>

    <form class="form" action="" method="post">
    <div class="home">
        <a href = "index.php"><img src="icon/home1.png" alt=""></a></div>
    <div class="logo"><img src="LOGO1.png" alt=""></div>

    <div class="flex space-around">
        <div class="register">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="first_name" placeholder="First name" required />
        <input type="text" class="login-input" name="last_name" placeholder="Last name" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account?<a href="login.php">Login</a></p>
        </div>
        <img src="photo/sign.png" alt="">
    </div>
    </form>
<?php
    }
?>
</body>
</html>