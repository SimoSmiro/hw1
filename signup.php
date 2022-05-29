<?php
session_start();
  //da fare auth.php

  //Controllo inserimento
  if(isset($_POST["name"]) && isset($_POST["surname"]) &&isset($_POST["username"]) &&
     isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]))
     {
      //array errori
      $error = array();
      //connessione al DB
      $conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());
      
      //controllo pattern
      if(!preg_match('/[a-zA-Z0-9_]{1,15}/', $_POST['username'])){
          $error[] = "Username non valido";
      }else{
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
        }
        # PASSWORD
        if (strlen($_POST["password"]) < 8) {
          $error[] = "Caratteri password insufficienti";
        }
        # CONFERMA PASSWORD
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
        $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $error[] = "Email non valida";
        } else {
          $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
          $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
          }
        }

        #REGISTRAZIONE NEL DATABASE
        if(count($error)==0){
          $name = mysqli_real_escape_string($conn, $_POST['name']);
          $surname = mysqli_real_escape_string($conn, $_POST['surname']);

          $password = mysqli_real_escape_string($conn, $_POST['password']);
          $password = password_hash($password, PASSWORD_BCRYPT);

          $query = "INSERT INTO users(name, surname, username, email, password) 
                    VALUES('$name', '$surname', '$username', '$email', '$password')";

          if (mysqli_query($conn, $query)) {
            //creo la current session
            $_SESSION["_username"] = $_POST["username"];
            $_SESSION["_user_id"] = mysqli_insert_id($conn);
            mysqli_close($conn);
            header("location: home.php");
            exit;
          }else{
            $error[]="Errore di connessione al Database";
          }
        }
        mysqli_close($conn);
      }else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
      }

?>

<html>
  <head>
    
    <link rel="stylesheet" href="./Style/Intro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./Scripts/Signup.js" defer="true"></script>
    <meta charset="utf-8">
    <title> Signup now!</title>

  </head>


  <body>
    <main class="login">
      <section id="Image">
        <img src="./Images/F1Logo.png">
      </section>

      <section id="TextBox">
        <h1>Registrati!</h1>
        <form method='post' autocomplete="off">

        <div class="names">

            <div class="name">
              <div><label for='name'>Nome</label></div>
              <div><input type='text' name='name'></div>
              <span></span>
            </div>

            <div class="surname">
              <div><label for='surname'>Cognome</label></div>
              <div><input type='text' name='surname'></div>
              <span></span>
            </div>

            <div class="username">
              <div><label for='username'>Nome utente</label> </div>
              <div><input type="text" name="username"></div>
              <span></span>
            </div>

            <div class="email">
              <div><label for='email'>Email</label></div>
              <div><input type='text' name='email'></div>
              <span></span>
            </div>

            <div class='password'>
              <div><label for='password'>Password</label></div>
              <div><input type="password" name="password"></div>
              <span></span>
            </div>

            <div class="confirm_password">
              <div><label for='confirm_password'>Conferma Password</label></div>
              <div><input type='password' name='confirm_password'></div>
              <span></span>
            </div>

            <div class="register">
              <input type='submit' value="Registrati">
            </div>
        </div>
        </form>
        <div class="signup">Hai già un account? <a href="Login.php">Accedi</a></div>
      </section>
    </main>
  </body>
</html>