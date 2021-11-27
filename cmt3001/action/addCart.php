<?php
session_start();

$userName = $_SESSION["userName"];
$productName = $_GET["productName"];
$price = $_GET["price"];
$quantity = $_POST["quantity"];
require_once "../config/config.php";

//if($select_query){
//  $row=mysqli_fetch_row($result);
  $update_sql = "UPDATE cart SET quantity = quantity + $quantity WHERE userName = '$userName' && productName = '$productName' && (quantity + $quantity) <= (SELECT quantity FROM products WHERE productName = '$productName')";
   //error_log($update_sql);
  $update_query = mysqli_query($link,$update_sql);
  //if($update_query){
  if(mysqli_affected_rows($link) >0 ){
  header("location: ../cart.php");
    exit;
  }
//}
$select_sql = "SELECT * FROM cart WHERE userName = '$userName' && productName = '$productName'";
$select_query = mysqli_query($link,$select_sql);
if(mysqli_num_rows($select_query)==0){
  $sql = "INSERT INTO cart (userName, productName , quantity ,price) VALUES ('$userName','$productName','$quantity','$price')";
  $query = mysqli_query($link,$sql);
  if(!$query){
    echo "Add Product To Cart Failed : " . mysqli_error($link);
  }else{
    header("location: ../cart.php");
    exit;
    }
}else{
  header("location: ../cart.php?error=true");

      exit;
  }
?>
