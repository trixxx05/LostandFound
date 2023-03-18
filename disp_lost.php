<?php
require_once 'db.php';
$sql='SELECT * FROM lost_items';
$all_lost = $mysqli->query($sql);

$count=1;
$results_per_page=6;

$query="select * from lost_items";
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

$query = "SELECT * FROM lost_items LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($mysqli, $query);  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>List of Lost Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href='cssfile/style_disp_lostry.css' />
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
    <div class="searchbox">
      <input type="text" name="search" placeholder="search..." > 
      <input type="submit" name="submit" value="Search">
    </div><!--searchbox-->
  </div><!--search-->
</form><!--disp_search-->

<div class="title">
    List of Lost Items
</div>

<main>
<?php
while($row= mysqli_fetch_assoc($result)){
?>
<div class="card"> 
  <div class="caption">
    <div class="id_trans">
      <?php echo $row["post_type"];?>
      <?php echo '<div class="id"> '. $row["id"] . '</div>';?>
    </div>
    <p class="cat"><?php echo 'Category: '. $row["cat"]; ?></p>
    <p class="item"><?php echo 'Item Description: '.$row["item_descp"]; ?></p>
    <p class="loc"><?php echo 'Location: '.$row["loc"]; ?></p>
    <p class="date"><?php echo 'Date: '.$row["date"]; ?></p>
  </div><!--caption-->
  <div class="seemore">
          <?php 
            $id=$row['id'];
            $post_type= $row['post_type'];
              if($id && $post_type=='Lost'){
              $sql = "SELECT * FROM lost_items WHERE id = $id";
              echo '<div class="see"> '. "<a href='seemorelost.php?id=$id'><img src='icon/seemore.png' alt='See More'></a>" . '</div>';
            }
          ?>
        </div>
  </div><!--card-->
<?php 
}
?>
</main>
<div class="page">
<?php
$count++;
if($page>=2) {   
  echo "<ab><a href='disp_lost.php?page=".($page-1)."'>  Prev </a></ab>";   
}       
             
for ($i=1; $i<=$number_of_page; $i++) {   
  if ($i == $page) {   
        $pagLink .= "<ab><a class = 'active' href='disp_lost.php?page=".$i."'>".$i." </a></ab>";   
    }               
    else  {   
        $pagLink .= "<ab><a href='disp_lost.php?page=".$i."'>".$i." </a></ab>";     
    }   
};     
echo $pagLink;   

if($page<$number_of_page){   
    echo "<ab><a href='disp_lost.php?page=".($page+1)."'>  Next </a></ab>";   
}  
?>
</div><!--page-->
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