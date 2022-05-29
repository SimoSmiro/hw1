<?php
    //Salvare e visualizzare le modifiche apportate

    // Avvio della sessione
    session_start();

    // Connessione al DB
    $conn = mysqli_connect("127.0.0.1", "root", "", "hw1") or die("ERRORE: ".mysqli_connect_error());

    // Prendo l'id della sessione che corrisponde all'id dell'utente
    $id = mysqli_real_escape_string($conn, $_SESSION["_user_id"]);

    // Controllo cosa è stato modificato
    if(isset($_POST["new_name"])) 
    {
        $new_name =  mysqli_real_escape_string($conn, $_POST["new_name"]);

        // Creo la query
        $query = "UPDATE users SET name = '$new_name' WHERE id = '$id'";

        $res = mysqli_query($conn, $query);

        if(!$res) 
        {
            $error = "Modifica del name fallita";
        }
    }
    else if(isset($_POST["new_surname"])) 
    {
        $new_surname =  mysqli_real_escape_string($conn, $_POST["new_surname"]);

        $query = "UPDATE users SET surname = '$new_surname' WHERE id = '$id'";

        $res = mysqli_query($conn, $query);

        if(!$res) 
        {
            $error = "Modifica del cognome fallita";
        }
    }
    else if(isset($_POST["new_username"])) 
    {
        if(strlen($_POST["new_username"]) > 16) 
        {
            $error = "Inserire max 16 caratteri";
        }
        else
        {
            if(!preg_match('/[a-zA-Z0-9_]{1,15}/', $_POST['new_username'])) 
            {
                $error = "Username non valido";
            } 
            else
            { 
                $new_username =  mysqli_real_escape_string($conn, $_POST["new_username"]);

                $query = "UPDATE users SET username = '$new_username' WHERE id = '$id'";

                $res = mysqli_query($conn, $query);

                if(!$res) 
                {
                    $error = "Modifica dell'username fallita";
                }
            }
        }
    }
    else if(isset($_POST["new_email"]))
    {
        if (!filter_var($_POST['new_email'], FILTER_VALIDATE_EMAIL)) 
        {
            $error = "Email non valida";
        } 
        else 
        {
            $new_email = mysqli_real_escape_string($conn, strtolower($_POST['new_email'])); //permette di inserire l'email anche MAIUSC

            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) 
            {
                $error = "Email già utilizzata";
            }
            else
            {
                $query = "UPDATE users SET email = '$new_email' WHERE id = '$id'";

                $res = mysqli_query($conn, $query);

                if(!$res) 
                {
                    $error = "Modifica del'email fallita";
                }
            }
        }
    }
    else if(isset($_POST["new_password"]))
    {
        if (strlen($_POST["new_password"]) < 8) 
        {
            $error = "Inserire min 8 caratteri";
        } 
        else
        {
            $new_password =  mysqli_real_escape_string($conn, $_POST["new_password"]);
            $new_password = password_hash($new_password, PASSWORD_BCRYPT); // la rendo non visibile nel database

            $query = "UPDATE users SET password = '$new_password' WHERE id = '$id'";

            $res = mysqli_query($conn, $query);

            if(!$res) 
            {
                $error = "Modifica della password fallita";
            }
        }
    }

?>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./Style/Profile.css">
    <script src= "./Scripts/Profile.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="./Images/F1logo.png">
    <title> Profile Editor</title>
  </head>

  <body>
    <section class="credentials">
    <h1>Il tuo profilo </h1>
      <?php

        $conn = mysqli_connect('127.0.0.1', 'root', "",'hw1') or die(mysqli_connect_error());
        
        $id = mysqli_real_escape_string($conn, $_SESSION["_user_id"]);

        $query = "SELECT * FROM users WHERE id='$id'";

        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) > 0 ){

          $result = mysqli_fetch_assoc($res);

          echo 
          "<main>",
          "<section class='left'>",
            "<p>Nome:    ".$result["name"]."      </p>",
            "<p>Cognome: ".$result["surname"]."   </p>",
            "<p>Username:".$result["username"]."  </p>",
            "<p>Email:   ".$result["email"]."     </p>",
            "<p>Password: </p>",
          "</section>",

          "<section class='right'>",
            "<button id='B_name'> Modifica </button> <form method='post' id='name'>  </form>",
            "<button id='B_surname'> Modifica </button> <form method='post' id='surname'>  </form>",
            "<button id='B_username'> Modifica </button> <form method='post' id='username'>  </form>",
            "<button id='B_email'> Modifica </button> <form method='post' id='email'>  </form>",
            "<button id='B_password'> Modifica </button> <form method='post' id='password'>  </form>",
          "</section>",
          "</main>";
        }
      
      ?>

      <section id="bottomContainer">
        <a id="logout" href="Logout.php">LOGOUT</a>
        <a id="preferiti" href="Preferiti.php">PREFERITI</a>
        <a id="return" href="Home.php">BACK</a>        
      </section>

    </section>


  </body>

</html>