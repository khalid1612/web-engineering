<?php

  require_once "config.php";

  $id = $_POST['id'];
  $time = $_POST['time'];
  $totalSeats = $_POST['tSeat'];

  $getOldSlot = "SELECT * FROM countime WHERE id='$id'";
  $resultOldSlot = mysqli_query($db,$getOldSlot);
  $row = mysqli_fetch_assoc($resultOldSlot);
  $oldSlot = $row['day']." ".$row['time'];
  $newSlot = $row['day']." ".trim($time);

  //update in counselling table
  $updateQuery = "UPDATE countime SET time='$time', totalSeat='$totalSeats' WHERE id='$id'";
  if (mysqli_query($db,$updateQuery)) {
    //update in student table
    $updateQuery = "UPDATE students SET slot='$newSlot' WHERE slot='$oldSlot'";
    if (mysqli_query($db,$updateQuery)) {
      echo "successfully";
    }else{
      echo "error";
    }
  }else{
    echo "error";
  }


 ?>
