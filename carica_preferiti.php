<?php

  session_start();
  $conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());
  $userid=mysqli_real_escape_string($conn, $_SESSION["_user_id"]);


  $query = "SELECT * FROM preferiti WHERE userid=$userid";

  $res = mysqli_query($conn, $query);

  $Pref_array = array();

  while($risultato = mysqli_fetch_assoc($res)){
    array_push($Pref_array, $risultato);
  }

  echo json_encode($Pref_array);
?>