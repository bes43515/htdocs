<?php
session_start();
if(!isset( $_SESSION['userName'])){
	header("location: login.php");
}

require_once "config/config.php";

$userName = $password = "";
$userName_err = $password_err = $login_err = "";

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">

</head>

<body>

<div class="head">
<h1> Products </h1>
</div>

<?php include 'decorator/bar.php';

if($_SESSION['userName']=="admin"){
echo "<a href='add.php'>[Add]</a>";
}

?>

<div class="row">
<?php
  $sql = "SELECT productName,price,image FROM products";
  $result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);

  if($result){
    While($row=mysqli_fetch_row($result)){
    echo "<div class='column'> <a href='productDetail.php?product=".$row[0]."'>";
    echo "<img src = 'data:image/png;base64," . base64_encode($row[2]) . "'/>";
    echo "<br>". $row[0] . " $". $row[1] ;
		echo "</a>";
		if($_SESSION['userName']=="admin"){
		echo " <a href='action/deleteProduct.php?productName=$row[0]'>[Delete]</a>";
		}
		echo "<br>";
		echo "</div>";
    }
    mysqli_free_result($result);
  }
  $link->close();
?>

</div>


<?php include 'decorator/footer.php';?>


</body>
</html>
