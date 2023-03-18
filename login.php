<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Lost and Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href='cssfile/style_loginpage2.css' />
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $username = mysqli_real_escape_string($mysqli, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$email'
                     AND password='$password' ";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

            $_SESSION['username'] = $row['email'];
            // Redirect to user dashboard page
            header("Location: loginhomepage.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>

    <form method="post" name="login">
    <div class="home"><a href = "index.php"><img src="icon/home1.png" alt=""></a></div>
    <div class="logo"><img src="LOGO1.png" alt=""></div>
    <div class="flex space-around">
    
        <div class="login">
        <h1 class="login-title"> Login</h1>
        <input type="text" class="login-input" name="email" placeholder="email" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an a account?<a href="signup.php">Sign Up</a></p>
        </div>
        <img src="photo/logpic1.png" alt="">
    </div>
    </form>
<?php
    }
?>
</body>
</html>