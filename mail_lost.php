<?php
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$loc = $_POST['loc'];
$cat = $_POST['cat'];
$sub_cat = $_POST['sub_cat'];
$item_descp = $_POST['item_descp'];
$post_type="Lost";
$username = "root";
$password = "";
$database = "instafound";


$con=mysqli_connect('localhost',$username,$password);
mysqli_select_db($con,$database) or die ("Unable to select database");

if(isset($_POST['new']) && $_POST['new']==1){
		$query = "INSERT INTO lost_items VALUES ('','$name','$email', '$date', '$loc', '$cat', '$sub_cat', '$item_descp','$post_type')";
		mysqli_query($con,$query);
	}

mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
<link rel="stylesheet" type="text/css" href="cssfile/style_feedback2.css" />
  <title>Thank You</title>
</head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "index.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<div class="container">
<div class="thankicon"><img src="icon/thankyou.png" alt=""></div>
<p class="thank">Thank you!</p><br/>
<p class="text">Your found item has been reported successfully </p>
</div>

<!--footer-->
<div class= "footer " >
  <div class="footer1 space-around">
    <div class="aboutus ">
      <a style="text-decoration: none" href = 'aboutus.php'> About Us</a>
    </div><!--aboutus-->
    <div class="terms">
    <a style="text-decoration: none" href = 'terms.php'>Terms</a>
    </div><!--terms-->
    <div class="privacy">
    <a style="text-decoration: none" href = 'privacy.php'>Privacy</a>
    </div><!--privacy-->
    <div class="feedback">
    <a style="text-decoration: none" href = 'feedback.php'>Feedback</a>
    </div><!--feedback-->
  </div><!--footer1-->
  <br>
  <div class="icon space-around">
    <div class="fb">
      <a href="https://www.facebook.com/trixieangeles05">
      <img src="icon/fb.png" alt=""></a>
    </div><!--fb-->
    <div class="twitter ">
    <a href="https://www.facebook.com/trixieangeles05">
      <img src="icon/twitter.png" alt=""></a>
    </div><!--twitter-->
    <div class="insta ">
    <a href="https://www.facebook.com/trixieangeles05">
      <img src="icon/insta.png" alt=""></a>
    </div><!--insta-->
  </div><!--icon-->
  <br>
  <div class="c">
    <a2>© 2023 INSTAFOUND, All rights reserved.</a2>
  </div><!--credits-->
</div><!--footer-->
</body>
</html>


