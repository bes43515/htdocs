<?php
session_start();
require_once "..config/config.php";

$sql = "SELECT productName,quantity FROM orderList WHERE userId='".$_SESSION['userId']."'";
$delete_sql = "DELETE FROM orderList WHERE userId='".$_SESSION['userId']."'";

$delete_result = mysqli_query($link,$delete_sql,MYSQLI_USE_RESULT);

$result = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
if($result){
  While($row=mysqli_fetch_row($result)){
    $update_sql = "UPDATE products SET quantity = quantity - $row[1] WHERE productName= '$row[0]'";
    $update_result = mysqli_query($link,$update_sql,MYSQLI_USE_RESULT);
      mysqli_free_result($update_result);
  }
  mysqli_free_result($result);
  header("location: cart.php");
  exit;
}
?>
