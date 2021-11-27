<?php
header("Content-Type: text/html;charset=UTF-8");

session_start();
require_once "../config/config.php";
if(!isset($_POST["description"])&&!isset($_GET["product"])&&isset($_SESSION["userName"])){
  header("location: ../homepage.php");
  exit;
  }

$description = $_POST["description"];
$product = $_GET["product"];
$userName = $_SESSION["userName"];

$insert_sql = "INSERT INTO comment (productName, description ,userName) VALUES ('$product','$description','$userName')";
error_log($insert_sql);
$insert_result = mysqli_query($link,$insert_sql,MYSQLI_STORE_RESULT);
Header("Location: ../productDetail.php?product=".$product);
exit;

?>
