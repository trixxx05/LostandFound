<?php
require_once 'db.php';
session_start();
if(!isset($_SESSION['username'])){

}
$username = "root";
$password = "";
$db_name="instafound";
$con=mysqli_connect('localhost',$username,$password,$db_name);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Lost and Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href='cssfile/style_userlistpostry.css' />
</head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "loginhomepage.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<div class="middle">
<div class="title">
     List of Items You've reported
</div>

<div class="bg-2">
<div class="column">
<div class="lostItem">                                       
  <table class="table table-striped table-bordered table-hover">
  <thead>
      <tr>
        <th>Item</th>
        <th>Item Description</th>
        <th>Location</th>
        <th>Date Lost</th>
      </tr>
    </thead>

<?php
$email=$_SESSION['username'];
$sel_query="SELECT * FROM lost_items WHERE email='$email' UNION ALL SELECT * FROM found_items WHERE email='$email'";
$result = mysqli_query($con,$sel_query);
if($result->num_rows > 0){
  while($row=mysqli_fetch_assoc($result)){?>
  <td align="center"><?php echo $row["sub_cat"]; ?></td>
  <td align="center"><?php echo $row["item_descp"]; ?></td>
  <td align="center"><?php echo $row["loc"]; ?></td>
  <td align="center"><?php echo $row["date"]; ?></td>

  </tr>
<?php
}
}
if (mysqli_num_rows($result) == 0){?>
  <div class="noresult"> 
      <img src="photo/noresult.png" alt=""> 
    </div><!--navbar-->
    <div class="sorry"><?php echo "Sorry! No Result Found.";?></div>
   
<?php
}
  ?>
	</table>
  </div><!--lostItem-->
  </div><!--column-->
</div><!-- bg-2-->

</div><!--middle-->
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
    © 2023 INSTAFOUND, All rights reserved.
  </div><!--credits-->
</div><!--footer-->
</body>
</html>