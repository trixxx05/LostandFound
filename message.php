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
  <link rel="stylesheet" type="text/css" href='cssfile/style_message2.css' />
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
<div class="details">
    <a2>Contact</a2>

    <a3>
    <?php
        $id = isset($_GET['id']) ? $_GET['id'] : null;  
        $sql = "SELECT id,sub_cat,email,item_descp FROM lost_items WHERE id='$id'";
        $result = $mysqli->query($sql); 
        if ($result->num_rows == 1) {
          // output data of each row
        $row = $result->fetch_assoc();
        ?>
        <div class="caption">
        <p class="sub"><?php echo "Send a message related to ". $row["sub_cat"] ."<br>";?></p>
        </div>  
        <?php  
      }
    ?>
    </a3>
</div><!--details-->

<form action=" " method="post">
<input type="hidden" name="new" value="1"/>
<div class="info"> 
    <a3>Name:</a3>
    <br>
    <input type="text" class="name" name="name" placeholder="Name" autofocus="true"/>
    <br>
    <a3>Email:</a3>
    <br>
    <input type="text" class="email_sender" name="email_sender" placeholder="Email" autofocus="true"/>
    <br>
    <a3>Brief Description:</a3>
    <br>
    <textarea class="des" rows="20" cols="10" name="des" placeholder="Description"></textarea>
</div><!--info-->

<div class="cancel_save">
    <input type="submit" class="save" name = "submit" value="SUBMIT">
    <?php if (! empty($message)) {?>
      <div class='success'>
        <strong><?php echo $message; ?>	</strong>
      </div>
      <?php } ?>
</div><!--cancel_save-->
</form>
</div>
<img src="photo/message.png" alt="">
</div>

<?php
  if (!empty($_POST["submit"])) {
    $name = $_POST['name'];
    $email_sender= $_POST['email_sender'];
    $des = $_POST['des'];
    
    $username = "root";
    $password = "";
    $database = "instafound";
    $con=mysqli_connect('localhost',$username,$password);
    mysqli_select_db($con,$database) or die ("Unable to select database");
    
    $id = isset($_GET['id']) ? $_GET['id'] : null;  
    $sql = "SELECT id,sub_cat,email,item_descp FROM lost_items WHERE id='$id'"; 
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $email_rec=$row['email'];
    $item_descp=$row['item_descp'];
    
    if(isset($_POST['new']) && $_POST['new']==1){
            $query = "INSERT INTO sendmessage VALUES ('','$name', '$email_sender', '$des', '$email_rec', '$item_descp')";
             mysqli_query($con,$query);
            
        }

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
    <a2>© 2023 INSTAFOUND, All rights reserved.</a2>
  </div><!--credits-->
</div><!--footer-->
</body>
</html>