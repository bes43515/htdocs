<?php
session_start();
require_once "../config/config.php";

if(!isset($_GET["column"]) && !isset($_GET["name"]) && !isset($_POST["editName"])){
  header("location: ../homepage.php");
  exit;
  }
$column = $_GET["column"];
$name = $_GET["name"];
$editName = $_POST["editName"];

$update_sql = "UPDATE products SET $column = '$editName' WHERE $column = '$name'";
$update_result = mysqli_query($link,$update_sql,MYSQLI_STORE_RESULT);

header("location: ../maintain.php");
exit;

?>
