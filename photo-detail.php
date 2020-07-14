<?php
  require_once 'header.php';


?>

<?php
 $res = $pdo->prepare('SELECT * FROM photo
 join utilisateur on photo.id_user = utilisateur.id WHERE photo.id = :id');
 $res->execute(['id'=> $_GET['id']]);
 $fetchRes = $res->fetch();
 
 ?>

<div class="container text-center">
  <h1 class="display-3">Photo</h1><br>
 <img src="<?php echo('assets/image/'.$fetchRes['imgName']); ?>" alt="Image de la planète <?php echo('assets/image/'.$fetchRes['assets/image/']); ?>" class="rounded" style="box-shadow: 0 1rem 1rem 0 black;">
 <h3 class="mt-2">auteur:</h3>
 <p><?php echo($fetchRes['prenom']) ?></p>
 <h3>Date:</h3>
 <p><?php echo date('d/m/Y', strtotime($fetchRes['date_publication'])) ?></p>
 <div class="form-signin">
 <a href="dashboard.php" class="btn btn-outline-success"><i class="fas fa-backward"></i><span>  </span>Retour</a>
 </div>
 </div>