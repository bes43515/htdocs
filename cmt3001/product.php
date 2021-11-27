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
  $sql = "SELECT productName,price,image FROM products";
  $result = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
  echo "<div>";
  if($result){
    While($row=mysqli_fetch_row($result)){
    echo "<div>Product: <br><a href='productDetail.php?product=".$row[0]."'>" .
    '<img src = "data:image/png;base64,' . base64_encode($row[2]) . '" width = "500px" height = "500px"/>'
    . "<br>". $row[0] . " $". $row[1] ."<br></div></a><br>";
    }
    mysqli_free_result($result);
  }
    echo "</div>";
  $link->close();
?>

</div>

<?php include 'decorator/footer.php';?>


</body>
</html>
