<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'instafound';

$mysqli = mysqli_connect($host,$user,$pass,$db) or die($mysqli->error);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Lost and Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href='cssfile/style_seemorelostry.css' />
</head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "loginhomepage.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<div class="flex">
<div class="box">
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
        $sql = "SELECT id, cat, sub_cat, loc, date , item_descp, email FROM lost_items WHERE id='$id'";
        $result = $mysqli->query($sql);
        if ($result->num_rows == 1) {
          // output data of each row
        $row = $result->fetch_assoc();
        $email = $row['email'];
        ?>
        <div class="caption">
        <p class="lost"><?php echo "LOST" ."<br>";?></p>
        <p class="sub"><?php echo $row["sub_cat"] ."<br>";?></p>
        <p class="loc"><?php echo "Category: " .$row["cat"] ."<br>";?></p>
        <p class="loc"><?php echo "Location: " .$row["loc"] ."<br>";?></p>
        <p class="date"><?php echo "Posted last " .$row["date"] ."<br>";?></p>
        <p class="item"><?php echo $row["item_descp"];?></p>
        </div>  
        <?php  
      }
  ?>
</div><!--box-->

<div class="box2">
  <p class="contact"><?php echo "Contact Owner" ."<br>";?></p>
  <p class="message"> <?php echo "<a href='try.php?id=$id'> Send Message </a>"?></p>
  <div class="top-border">
  </div>

  <p class="feed"><?php echo "FeedBack" ."<br>";?></p>
  <textarea class="comment" rows="10" cols="10" name="comment" placeholder="Comment"></textarea>
  <p class="statement">
  Your feedback is valuable to us, and we appreciate you taking the time to share your thoughts. Your comments will help us improve our service, experience and ensure that we are meeting your needs. Thank you for your contribution.
  </p>
  <p class="submit"><a href="message.php"><?php echo "Submit";?></a></p>

</div><!--box2-->

</div><!--flex-->

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