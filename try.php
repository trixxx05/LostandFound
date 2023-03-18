<?php
//connect to database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'instafound';

$mysqli = mysqli_connect($host,$user,$pass,$db) or die($mysqli->error);

$id = isset($_GET['id']) ? $_GET['id'] : null;  
$sql = "SELECT id,sub_cat,email,loc, date FROM lost_items WHERE id='$id'";

//execute query
$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {
//get email address from result
$row = mysqli_fetch_assoc($result);
$email = $row['email'];
$loc = $row['loc'];
$date = $row['date'];
$sub=$row['sub_cat'] ;

//generate mailto link for Gmail
$subject = "I found your" ." ". $sub;
$body = "Location: " . $loc .
"\r\n Date: ". $date ;
$mailto = "https://mail.google.com/mail/?view=cm&to=" . $email . "&su=" . urlencode($subject) . "&body=" . urlencode($body);

//redirect to mailto link
header("Location: " . $mailto);
exit;
}

header('Location:loginhomepage.php');
exit;
?>