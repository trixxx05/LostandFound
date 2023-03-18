<?php
error_reporting(E_ALL ^ E_WARNING); 
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$loc = $_POST['loc'];
$cat = $_POST['cat'];
$sub_cat = $_POST['sub_cat'];
$item_descp = $_POST['item_descp'];
$post_type = "Lost";

$username = "root";
$password = "";
$database = "instafound";
$con=mysqli_connect('localhost',$username,$password);
mysqli_select_db($con,$database) or die ("Unable to select database");
if($name != "") {
	$query = "INSERT INTO lost_items VALUES ('$name', '$email', '$date', '$loc', '$cat', '$sub_cat', '$item_descp', '$post_type')";
  mysqli_query($con,$query);
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Lost And Found</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href='cssfile/style_postlost5.css' />
<script>
function populate1(s1,s2) {

var s1 = document.getElementById(s1);

var s2 = document.getElementById(s2);

s2.innerHTML = "";

if(s1.value == "Electronics") {
  var optionArray = ["|", "Camera|Camera", "Cellular Phone|Cellular Phone","Laptop Adapters|Laptop Adapters","Computers/Tablets|Computers/Tablets","Video Game Systems|Video Game Systems","Pendrive|Pendrive","External Hard Drive|External Hard Drive","Mobile Adapters|Mobile Adapters","Calculator|Calculator","Wrist Watch|Wrist Watch","Powerbank|Powerbank","Earphones/Headphones|Earphones/Headphones","Others|Others"];
}
else if(s1.value == "Clothing") {
  var optionArray = ["|", "Shirt/T-shirt|Shirt/T-shirt", "Undergarment|Undergarment","Jeans/Pants|Jeans/Pants","Hat|Hat","Shoes|Shoes","Assorted Cloth|Assorted Cloth","Socks|Socks","Sweater/Sweatshirt|Sweater/Sweatshirt","Blazzer/Suit|Blazzer/Suit", "Other|Others"]; 
}
else if(s1.value == "Literature") {
  var optionArray = ["|", "Library Books|Library Books", "Notebooks|Notebooks", "Correspondence|Correspondence", "Diaries|Diaries", "Letters|Letters", "Yearbooks|Yearbooks", "Magazines|Magazines", "Others|Others"];
}
else if(s1.value == "Musical Instrument") {
  var optionArray = ["|", "Guitar|Guitar", "Flute|Flute", "Drums|Drums", "Tambourine|Tambourine", "Clarinet|Clarinet", "Microphone|Microphone", "Others|Others"];
}
else if(s1.value == "Personal Accessories") {
  var optionArray = ["|", "Credit/Debit Cards|Credit/Debit Cards", "Money|Money", "ID Cards/Licenses/Passports|ID cards/Licenses/Passports", "Wallet|Wallet", "Spectacles/Sunglasses|Spectacles/Sunglasses", "Bracelet|Bracelet", "Chains/Necklaces|Chains/Necklaces", "Bag|Bag", "Others|Others"];
}
else if(s1.value == "Sporting Goods") {
  var optionArray = ["|", "Shoes|Shoes", "Socks|Socks", "Balls|Balls", "Bat|Bat", "Jersey|Jersey", "Racket|Racket","Boxing Gloves|Boxing GLoves", "Chess|Chess","Drink Container|Drink Container","Whistles|Whistles","Cones|Cones","Others|Others"];
}

for(var option in optionArray) {

  var pair = optionArray[option].split("|");

  var newOption = document.createElement("option");

  newOption.value = pair[0];

  newOption.innerHTML = pair[1];

  s2.options.add(newOption);

    }
}

</script>
</head>
<body>
<div class="upper">
    <div class="navbar">
    <a href = "index.php"> 
    <div class="home"><img src="icon/home1.png" alt=""></div></a>
      <img src="LOGO1.png" alt="">
    </div><!--navbar-->
</div><!-- upper -->

<div class="flex space-around">
<div class="box">
<div class="details">
    <a2>Details</a2>
    <br>
    <a3>A detailed summary and description will make it easier for others to identify your item.</a3>
</div><!--details-->

<div class="choose">
    <a href="post_lost.php">
    <button class= "buttonlost"><a1>Lost</a1>
        <br>
        <a2>Report something lost</a2>
    </button>
    </a>
    <a href="post_found.php">
    <button class= "buttonfound"><a1>Found</a1>
        <br>
        <a2>Report something found</a2>
    </button>
    </a>
</div><!--choose-->
<form action="mail_lost.php" method="post">
<div class="info">
<input type="hidden" name="new" value="1"/>
    <a3>Name:</a3>
    <br>
    <input type="text" class="name" name="name" placeholder="Name" autofocus="true"/>
    <br>
    <a3>Email:</a3>
    <br>
    <input type="text" class="email" name="email" placeholder="Email" autofocus="true"/>
    <br>
    <a3>Date:</a3>
    <br>
    <input type="date" class="date" name="date" placeholder="Date" autofocus="true"/>
    <br>
    <a3>Last Seen Location:</a3>
    <br>
    <select class="loc" name="loc" placeholder="Location" required >
      <option value=""> </option>
      <option value="Main Cafeteria">Main Cafeteria </option>
      <option value="Library">Library </option>
      <option value="Wellness building">Wellness building </option>
      <option value="TED Building">TED Building </option>
      <option value="Estolas Building">Estolas Building</option>
      <option value="Profeta Building">Profeta Building </option>
      <option value="R&D Building">R&D Building  </option>
      <option value="Gymnasium">Gymnasium </option>
      <option value="Chapel">Chapel </option>
      <option value="Clinic">Clinic </option>
      <option value="Computer Laboratory">Computer Laboratory </option>
      <option value="Guidance and Counceling Center">Guidance and Counceling Center</option>
      <option value="Quadrangle">Quadrangle </option>
      <option value="Others">Others </option>
    </select>
    <br>
    <div class="category">
        <div class="cate">
        <a3>Category:</a3>
        <br>
        <select id="cat" class="cat" name="cat" onchange="populate1(this.id,'sub_cat')" required>
            <option value=""> </option>
            <option value="Electronics">Electronics </option>
            <option value="Clothing">Clothing </option>
            <option value="Literature">Literature </option>
            <option value="Musical Instrument">Musical Instrument </option>
            <option value="Personal Accessories">Personal Accessories </option>
            <option value="Sporting Goods">Sporting Goods </option>
        </select>
        </div><!--category-->
        <div class="subcat">
        <a3>Sub Category:</a3>
        <br>
        <select id= "sub_cat" class="sub_cat" name="sub_cat" required>
        </select>
        </div><!--subcat-->
    </div><!--category-->
    <a3>Brief Description:</a3>
    <br>
    <textarea class="descrip" rows="10" cols="10" name="item_descp" placeholder="Description"></textarea>
</div><!--info-->

<div class="cancel_save">
    <input type="submit" class="save" name = "submit" value="SUBMIT">
    </button>
</div><!--cancel_save-->

</form>

</div>
<img src="photo/post1.png" alt="">
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