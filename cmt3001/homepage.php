<?php
session_start();
if(!isset( $_SESSION['username'])){
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
</div>

<?php include 'decorator/bar.php';?>

<br>


	<div class="row">
	  <div class="column">
	    <img src="img/image.jpg" alt="bakingtool"style="width:420px;height:300px;" >
	  </div>
	  <div class="column">
	    <img src="img/image2.jpg" alt="bakingingredient"style="width:420px;height:300px;" >
	  </div>
	  <div class="column">
	    <img src="img/image3.jpg" alt="cookies"style="width:430px;height:300px;" >
	  </div>
	</div>

	<div class="slideshow-container">

	<div class="mySlides">
	  <img src="img/image6.jpg" style="width:50%; display: block;  margin-left: auto ; margin-right: auto; padding-right: 15p">
	  <div class="text">日本薄力小麥粉(低筋)/[昭和月桂冠牌]/1公斤[包]</div>
	</div>

	<div class="mySlides">
	  <img src="img/image4.jpg" style= "width:50% ; display: block;  margin-left: auto ; margin-right: auto; padding-right: 15px">
	  <div class="text"> 圓形高身蛋糕入爐紙模[6吋]</div>
	</div>

	<div class="mySlides">
	  <img src="img/image5.jpg" style="width:50%; display: block;  margin-left: auto ; margin-right: auto; padding-right: 15px">
	  <div class="text">日式不銹鋼打蛋器[20.5cm]</div>
	</div>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>
	<br>

	<div style="text-align:center">
	  <span class="dot" onclick="currentSlide(1)"></span>
	  <span class="dot" onclick="currentSlide(2)"></span>
	  <span class="dot" onclick="currentSlide(3)"></span>
	</div>

<?php include 'decorator/footer.php';?>

</body>
</html>
