<?php
session_start();
if(!isset( $_SESSION['username'])){
	header("location: login.php");
}

require_once "config.php";

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
</div>

<?php

  $brand_sql = "SELECT brand  FROM products GROUP BY brand";
  $category_sql = "SELECT Category  FROM products GROUP BY Category";
  $brand_result = mysqli_query($link,$brand_sql,MYSQLI_USE_RESULT);
  if($brand_result){
    echo "<br>Brand:<br>";
    while($row=mysqli_fetch_row($brand_result)) {
    echo "BrandName: " . $row[0]. "<br>";
    }
  }

  $category_result = mysqli_query($link,$category_sql,MYSQLI_USE_RESULT);
  if($category_result){
    echo "<br>Category:<br>";
    while($row=mysqli_fetch_row($category_result)) {
    echo "Category: " . $row[0]. "<br>";
    }
  }
  $link->close();
?>

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
