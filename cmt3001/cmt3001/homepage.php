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

<div class="topnav">
	<a href="homepage.php">Home</a>
	<a href="products.html">All Products</a>
	<a href="recipespage.html">Recipes</a>
	<a href="contactpage.html">Contact us</a>

	<?php
		if($_SESSION['username']=="admin"){
			echo '<a href=users.php>User</a>';
		}
		if(isset( $_SESSION['username'])){
			echo '<a href=/logout.php>Logout</a>';
		}
	?>
	<input type="text" placeholder="Search...">
</div>


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

	<!-- Subscribe section -->
   <div class="container3">
     <h3>Subscribe</h3>
     <p3>To get special offers and VIP treatment:</p3>
     <p><input class="input" type="text" placeholder="Enter e-mail" style="width:100%"></p>
     <button type="button" class="button">Subscribe</button>

   </div>


	 <div class="down">
		<h4> Store </h4>
		<h2> Online Chef Pâtissier </h2>

		<img src="img/phone.jpg" alt="wts icon" style="vertical-align: middle;" width="25px" >
		<span> Whatsapp: 8013-1210 </span>
<br>
		<img src="img/fbicon.png" alt="fb icon" style="vertical-align: middle;" width="50px" >
		<span> Facebook: Chef Patissier </span>
<br>
		<img src="img/igicon.png" alt="ig icon" style="vertical-align: middle;" width="70px" >
		<span> Instagram: Chef_Patissier </span>
<br>
		<img src="img/emailicon.png" alt="email icon" style="vertical-align: middle;" width="50px" >
		<span> Email: Chefatissier@gmail.com </span>

 		<h4>We accept</h4>
		<img src="img/creditcardicon.jpeg" alt="credit card icon" style="vertical-align: middle;" width="26px" >
	 	<span> Credit Card</span>

	</div>

			<script>
				var slideIndex = 1;
				showSlides(slideIndex);

				function plusSlides(n) {
				  showSlides(slideIndex += n);
				}

				function currentSlide(n) {
				  showSlides(slideIndex = n);
				}

				function showSlides(n) {
				  var i;
				  var slides = document.getElementsByClassName("mySlides");
				  var dots = document.getElementsByClassName("dot");
				  if (n > slides.length) {slideIndex = 1}
				  if (n < 1) {slideIndex = slides.length}
				  for (i = 0; i < slides.length; i++) {
				      slides[i].style.display = "none";
				  }
				  for (i = 0; i < dots.length; i++) {
				      dots[i].className = dots[i].className.replace(" active", "");
				  }
				  slides[slideIndex-1].style.display = "block";
				  dots[slideIndex-1].className += " active";
				}
			</script>


</body>
</html>
