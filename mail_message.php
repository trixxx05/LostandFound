<?php
$name = $_POST['name'];
$email = $_POST['email'];
$num = $_POST['num'];
$des = $_POST['des'];

$username = "root";
$password = "";
$database = "instafound";


$con=mysqli_connect('localhost',$username,$password);
mysqli_select_db($con,$database) or die ("Unable to select database");


if(isset($_POST['new']) && $_POST['new']==1){
		$query = "INSERT INTO sendmessage VALUES ('','$name', '$email', '$num', '$des')";
		mysqli_query($con,$query);
	}

mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>  
<link rel="stylesheet" type="text/css" href="css\style_login.css" />
  <title>Thank You</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container-fluid text-center">
    <h1 style="color:#000000;">Thank You!!<br>Your Found Item has been reported successfully.
</h1><br><br>    
 
</div>
</body> 
</html>

