<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Lost And Found</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href='cssfile/style_disp_searchtry.css' />
  </head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "index.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<div class="search">
    <div class="choose">
        <a  href="disp_lost.php">
        <button class= "lostitems"><a1>Lost</a1>
        </button>
        </a>
        <a href="disp_found.php">
        <button class= "founditems"><a1>Found</a1>
        </button>
        </a>
    </div><!--choose-->
    <form action=disp_search.php method="post" >
    <div class="searchbox">
      <input type="text" name="search" placeholder="search..." > 
      <input type="submit" name="submit" value="Search">
    </div><!--searchbox-->
    </form><!--disp_search-->
</div><!--search-->

<div class = "middle">
<main>
  <?php
  if(isset($_POST["submit"])){
    $str=$_POST["search"];
    $sth=mysqli_query($mysqli, "Select * from found_items WHERE post_type LIKE '%".$str."%' OR name LIKE '%".$str."%' OR sub_cat LIKE '%".$str."%' OR item_descp LIKE '%".$str."%' OR loc LIKE '%".$str."%' OR date LIKE '%".$str."%' UNION ALL SELECT * FROM lost_items WHERE post_type LIKE '%".$str."%' OR name LIKE '%".$str."%' OR sub_cat LIKE '%".$str."%' OR item_descp LIKE '%".$str."%' OR loc LIKE '%".$str."%' OR date LIKE '%".$str."%'" );
    while($row=mysqli_fetch_assoc($sth)){?>
    
      <div class="card"> 
        <div class="caption">
          <div class="id_trans">
            <?php echo $row["post_type"];?>
            <?php echo '<div class="id"> '. $row["id"] . '</div>';?>
          </div>
          <p class="sub"><?php echo $row["sub_cat"]; ?></p>
          <p class="item"><?php echo 'Item Description: '.$row["item_descp"]; ?></p>
          <p class="loc"><?php echo 'Location: '.$row["loc"]; ?></p>
          <p class="date"><?php echo 'Date: '.$row["date"]; ?></p>
        </div><!--caption-->
        <div class="seemore">
          <?php 
            $id=$row['id'];
            $post_type= $row['post_type'];

            if($id && $post_type=='Found'){
              $sql = "SELECT * FROM found_items WHERE id = $id";
              echo '<div class="see"> '. "<a href='seemorefound.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>" . '</div>';
            } else if($id && $post_type=='Lost'){
              $sql = "SELECT * FROM lost_items WHERE id = $id";
              echo '<div class="see"> '. "<a href='seemorelost.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>" . '</div>';
            }
          ?>
        </div>
      </div><!--card-->
    
      
    <?php
    }
  } if (mysqli_num_rows($sth) == 0){?>
    <div class="noresult"> 
        <img src="photo/noresult.png" alt=""> 
      </div><!--navbar-->
      <div class="sorry"><?php echo "Sorry! No Result Found.";?></div>
     
  <?php
  }
    ?>
</main>
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