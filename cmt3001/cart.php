<?php
session_start();
if(!isset( $_SESSION['username'])){
	header("location: login.php");
}

require_once "config/config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";
if($_GET['error']){
  echo "<h2>Not Enough Stock</h2>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">

</head>

<body>

<div class="head">
<h1> UserPage </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>

<?php

  $sum=0;
  $sql = "SELECT productName, price, quantity FROM orderlist WHERE userId='".$_SESSION['userId']."'";
  $result = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
  if($result){
    while($row=mysqli_fetch_row($result)) {
      echo "productName: " . $row[0]. " - Price: " . $row[1]. "     Quantity:" . $row[2]. "<br>";
      $sum+= $row[1]*$row[2];
    }
    echo "<br>Total Price : " .$sum.
    "<br><a href='checkOut.php'><button>Check Out</button></a>";
  }
  $link->close();
?>

</div>

<?php include 'decorator/footer.php';?>


</body>
</html>
