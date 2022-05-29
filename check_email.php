<?php

session_start();

$conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());

$email= mysqli_real_escape_string($conn, $_GET['q']);

$query= "SELECT email FROM users WHERE email=$email";

$res=mysqli_query($conn, $query);

if(mysqli_num_row($res)>0){
  $response = array('esito' => true);
}else{
  $response = array('esito' => false);
}
echo json_encode($response);
mysqli_close($conn);
?>