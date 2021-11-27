<?php
header("Content-Type: text/html;charset=UTF-8");
session_start();
if(!isset( $_SESSION['userName'])){
	header("location: login.php");
}

require_once "config/config.php";

$userName = $password = "";
$userName_err = $password_err = $login_err = "";
if(!isset($_POST["column"]) && !isset($_POST["searchName"])){
	header("location: ../homepage.php");
	exit;
	}
$column = $_POST["column"];
$searchName = $_POST["searchName"];

?>

<!DOCTYPE html>
<html>


<head>
	<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

</head>

<body>

<div class="head">
<h1> Cart </h1>
</div>

<?php include 'decorator/bar.php';?>

<div class="row">
<?php

  $sql = "SELECT productName,price,image FROM products WHERE $column LIKE '%$searchName%'";
  $result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);
	if($result){
		if(mysqli_num_rows($result)==0){
			echo "NO PRODUCT FOUND!!!" ;
		}
    While($row=mysqli_fetch_row($result)){
    echo "<div class='column'> <a href='productDetail.php?product=".$row[0]."'>";
    echo "<img src = 'data:image/png;base64," . base64_encode($row[2]) . "'/>";
    echo "<br>". $row[0] . " $". $row[1] ;
			echo "<br>";
		echo "</a>";
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
