<?php
header("Content-Type: text/html;charset=UTF-8");

session_start();
require_once "../config/config.php";
if(!isset($_POST["description"])&&!isset($_GET["product"])&&isset($_SESSION["userName"])){
  header("location: ../homepage.php");
  exit;
  }
$pname = $_POST["pname"];
$Category = $_POST["Category"];
$description = $_POST["description"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

//$image=base64_edcode($image);
   if (is_uploaded_file($_FILES['image']['tmp_name'])) {

      $imgData = base64_decode(file_get_contents(addslashes($_FILES['addimage']['tmp_name'])));
    }
$insert_sql = "INSERT INTO products (productName, description ,Category, quantity ,price ,image) VALUES ('$pname','$description','$Category','$quantity','$price','  $imgData')";
$insert_result = mysqli_query($link,$insert_sql,MYSQLI_STORE_RESULT);
Header("Location: ../productDetail.php?product=".$pname);
exit;

?>
