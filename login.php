<?php
    require_once 'header.php';
    $errors = [];
    if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
        $errors = validateLogin()['errors'];

        if (count($errors) === 0) {
            $errors = checkUser($pdo);
            if (count($errors) === 0){
            header('Location: dashboard.php');
        }
        }
    }
?>


  <div class=" container my-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin">
          <div class="card-body">
            <h5 class="card-title text-center">Connexion</h5>
            <form class="form-signin" method="post">
              
            <div class="form-label-group">
                <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Email address" required autofocus>
                <label for="pseudo">Pseudo</label>
            </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Mot de passe</label>
              </div>
              <button class="btn btn-lg btn-outline-info btn-block text-uppercase" type="submit">Se connecter</button>
              <hr class="my-4">
              <p class="text-center card-text">Nouvel utilisateur?</p>
              <div class="text-center">
              <a href="register.php">Je crée un compte</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
    <?php 
    if (count($errors) != 0) {
        foreach($errors as $error){
            echo('<p class="text-center text-danger">'.$error.'</p>');
        }
    }
?>   
</div>
