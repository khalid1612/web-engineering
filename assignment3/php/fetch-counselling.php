<?php

 //fetch slot with available seats

    require_once "config.php";

    $getCounsellingQuery = "SELECT * FROM countime";

    $resultCounselling = mysqli_query($db,$getCounsellingQuery);

    $data = array();

    while ($row = mysqli_fetch_assoc($resultCounselling)) {

      $slotTime = $row['day']." ".$row['time'];
      $getReserveQuery = "SELECT COUNT(slot) as total FROM students WHERE slot='$slotTime'";
      $resultReserve = mysqli_query($db,$getReserveQuery);
      $totalReserveSeat = mysqli_fetch_assoc($resultReserve);
      //echo " reserved ". $totalReserveSeat['total'];


      //available seats
      $availableSeat = $row['totalSeat'] - $totalReserveSeat['total'];

      $option = array($row['id'],$row['day'], $row['time'],$row['totalSeat'],$availableSeat);
      array_push($data, $option);
    }

    echo json_encode($data);



?>
