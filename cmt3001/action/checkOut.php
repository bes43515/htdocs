<?php
session_start();
require_once "../config/config.php";
if(!isset($_POST["address"]) ){
  header("location: ../homepage.php");
  exit;
  }
$address= $_POST["address"];
$userName = $_SESSION["userName"];

$sql = "SELECT productName,quantity, price FROM cart WHERE userName='$userName'";
$delete_sql = "DELETE FROM cart WHERE userName='".$_SESSION['userName']."'";

$result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);


if($result){
  While($row=mysqli_fetch_row($result)){
    $update_sql = "UPDATE products SET quantity = quantity - $row[1] WHERE productName= '$row[0]'";
    $insert_sql = "INSERT INTO orders (userName , quantity , productName, price,address) VALUES ('$userName','$row[1]','$row[0]','$row[2]','$address')";

    $update_result = mysqli_query($link,$update_sql,MYSQLI_STORE_RESULT);
    $insert_result = mysqli_query($link,$insert_sql,MYSQLI_STORE_RESULT);
  }
  mysqli_free_result($result);
  $delete_result = mysqli_query($link,$delete_sql,MYSQLI_STORE_RESULT);
  header("location: ../cart.php");
  exit;

}
?>
