<?php
  require_once 'header.php';
  $reponse = $pdo->query('SELECT * FROM photo');
  $reponse2 = $pdo->query('SELECT * FROM photo where isPublic = 1');

?>
    <div class="container">
    <?php
             if(isset($_SESSION['utilisateur'])){
                    echo('<h4 class="h4 text-center">bonjour '.$_SESSION['utilisateur']['prenom'].' !</h4>');
             }else{
                echo('<h4 class="h4 text-center">Connectez vous pour avoir accès à plus de photos</h4>');
             }
                ?>
      <div class="row row-cols-1 row-cols-md-3 mt-5">
    
    <?php
        if(isset($_SESSION['utilisateur'])){
      $photos= $reponse->fetchAll();
      foreach ($photos as $photo){
        echo('<div class="col mb-4">
        <div class="card border-dark" style="box-shadow: 0 1rem 1rem 0 black;">
        <a title="Voir le détail" href="photo-detail.php?id='.$photo['id'].'"><img src="assets/image/'.$photo['imgName'].'" class="card-img-top" alt=""></a>
        <div class="card-body">
            <h5 class="card-title">Publiée : '.$photo['lieu_publi'].'</h5>
            <a title="Voir le détail" href="photo-detail.php?id='.$photo['id'].'" class="text-info"><i class="fas fa-info-circle"></i><span>  </span>Voir le détail</a>
        </div>
        </div>
    </div>');
      }}else{
        $photos= $reponse2->fetchAll();
        foreach ($photos as $photo){
          echo('<div class="col mb-4">
          <div class="card border-dark" style="box-shadow: 0 1rem 1rem 0 black;">
          <a title="Voir le détail" href="photo-detail.php?id='.$photo['id'].'"><img src="assets/image/'.$photo['imgName'].'" class="card-img-top" alt=""></a>
          <div class="card-body">
              <h5 class="card-title">Publiée : '.$photo['lieu_publi'].'</h5>
              <a title="Voir le détail" href="photo-detail.php?id='.$photo['id'].'" class="text-info"><i class="fas fa-info-circle"></i><span>  </span>Voir le détail</a>
          </div>
          </div>
      </div>');
      }
    }
        ?>
        </div>
    </div>