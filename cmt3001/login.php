<?php
session_start();

if(isset($_SESSION["username"])){
    header("location: homepage.php");
    exit;
}

require_once "config/config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["uname"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["uname"]);
      //  error_log(print_r($username,TRUE));
    }

    if(empty(trim($_POST["psw"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["psw"]);
      //  error_log(print_r($password ,TRUE));
    }

    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT userId, username, password FROM users WHERE username = ?";

        if($statment = mysqli_prepare($link, $sql)){
                  //  error_log(print_r("yes" ,TRUE));
            mysqli_stmt_bind_param($statment, "s", $param_username);
            $param_username = $username;
            error_log(print_r($param_username ,TRUE));
            if(mysqli_stmt_execute($statment)){
                mysqli_stmt_store_result($statment);
                if(mysqli_stmt_num_rows($statment) == 1){
                    mysqli_stmt_bind_result($statment, $id, $username, $hashed_password);

                    if(mysqli_stmt_fetch($statment)){

                        if($password == $hashed_password){
                            error_log(print_r($hashed_password,TRUE));
                            session_start();
                            $_SESSION["userId"] = $id;
                            $_SESSION["username"] = $username;
                            if($username == "admin")
                              header("location: summary.php");
                            else
                              header("location: homepage.php");
                        } else{

                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{

                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($statment);
        }
    }
    mysqli_close($link);
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

    <button type="submit">Login</button>
  </div>
</form>

</body>
</html>
