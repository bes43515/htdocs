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
<h1> Summary Page </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>

<?php
  $sql = "SELECT count(username) FROM users";
  $brand_sql = "SELECT count(brand)  FROM products";
  $category_sql = "SELECT count(Category) FROM products";

  $result = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
  if($result){
    $row=mysqli_fetch_row($result);
    echo "User Number: " . $row[0]. "<br>";
    mysqli_free_result($result);
  }

  $brand_result = mysqli_query($link,$brand_sql,MYSQLI_USE_RESULT);
  if($brand_result){
    $row=mysqli_fetch_row($brand_result);
    echo "Brand Number: " . $row[0]. "<br>";
    mysqli_free_result($brand_result);
  }

  $category_result = mysqli_query($link,$category_sql,MYSQLI_USE_RESULT);
  if($category_result){
    $row=mysqli_fetch_row($category_result);
    echo "Category Number: " . $row[0]. "<br>";
    mysqli_free_result($category_result);
  }
  $link->close();
?>

</div>

<?php include 'decorator/footer.php';?>

</body>
</html>
