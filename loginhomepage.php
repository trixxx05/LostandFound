<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'instafound';

$mysqli = mysqli_connect($host,$user,$pass,$db) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Lost And Found</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href='cssfile/style_loginhometry.css' />
</head>
<body>
<div class="upper">
<div class="navbar">
      <img src="LOGO1.png" alt="">
      <div class="log">
      <a style="text-decoration: none" href="userlistpost.php"><button class= "buttonlogin">My Post</button></a>
        <a style="text-decoration: none" href="index.php"><button class= "buttonsign"> Sign Out</button></a></div>
    </div><!--navbar-->

  <div class="quote">
    <h3><br>The <a1 style="color: #FFD6BA">Search</a1> for Lost <br>Treasures <a1 style="color: #FFD6BA">Ends Here</a1>
      <br>
      <div class="let">
      <a2>Let us help you recover your lost belongings</a2>
      </div>
      <div class="post">
        <a style="text-decoration: none" href="post_lost.php"><button class= "buttonpost button-block">Post a FREE ad</button></a></div>
    </h3>
    <img src="photo/pic2.png" alt="">
  </div><!--quote-->
</div><!-- upper -->

<!--search-->
<form action=disp_search.php method="post" >
  <div class="search">
    <div class="searchbox">
      <input type="text" name="search" placeholder="search..." > 
      <input type="submit" name="submit" value="Search">
    </div><!--search-->
  </div><!--search-->
</form><!--disp_search-->

<!--categories-->
<div class="middle">
<div class="cat"> 
    <h3>Categories</h3>
    <div class="fthree">
      <div class="phone">
      <a href="electronics.php">
      <img src="icon/phone1.png" alt=""></a>
        <elec>Electronics</elec>
      </div><!--phone-->
      
      <br>
      <div class="clothes">
      <a href="clothes.php">
        <img src="icon/clothes1.png" alt=""></a>
        <cloth>Clothing</cloth>
      </div><!--clothes-->

      <br>
      <div class="lit">
      <a href="literature.php">
        <img src="icon/book1.png" alt=""></a>
        <lit>Literature</lit>
      </div><!--lit-->
</div>
<div class="sthree">
      <br>
      <div class="music">
      <a href="music.php">
        <img src="icon/music1.png" alt=""></a>
        <music>Instruments</music>
        <music1>Musical Instruments</music1>
      </div><!--music-->

      <br>
      <div class="personal">
      <a href="personal.php">
      <img src="icon/personal.png" alt="">
     </a>
        <per>Accessories</per>
        <per1>Personal Accessories </per1>
      </div><!--per-->

      <br>
      <div class="sport">
      <a href="sports.php">
        <img src="icon/ball1.png" alt=""></a>
        <sport>Sports</sport>
        <sport1>Sports Equipment</sport1>
      </div><!--sport-->
</div>
  </div><!--cat-->

<div class="recent">
  <div class= "recentlost">
    <h3>
      <div class="recentlost1">
        Recently Lost <a style="text-decoration: none" href=disp_lost.php>></a>
      </div>
      <div class="lost1">
        <?php
          $id=1;
          $sql = "SELECT id,sub_cat, loc, date , item_descp FROM lost_items WHERE id='$id'";
          $result = $mysqli->query($sql);
          if ($result->num_rows == 1) {
            // output data of each row
            $row = $result->fetch_assoc() ;
            $id=$row["id"];
            echo "Item: ". $row["sub_cat"] ."<br>";
            echo "Location: ". $row["loc"] ."<br>";
            echo "Date: ". $row["date"] ."<br>";
            echo "Description: ". $row["item_descp"];
        ?>
        <div class="a2">
            <?php echo "<a href='seemorelost.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>"?>
        </div>  
        <?php
        }else {
          echo "0 results";
        }
        ?>
      </div><!--lost1-->

      <div class="lost2">
        <?php
          $id=2;
          $sql = "SELECT id,sub_cat, loc, date , item_descp FROM lost_items WHERE id='$id'";
          $result = $mysqli->query($sql);
          if ($result->num_rows == 1) {
            // output data of each row
            $row = $result->fetch_assoc() ;
            $id=$row["id"];
            echo "Item: ". $row["sub_cat"] ."<br>";
            echo "Location: ". $row["loc"] ."<br>";
            echo "Date: ". $row["date"] ."<br>";
            echo "Description: ". $row["item_descp"];
        ?>
        <div class="a2">
            <?php echo "<a href='seemorelost.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>"?>
        </div>  
        <?php
        }else {
          echo "0 results";
        }
        ?>
      </div><!--lost2-->

      <div class="lost3">
        <?php
          $id=3;
          $sql = "SELECT id,sub_cat, loc, date , item_descp FROM lost_items WHERE id='$id'";
          $result = $mysqli->query($sql);
          if ($result->num_rows == 1) {
            // output data of each row
            $row = $result->fetch_assoc() ;
            $id=$row["id"];
            echo "Item: ". $row["sub_cat"] ."<br>";
            echo "Location: ". $row["loc"] ."<br>";
            echo "Date: ". $row["date"] ."<br>";
            echo "Description: ". $row["item_descp"];
        ?>
        <div class="a2">
            <?php echo "<a href='seemorelost.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>"?>
        </div>  
        <?php
        }else {
          echo "0 results";
        }
        ?>
      </div><!--lost3-->
    </h3>
  </div><!--recentlost-->

  <div class= "recentfound">
    <h3>Recently Found<a style="text-decoration: none" href=disp_found.php>></a>
      <div class="found1">
        <?php
        $id=1;
        $sql = "SELECT id, sub_cat, loc, date , item_descp FROM found_items WHERE id='$id'";
        $result = $mysqli->query($sql);
        if ($result->num_rows==1) {
          // output data of each row
          $row = $result->fetch_assoc();  
          $id1=$row["id"];
          echo "Item: ". $row["sub_cat"] ."<br>";
          echo "Location: ". $row["loc"] ."<br>";
          echo "Date: ". $row["date"] ."<br>";
          echo "Description: ". $row["item_descp"] ;
        ?>
        <div class="a3">
            <?php echo "<a href='seemorefound.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>"?>
        </div>  
        <?php
          }else {
          echo "0 results";
        }
        ?>
    </div><!--found1-->

    <div class="found2">
    <?php
        $id=2;
        $sql = "SELECT id, sub_cat, loc, date , item_descp FROM found_items WHERE id='$id'";
        $result = $mysqli->query($sql);
        if ($result->num_rows==1) {
          // output data of each row
          $row = $result->fetch_assoc();  
          $id1=$row["id"];
          echo "Item: ". $row["sub_cat"] ."<br>";
          echo "Location: ". $row["loc"] ."<br>";
          echo "Date: ". $row["date"] ."<br>";
          echo "Description: ". $row["item_descp"] ;
        ?>
        <div class="a3">
            <?php echo "<a href='seemorefound.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>"?>
        </div>  
        <?php
          }else {
          echo "0 results";
        }
        ?>
    </div><!--found2-->

    <div class="found3">
    <?php
        $id=3;
        $sql = "SELECT id, sub_cat, loc, date , item_descp FROM found_items WHERE id='$id'";
        $result = $mysqli->query($sql);
        if ($result->num_rows==1) {
          // output data of each row
          $row = $result->fetch_assoc();  
          $id1=$row["id"];
          echo "Item: ". $row["sub_cat"] ."<br>";
          echo "Location: ". $row["loc"] ."<br>";
          echo "Date: ". $row["date"] ."<br>";
          echo "Description: ". $row["item_descp"] ;
        ?>
        <div class="a3">
            <?php echo "<a href='seemorefound.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>"?>
        </div>  
        <?php
          }else {
          echo "0 results";
        }
        ?>
    </div><!--found3-->
    </h3>
  </div><!--recentfound-->
  </div><!--recent-->
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