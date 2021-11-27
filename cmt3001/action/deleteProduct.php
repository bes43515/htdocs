<?php
session_start();
require_once "../config/config.php";
if(!isset($_GET["productName"])){
  header("location: ../homepage.php");
  exit;
  }

$productName = $_GET["productName"];

$delete_sql = "DELETE FROM products WHERE productName = '$productName'";
$deleteCart_sql = "DELETE FROM cart WHERE productName = '$productName'";

$delete_result = mysqli_query($link,$delete_sql,MYSQLI_STORE_RESULT);
$deleteCart_result = mysqli_query($link,$deleteCart_sql,MYSQLI_STORE_RESULT);

header("location: ../product.php");
exit;

?>
