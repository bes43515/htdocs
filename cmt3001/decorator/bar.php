<div class="topnav">
	<?php
		if(isset( $_SESSION['userName'])){
		if($_SESSION['userName']=="admin"){
			echo '<a href=users.php>User</a>'.
			'<a href="maintain.php">Maintain</a>'.
			'<a href="summary.php">Summary</a>'.
			'<a href="homepage.php">Home</a>'.
			'<a href="product.php">All Products</a>'.
			'<a href="order.php">Order</a>'.
			'<a href="cart.php">Cart</a>';
		}else{
			echo '<a href="homepage.php">Home</a>'.
			'<a href="product.php">All Products</a>'.
			'<a href="order.php">Order</a>'.
			'<a href="cart.php">Cart</a>'.
			'<a href="contactpage.php">Contact us</a>';
		}
	}
		if(isset( $_SESSION['userName'])){
			echo '<a href=action/logout.php>Logout</a>';
		}else{
			echo '<a href=../login.php>Login</a>';
		}
	?>

	<form action="search.php"  method='post' accept-charset="utf-8">
		<select name="column" id="column">
		<option value="brand">Brand</option>
		<option value="category">Category</option>
		<option value="productName">Product Name</option>
		</select>
		<input type="text" placeholder="Search..." name="searchName">
		<button type='submit' class='button'>Search</button>
	</form>
</div>
