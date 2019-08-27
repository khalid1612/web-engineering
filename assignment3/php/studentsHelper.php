<?php

  require_once "config.php";

//$_POST['method'] = "delete";
//$_POST['id'] = "101";

  $method = $_POST['method'];


  if ($_POST['method'] == "edit") {

  }
  elseif ($_POST['method'] == "delete") {
    $id = $_POST['id'];

    $delQuery = "DELETE FROM students WHERE id='$id'";
    if (mysqli_query($db,$delQuery)) {
      echo "successfully";
    }else{
      echo "error";
    }
  }


 ?>
