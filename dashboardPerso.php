<?php
  require_once 'header.php';
  
  $res = $pdo->prepare('SELECT * FROM photo WHERE id_user = :id_user');
 $res->execute(['id_user'=> $_SESSION['utilisateur']['id']]);


?>

<div class="container">
    <?php
             if(isset($_SESSION['utilisateur'])){
                    echo('<h4 class="h4 text-center">Toutes les photos de '.$_SESSION['utilisateur']['prenom'].' !</h4>');
             }else{
                echo('<h4 class="h4 text-center">Vous avez été déconnecté</h4>');
             }
                ?>
      <div class="row row-cols-1 row-cols-md-3 mt-5">
    
    <?php
      $photos= $res->fetchAll();
      foreach ($photos as $photo){
        echo('<div class="col mb-4">
        <div class="card border-dark" style="box-shadow: 0 1rem 1rem 0 black;">
        <a title="Voir le détail" href="photo-detail.php?id='.$photo['id'].'"><img src="assets/image/'.$photo['imgName'].'" class="card-img-top" alt=""></a>
        <div class="card-body">
            <p class="card-text">Lieu: '.$photo['lieu_publi'].'</p>
            <a title="Voir le détail" href="photo-detail.php?id='.$photo['id'].'" class="text-info"><i class="fas fa-info-circle"></i><span>  </span>Voir le détail</a>
            <a title="éditer" href="editPhoto.php?id='.$photo['id'].'"><i class="far fa-edit text-success"></i></a>
            <a title="Supprimer" href="photoDelete.php?id='.$photo['id'].'" class="text-left"><i class="fas fa-trash-alt text-danger"></i><span>  </span></a>
        </div>
        </div>
    </div>');
      }
      ?>
      </div>
      </div>