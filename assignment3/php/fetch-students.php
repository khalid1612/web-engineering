<?php

 //fetch slot with available seats

    require_once "config.php";

if ( ($_POST['values'] != "") && ($_POST['type'] != "")){
    $value = $_POST['values'];
    $type = $_POST['type'];

    if ($type == "default") {
      if ($value == "All") {
        $getStudentsQuery = "SELECT * FROM students";
      }else{
        $getStudentsQuery = "SELECT * FROM students WHERE slot='$value'";
      }
    }
    elseif ($type == "search") {
      $getStudentsQuery = "SELECT * FROM students WHERE email='$value' OR sid='$value'";
    }

    $resultStudents = mysqli_query($db,$getStudentsQuery);

    $data = array();

    while ($row = mysqli_fetch_assoc($resultStudents)) {
      $option = array($row['id'],$row['name'], $row['email'],$row['sid'],$row['slot']);
      array_push($data, $option);
    }

    echo json_encode($data);

  }

?>
