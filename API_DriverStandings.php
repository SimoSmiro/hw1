<?php

  session_start();

  header('Content-Type: application/json');

  function Ricerca(){

    $year=urlencode($_GET["q"]);

    $rest_url = 'https://ergast.com/api/f1/'.$year.'/driverStandings/1.json';

    $curl=curl_init();

    curl_setopt($curl, CURLOPT_URL, $rest_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    echo $result;
  }

  Ricerca();

?>