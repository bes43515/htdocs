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
  $sql = "SELECT userId, username, password FROM users";
  $result = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
  if($result){
    while($row=mysqli_fetch_row($result)) {
      echo "id: " . $row[0]. " - Name: " . $row[1]. "     Password:" . $row[2]. "<br>";
    }
  }
  $link->close();
?>

</div>

<?php include 'decorator/footer.php';?>

</body>
</html>
