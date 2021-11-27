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
<h1> Summary Page </h1>
</div>

<?php include 'decorator/bar.php';?>

<div>


<form class="addform"action="action/add.php" method="post">


  <div class="addcontainer">
    <label for="pname"><b>Name</b></label>
    <input class="add" type="text" placeholder="Enter ProductName" name="pname" required>
    <br>
    <label for="Category"><b>Category</b></label>
    <input class="add" type="text" placeholder="Enter Category" name="Category" required>

    <label for="description"><b>Description</b></label>
    <textarea class="add" rows="6" cols="50" name="description" required>Enter Description</textarea>

    <label for="quantity"><b>Quantity</b></label>
    <input class="add" type="number" min='0' placeholder="Enter Quantity" name="quantity" required>

    <label for="price"><b>Price</b></label>
    <input class="add" type="number" min='0' placeholder="Enter Price" name="price" required>

    <label for="addimage"><b>Image</b></label>
    <input class="add" type="file" accept="image/jpg, image/jpeg" name="addimage">

    <button type="submit">ADD</button>
  </div>
</form>
</div>

<?php include 'decorator/footer.php';?>

</body>
</html>
