<?php
session_start();
require_once "config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
if(!isset($_POST["uname"]) &&!isset($_POST["psw"]) &&!isset($_POST["email"]) &&!isset($_POST["pn"])){
  header("location: ../homepage.php");
  exit;
  }
$uname=$_POST["uname"];
$psw=$_POST["psw"];
$email=$_POST["email"];
$pn=$_POST["pn"];
$insert_sql = "INSERT INTO users (userName, password ,email, phone) VALUES ('$uname','$psw','$email','$pn')";
$insert_result = mysqli_query($link,$insert_sql,MYSQLI_STORE_RESULT);
Header("Location: login.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="/css/loginStyle.css">
</head>
<body>

<h2>Login Page</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="pn"><b>PhoneNumber</b></label>
    <input type="number" min="10000000" mxa="99999999"placeholder="Enter PhoneNumber" name="pn" required>

    <button type="submit">Register</button>
  </div>

</form>

</body>
</html>
