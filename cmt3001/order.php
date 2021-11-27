<?php
session_start();
if(!isset( $_SESSION['userName'])){
	header("location: login.php");
}

require_once "config/config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">

</head>

<body>

<div class="head">
<h1> OrderHistory </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>

<?php
  $index=1;
	if( $_SESSION['userName']=="admin"){
		$sql = "SELECT productName, quantity,userName ,orderId ,address,status FROM orders ";
		$result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);
		if($result){
			if(mysqli_num_rows($result)==0){
				echo "There is nothing in OrderHistory!!!";
			}else{
			while($row=mysqli_fetch_row($result)) {
				echo  $row[2]."'s Order $index.<br> productName: " . $row[0]. " Quantity:" . $row[1]. " Address:".$row[4]. " Status:".$row[5].
				" <a href='action/orderEdit.php?orderId=$row[3]&status=Delivering'>[Delivering]</a>".
				" <a href='action/orderEdit.php?orderId=$row[3]&status=Arrived'>[Arrived]</a>".
				"<br><br>";
				$index+=1;
			}
			}
		}
	}else{
  $sql = "SELECT productName, quantity,address ,status  FROM orders WHERE userName='".$_SESSION['userName']."' ORDER BY orderId ASC";
  $result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);
  if($result){
		if(mysqli_num_rows($result)==0){
			echo "There is nothing in OrderHistory!!!";
		}else{
    while($row=mysqli_fetch_row($result)) {
      echo "Order $index.<br> productName: " . $row[0]. " Quantity:" . $row[1].  " Address:".$row[2]." Status:".$row[3]."<br><br>";
      $index+=1;
    }
		}
  }
	}
  $link->close();
?>

</div>

<?php include 'decorator/footer.php';?>


</body>
</html>
