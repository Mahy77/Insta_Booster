<?php
  require_once 'header.php';

$idPhoto = $_GET['id'];
$photo = getPhotoById($pdo, $idPhoto);
$errors = [];
$imageUrl = null;
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateEditForm();
    $errors = $returnValidation['errors'];
    $imageUrl = $returnValidation['image'];

    if( count($errors) === 0) {
        updateBdd($pdo, $imageUrl, $photo['id']);
        header('Location: dashboardPerso.php');
    }
}
  ?>

<?php
$idPhoto = $_GET['id'];
$photo = getPhotoById($pdo, $idPhoto);
?>
<div class="container">
        <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
        <form action="editPhoto.php?id=<?php echo($photo['id']);?>" method="post" class="form-signin" enctype="multipart/form-data">
            <div class="form-label-group">
                <input type="text" id="lieu_publi" name="lieu_publi" value="<?php echo($photo['lieu_publi']) ?>" class="form-control" placeholder="lieu_publi" required autofocus>
                <label for="lieu_publi">Où a été prise la photo ?</label>
            </div>
            <img src="<?php echo('assets/image/'.$photo['imgName']);?>"><br><br>
                <input type="file" name="image" id="image"><br><br>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="isPublic" id="isPublic" value="<?php echo($photo['isPublic']) ?>">
                    <label class="form-check-label" for="isPublic">
                        Rendre publique
                    </label>
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