<?php
session_start();
if(!isset( $_SESSION['username'])){
	header("location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<div class="topnav">
	  <a href="#home">Home</a>
	  <a href="#All Products">All Products</a>
	  <a href="#Recipes">Recipes</a>
	  <a href="#Contact us">Contact us</a>
		<?php
			if(isset( $_SESSION['username'])){
				echo '<a href=/logout.php>Logout</a>';
			}
		?>

		<input type="text" placeholder="Search...">
	</div>

<br>
<h1>Welcome <?php echo $_SESSION["username"]; ?></h1><br>

	<div class="row">
	  <div class="column">
	    <img src="image.jpg" alt="bakingtool"style="width:420px;height:300px;" >
	  </div>
	  <div class="column">
	    <img src="image2.jpg" alt="bakingingredient"style="width:420px;height:300px;" >
	  </div>
	  <div class="column">
	    <img src="image3.jpg" alt="cookies"style="width:430px;height:300px;" >
	  </div>
	</div>

	<div class="catagories">
		<div class="tools">
			<img src=""

</body>
</html>
