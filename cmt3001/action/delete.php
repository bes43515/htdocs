<?php
session_start();
require_once "../config/config.php";
if(!isset($_GET["column"])&&!isset($_GET["name"])){
  header("location: ../homepage.php");
  exit;
  }

$column = $_GET["column"];
$name = $_GET["name"];

$delete_sql = "DELETE FROM products WHERE $column = '$name'";

$delete_result = mysqli_query($link,$delete_sql,MYSQLI_STORE_RESULT);
header("location: ../maintain.php");
exit;

?>
