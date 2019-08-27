<?php

 //fetch slot with available seats

    require_once "config.php";

    $getCounHourQuery = "SELECT * FROM countime";
    $resultCounHour = mysqli_query($db,$getCounHourQuery);

    $data = array();

    while ($row = mysqli_fetch_assoc($resultCounHour)) {
      //echo "total seat". $row['totalSeat']." ";

      //get reserve seats
      $slotTime = $row['day']." ".$row['time'];
      $getReserveQuery = "SELECT COUNT(slot) as total FROM students WHERE slot='$slotTime'";
      $resultReserve = mysqli_query($db,$getReserveQuery);
      $totalReserveSeat = mysqli_fetch_assoc($resultReserve);
      //echo " reserved ". $totalReserveSeat['total'];


      //available seats
      $availableSeat = $row['totalSeat'] - $totalReserveSeat['total'];

      $option = array($slotTime, $availableSeat, $totalReserveSeat['total']);
      array_push($data, $option);
    }

    echo json_encode($data);

?>
