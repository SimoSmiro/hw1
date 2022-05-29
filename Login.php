<?php

session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
  $error = array();

  $conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());

  if(!preg_match('/[a-zA-Z0-9_]{1,15}/', $_POST['username'])){
    $error[] = "Username non valido";
  }

  if (strlen($_POST["password"]) < 8) {
    $error[] = "Caratteri password insufficienti";
  }

  if(count($error)==0){

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = " SELECT * FROM users WHERE username = '$username' ";

    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0 ){

      $result = mysqli_fetch_assoc($res);

      if(password_verify($_POST["password"], $result["password"])){
        $_SESSION["_username"] = $_POST["username"];
        $_SESSION["_user_id"] = $result["id"];
        header("location: home.php");
        mysqli_free_result($res);
        mysqli_close($conn);
        exit;

      }else{
        $error[]="Username / Password errati!";
      }
    }
  }
}
?>
<html>
  <head>
    
    <link rel="stylesheet" href="./Style/Intro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

  </head>


  <body>
    <main class="login">
      <section id="Image">
        <img src="./Images/F1Logo.png">
      </section>

      <section id="TextBox">
        <h1>Benvenuto!</h1>
        <form method="POST">
          <div class="username">
            <div><label for='username'>Nome utente</label> </div>
            <input type="text" name="username">
          </div>
          <div class='password'>
            <div><label for='password'>Password</label></div>
            <input type="password" name="password">
          </div>
          <div class="remember">
            <div><input type='checkbox' name='remember' value="1"></div>
            <div><label for='remember'>Ricorda l'accesso</label></div>
          </div>
          <div class="accedi">
            <input type='submit' value="Accedi">
          </div>
        </form>
        <div class="signup">Non hai un account? <a href="signup.php">Iscriviti</a></div>
      </section>
    </main>
  </body>
</html>