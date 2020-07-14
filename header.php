<?php
    require_once 'connection-bdd.php';
    require_once 'functions.php';
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <title>Insta Booster</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i></a>
      </li>
      <li class="nav-item">
        
          <?php
            if(isset($_SESSION['utilisateur'])){
                echo('
                <li class="nav-item"><a class="nav-link" href="dashboardPerso.php">Mes photos</a></li>
                <li class="nav-item"><a class="nav-link" href="add-photo.php">ajouter des photos</a></li>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">voir toutes les photos</a></li>'); 
            }
            else{
            echo('<li class="nav-item"><a class="nav-link" href="dashboard.php">voir toutes les photos</a></li>'); 
            
            }
            ?>
      </li>
     
    
    </ul>
    
    <ul class="navbar-nav">
        <li class="nav-item text-center">
          <?php
             if(isset($_SESSION['utilisateur'])){
                 echo('<a href="monCompte.php" class="nav-link"><i class="fas fa-user"></i></a>');
                echo('<a href="logout.php" class="nav-link">Deconnexion</a>');
            
             }
             else{
                echo('<a href="login.php" class="nav-link">Se connecter</a>');
            
             }?>
        </li>
    </ul> 
  </div>
</nav>




</body>