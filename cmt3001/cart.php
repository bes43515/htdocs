<?php
session_start();
if(!isset( $_SESSION['userName'])){
	header("location: login.php");
}

require_once "config/config.php";

$userName = $password = "";
$userName_err = $password_err = $login_err = "";
if(isset($_GET['error'])){
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
<h1> Cart </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>

<?php

  $sum=0;
  $sql = "SELECT productName, price, quantity FROM cart WHERE userName='".$_SESSION['userName']."'";
  $result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);
  if($result){
		if(mysqli_num_rows($result)==0){
			echo "There is nothing in Cart!!!";
		}else{
    while($row=mysqli_fetch_row($result)) {
      echo "productName: " . $row[0]. " - Price: " . $row[1]. "     Quantity:" . $row[2]. "<br>";
      $sum+= $row[1]*$row[2];
    }
    echo "<br>Total Price : " .$sum.
    "<br>";
		echo  "<form action='action/checkOut.php' method='post'>";
		echo  "<label for='address'><b> Deliver Address : </b></label>";
		echo  "<input type='text' name='address'  required>";
		echo  "<button type='submit' class='button'>CheckOut</button></form><br>";
		}
  }
  $link->close();
?>

</div>

<?php include 'decorator/footer.php';?>


</body>
</html>
