
<?php
session_start();
require_once "../config/config.php";
if(!isset($_GET["status"]) && !isset($_GET["orderId"])){
  header("location: ../homepage.php");
  exit;
  }
$status = $_GET["status"];
$orderId = $_GET["orderId"];

$update_sql = "UPDATE orders SET status = '$status' WHERE orderId= $orderId";
$result = mysqli_query($link,$update_sql,MYSQLI_STORE_RESULT);
header("location: ../order.php");
exit;
?>
