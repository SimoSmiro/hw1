
<html>
  <head>
    
    <link rel="stylesheet" href="./Style/Home.css">
    <script src="./Scripts/Home.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Ultimissime!</title>

  </head>


  <body>
    
    <main>

      <nav>
        <a href="Home.php" class="FullOnly">HOME</a>
        <a href="Preferiti.php" class="FullOnly">PREFERITI</a>
        <a href="Profile.php" class="FullOnly" >PROFILE</a>

        <div id="menu" onclick="toggleMenu(this)">

          <div></div>
          <div></div>
          <div></div>

          <ul id="MobileMenu">
            <li><a href="Home.php">HOME</a></li>
            <li><a href="Preferiti.php">PREFERITI</a></li>
            <li><a href="Profile.php">PROFILE</a></li>
          </ul>
        </div>
      </nav>

      <section id="WelcomeBox">
        <img src="./Images/F1Logo.png">
        <h1 id="title">Benvenuto a F1 SS Blog!</h1>
      </section>

      <section id="ChampSection">
        <div>
          <form id="ChampForm">
            <label for='ChampSearch'>Cerca campione del mondo per anno:</label>
            <input type="text" name="ChampSearch" id="ChampSearch">
            <input type="submit" id="ChampButton" value="Cerca">
          </form>
          <section id="results">
            <div id="driver"></div>
            <div id="points"></div>
          </section>
        </div>
      </section>


      <section id="contents">
          <!-- DINAMIC LOADO!!!  -->
      </section>





    </main>
    <footer>
      Developed by Simone Smiroldo 
      </br>
    </footer>

  </body>
</html>