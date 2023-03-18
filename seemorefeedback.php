<?php
require_once 'db.php';
$sql='SELECT * FROM feedback';
$all_feedback = $mysqli->query($sql);

$count=1;
$results_per_page=6;

$query="select * from feedback";
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

$query = "SELECT * FROM feedback LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($mysqli, $query);  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>List of Lost Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href='cssfile/style_seemorefeedback1.css' />
</head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "index.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<div class="title">
  Feedback
</div>

<div class="box">

<div class="page">
<?php
$count++;
if($page>=2) {   
  echo "<ab><a href='seemorefeedback.php?page=".($page-1)."'>  Prev </a></ab>";   
}       
             
for ($i=1; $i<=$number_of_page; $i++) {   
  if ($i == $page) {   
        $pagLink .= "<ab><a class = 'active' href='seemorefeedback.php?page=".$i."'>".$i." </a></ab>";   
    }               
    else  {   
        $pagLink .= "<ab><a href='seemorefeedback?page=".$i."'>".$i." </a></ab>";     
    }   
};     
echo $pagLink;   

if($page<$number_of_page){   
    echo "<ab><a href='seemorefeedback?page=".($page+1)."'>  Next </a></ab>";   
}  
?>
</div><!--page-->

<main>
<?php
while($row= mysqli_fetch_assoc($result)){
?>
<div class="card"> 
  <div class="caption">
  <div class="id_trans">
    <?php echo '<div class="id"> '. $row["id"] . '</div>';?>
</div>
    <p class="comment"><?php echo $row["comment"]; ?></p>
    <p class="name"><?php echo '-'. $row["name"]; ?></p>
  </div><!--caption-->
  </div><!--card-->
<?php 
}
?>
</main>


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
    © 2023 INSTAFOUND, All rights reserved.
  </div><!--credits-->
</div><!--footer-->
</body>
</html>