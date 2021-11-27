<?php
session_start();
if(!isset( $_SESSION['username'])){
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
<h1> UserPage </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>

<?php

  $brand_sql = "SELECT brand  FROM products GROUP BY brand";
  $category_sql = "SELECT Category  FROM products GROUP BY Category";
  $brand_result = mysqli_query($link,$brand_sql,MYSQLI_USE_RESULT);
  if($brand_result){
    echo "<br>Brand:<br>";
    while($row=mysqli_fetch_row($brand_result)) {
    echo "BrandName: " . $row[0]. "<br>";
    }
  }

  $category_result = mysqli_query($link,$category_sql,MYSQLI_USE_RESULT);
  if($category_result){
    echo "<br>Category:<br>";
    while($row=mysqli_fetch_row($category_result)) {
    echo "Category: " . $row[0]. "<br>";
    }
  }
  $link->close();
?>

</div>

<?php include 'decorator/footer.php';?>


</body>
</html>
