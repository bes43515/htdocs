<?php
session_start();
if(!isset( $_SESSION['userName'])){
	header("location: login.php");
}

$column = $_GET["column"];
$name = $_GET["name"];

require_once "config/config.php";

$userName = $password = "";
$userName_err = $password_err = $login_err = "";
if(!isset($_GET["column"])&&!isset($_GET["name"])){
  header("location: ../homepage.php");
  exit;
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
<h1><?php echo "Edit $column";?> </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>

<?php

echo  "$name :";
echo  "<form action='action/edit.php?column=$column&name=$name' method='post'>";
echo  "<input type='text' name='editName' value='$name' required>";
echo  "<button type='submit' class='button'>Edit</button></form><br>";

?>

</div>

<?php include 'decorator/footer.php';?>


</body>
</html>
