<?php

  session_start();
  $conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());

  $query = "SELECT * FROM contents";

  $res = mysqli_query($conn, $query);

  $contents_array = array();

  while($risultato = mysqli_fetch_assoc($res)){
    array_push($contents_array, $risultato);
  }

  echo json_encode($contents_array);
?>