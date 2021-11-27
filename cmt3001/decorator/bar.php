<div class="topnav">
	<a href="homepage.php">Home</a>
	<a href="product.php">All Products</a>
	<a href="recipespage.html">Recipes</a>
	<a href="contactpage.html">Contact us</a>

	<?php
		if($_SESSION['username']=="admin"){
			echo '<a href=users.php>User</a>';
		}
		if(isset( $_SESSION['username'])){
			echo '<a href=action/logout.php>Logout</a>';
		}
	?>
	<input type="text" placeholder="Search...">
</div>
