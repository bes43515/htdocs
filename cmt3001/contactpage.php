<?php
session_start();
if(!isset( $_SESSION['userName'])){
	header("location: login.php");
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
  <h1> Online Chef Pâtissier </h1>
  <h2> Contact Page </h2>
  </div>

<?php include 'decorator/bar.php';?>


<br>

  <div class="icon">
    <img src="img/phone.jpg" alt="wts icon" style="vertical-align: middle;" width="50px" >
    <span> Whatsapp: 8013-1210 </span>
<br>
    <img src="img/fbicon.png" alt="fb icon" style="vertical-align: middle;" width="100px" >
    <span> Facebook: Chef Patissier </span>
<br>
    <img src="img/igicon.png" alt="ig icon" style="vertical-align: middle;" width="140px" >
    <span> Instagram: Chef_Patissier </span>
<br>
    <img src="img/emailicon.png" alt="email icon" style="vertical-align: middle;" width="100px" >
    <span> Email: Chefatissier@gmail.com </span>
<br>
    <p><center> For all orders and inquiries </center></p>

</body>
</html>
