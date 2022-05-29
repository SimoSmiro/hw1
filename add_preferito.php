<?php

  session_start();

  $conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());

  $userid = mysqli_real_escape_string($conn, $_SESSION["_user_id"]);
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $img_url = mysqli_real_escape_string($conn, $_POST['immagine']);
  $desc = mysqli_real_escape_string($conn, $_POST['testo']);

  $query = "INSERT INTO preferiti VALUES ($userid, $id, '$img_url', '$desc')";

  $res = mysqli_query($conn, $query);

  if($res){
    $response=array("esito"=>true);
  }else{
    $response=array("esito"=>false);
  }

  echo json_encode($response);

  mysqli_close($conn);

?>
