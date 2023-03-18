<?php
require_once 'db.php';
$count=1;
$results_per_page=6;

$query="SELECT * from found_items WHERE cat = 'Literature' UNION ALL SELECT * FROM lost_items WHERE cat = 'Literature' ";
$result = mysqli_query($mysqli, $query);  
$number_of_result = mysqli_num_rows($result); 

$number_of_page = ceil ($number_of_result /$results_per_page);  
$pagLink = "";  

if (!isset ($_GET['page']) ) {  
  $page = 1;  
} else {  
  $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  
$sel="SELECT * from found_items WHERE cat = 'Literature' UNION ALL SELECT * FROM lost_items WHERE cat = 'Literature' ";
$query1 = $sel . "LIMIT " . $page_first_result . ',' . $results_per_page;  
$result1= mysqli_query($mysqli, $query1);  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href='cssfile/style_litry.css' />
</head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "index.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<!--search-->
<form action=disp_search.php method="post" >
  <div class="search">
  <select class="subcat" name="subcat" placeholder="Category" onchange="location = this.value;">
      <option value=""disabled selected hidden>Category </option>
      <option value="electronics.php">Electronics </option>
      <option value="clothes.php">Clothing </option>
      <option value="music.php">Musical Instruments </option>
      <option value="personal.php">Personal Accessories</option>
      <option value="sports.php">Sporting Equipment</option>
    </select>
    <div class="searchbox">
      <input type="text" name="search" placeholder="search..." > 
      <input type="submit" name="submit" value="Search">
    </div><!--search-->
  </div><!--search-->
</form><!--disp_search-->

<div class="title">
    Literature
</div>

<div class="page">
<?php
$count++;
if($page>=2) {   
  echo "<ab><a href='literature.php?page=".($page-1)."'>  Prev </a></ab>";   
}       
             
for ($i=1; $i<=$number_of_page; $i++) {   
  if ($i == $page) {   
        $pagLink .= "<ab><a class = 'active' href='literature.php?page=".$i."'>".$i." </a></ab>";   
    }               
    else  {   
        $pagLink .= "<ab><a href='literature.php?page=".$i."'>".$i." </a></ab>";     
    }   
};     
echo $pagLink;   

if($page<$number_of_page){   
    echo "<ab><a href='literature.php?page=".($page+1)."'>  Next </a></ab>";   
}  
?>
</div><!--page-->


<?php
while($row=mysqli_fetch_assoc($result1)){?>
<main>
 <div class="card"> 
  <div class="caption">
  <div class="id_trans">
      <?php echo $row["post_type"];?>
      <?php echo '<div class="id"> '. $row["id"] . '</div>';?>
    </div>
    <p class="sub"><?php echo 'Sub Category: '.$row["sub_cat"]; ?></p>
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
  </main>
  <?php
}
if (mysqli_num_rows($result1) == 0){?>
  <div class="noresult"> 
      <img src="photo/noresult.png" alt=""> 
    </div><!--navbar-->
    <div class="sorry"><?php echo "Sorry! No Result Found.";?></div>
   
<?php
}
  ?>


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