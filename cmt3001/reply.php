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
<h1> UserPage </h1>
</div>

<?php include 'decorator/bar.php';?>

<form action="action/reply.php?product=<?php echo $productName?>" method="post">
  <div>
    <textarea type="textarea" rows="6" cols="50" name="description" required></textarea>
    <br>
    <input type="submit" value="Reply">
  </div>
</form>



<?php include 'decorator/footer.php';?>

</body>
</html>
