<?php

define('SERVER', 'localhost');
define('PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db01g03');

$link = mysqli_connect(SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME  );

if($link === false){
    die("ERROR: Error connect. " . mysqli_connect_error());
}

?>
