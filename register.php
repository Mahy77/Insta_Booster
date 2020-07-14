<?php 
    require_once 'connection-bdd.php';
    require_once 'header.php';
    $errors = [];
    if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
        $errors = validateUserForm($pdo)['errors'];

        if (count($errors) === 0) {
            addUser($pdo);
            header('Location: login.php');
        }
    }
?>


        <div class="container">
        <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
        <form action="register.php" method="post" class="form-signin">
            <div class="form-label-group">
                <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Email address" required autofocus>
                <label for="pseudo">Pseudo</label>
            </div>
            <div class="form-label-group">
                <input type="mail" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="email">Email</label>
            </div>
            <div class="form-label-group">
                <input type="text" id="prenom" name="prenom" class="form-control" placeholder="prenom" required autofocus>
                <label for="prenom">Votre prenom</label>
            </div>
            <div class="form-label-group">
                <input type="text" id="nom" name="nom" class="form-control" placeholder="nom" required autofocus>
                <label for="nom">Votre nom</label>
            </div>
            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Mot de passe</label>
            </div>
                <button type="submit" class="btn btn-lg btn-outline-success btn-block text-uppercase">Soumettre</button>
        </form>

        <?php 
            if (count($errors) != 0){
                foreach($errors as $error){
                    echo('<p>'.$error.'</p>');
                }
            }
        ?>
        </div>
        </div>
        </div>
        </div>
        </div>
    