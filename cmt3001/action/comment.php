<?php

  $sql = "SELECT userName, description FROM comment WHERE productName= '$productName'";
  $result = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);
  echo "Comment :<br><a href='../reply.php?product=$productName'><button class='button'>REPLY</button></a>";
  echo " <br><br>";
  if($result){

    while($row=mysqli_fetch_row($result)) {
      echo "<div>" . $row[0]. ":<br>" . $row[1]. "</div><br>";
    }
  }
  $link->close();
?>
