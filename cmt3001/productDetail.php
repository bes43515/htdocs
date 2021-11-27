<?php
session_start();
if(!isset( $_SESSION['userName'])){
	header("location: login.php");
}

require_once "config/config.php";

$userName = $password = "";
$userName_err = $password_err = $login_err = "";
if(!isset($_GET["product"])){
  header("location: ../homepage.php");
  exit;
  }
$productName=$_GET["product"];
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">

</head>

<body>

<div class="head">
<h1> Summary Page </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>

<?php
  $sql = "SELECT productName,price,image,description,quantity FROM products WHERE productName='$productName'";
  $result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);
  echo "<div>";
  if($result){
    $row=mysqli_fetch_row($result);
    echo 	"<div>Product: <br>";
    echo 	"<img src = 'data:image/png;base64," . base64_encode($row[2]) . "' width = '500px' height = '500px'/>";
    echo 	"<br>". $row[0] . " $". $row[1] ."<br>";
    echo 	"Desription: " . $row[3] ."<br>";
  	echo  "<form action='action/addCart.php?productName=".$row[0]."&price=". $row[1]."' method='post'>";
  	echo  "<input type='number' min='0' max='". $row[4]."' required  name='quantity'>";
  	echo  "<button type='submit' class='button'>Add To Cart</button>";
  	echo  "</form></div><br>";
    mysqli_free_result($result);
  }
    echo "</div>";
?>

</div>
<?php include 'action/comment.php';?>
<?php include 'decorator/footer.php';?>

</body>
</html>
