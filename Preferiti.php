<?php
  session_start();
  $conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());
?>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./Style/Preferiti.css">
    <script src= "./Scripts/Preferiti.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="./Images/F1logo.png">
    <title> I tuoi preferiti </title>
  </head>

  <body>
    
    <main>
      <div id="StartBox">
        <h1> I TUOI ARTICOLI PREFERITI</h1> <a href="Home.php">Homepage</a>
      </div>
      <div id="preferitiList">
        <!-- DINAMIC LOADO!!-->
      </div>

    </main>

  </body>

</html>