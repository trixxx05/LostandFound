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
    <link rel="stylesheet" type="text/css" href='cssfile/style_feedbacktry.css' />
</head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "index.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<div class="middle space-around">

<form action="mail_feedback.php" method="post">
<input type="hidden" name="new" value="1"/>
<div class="box2">
  <p class="feed"><?php echo "FeedBack" ."<br>";?></p>

  <input type="text" class="name" name="name" placeholder="Name"/></br>
  <input type="text" class="email" name="email" placeholder="Email" autofocus="true"/>
  <textarea class="comment" rows="10" cols="10" name="comment" placeholder="Comment"></textarea>
  <p class="statement">
  Your feedback is valuable to us, and we appreciate you taking the time to share your thoughts. Your comments will help us improve our service, experience and ensure that we are meeting your needs. Thank you for your contribution.
  </p>
  <input type="submit" class="submit" name = "submit" value="SUBMIT">

</div><!--box2-->
</form>

<div class="box3">
  <p class="some">Read what our users say</p>
  <div class = "f1">
  <?php
        $sql = "SELECT comment FROM feedback WHERE id='1'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>

            <?php echo ' " '. $row["comment"]. ' " '."<br>"?>
          <?php
          }

        } else {
          echo "No result found";
        }
        ?>
</div><!--f1-->
<div class = "f1name">
  <?php
        $sql = "SELECT name FROM feedback WHERE id='1'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <?php echo $row["name"] ."<br>"?>
          <?php
          }
        } else {
          echo "No result found";
        }
        ?>
</div><!--f1name-->
<div class = "f2">
  <?php
        $sql = "SELECT name, comment FROM feedback WHERE id='2'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <?php echo ' " '. $row["comment"]. ' " '."<br>"?>
          <?php
          }

        } else {
          echo "No result found";
        }
        ?>
</div><!--f2-->
<div class = "f2name">
  <?php
        $sql = "SELECT name FROM feedback WHERE id='2'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <?php echo $row["name"] ."<br>"?>
          <?php
          }
        } else {
          echo "No result found";
        }
        ?>
</div><!--f2name-->
<div class = "f3">
  <?php
        $sql = "SELECT name, comment FROM feedback WHERE id='3'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <?php echo ' " '. $row["comment"]. ' " '."<br>"?>
          <?php
          }

        } else {
          echo " ";
        }
        ?>
</div><!--f3-->
<div class = "f3name">
  <?php
        $sql = "SELECT name FROM feedback WHERE id='3'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <?php echo $row["name"] ."<br>"?>
          <?php
          }
        } else {
          echo " ";
        }
        ?>
</div><!--f3name-->
<div class="see"><a href="seemorefeedback.php"><img src="icon/seemore.png" alt="See More"></a></div>
</div><!--box3-->
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