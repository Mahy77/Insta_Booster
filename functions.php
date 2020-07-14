<?php 

function getPseudo($pdo){
    $res = $pdo->prepare('SELECT * FROM `insta-booster`.utilisateur WHERE pseudo = :pseudo');
    $res->execute(['pseudo' => $_POST['pseudo']]);
    return $res;
}

function validateUserForm($pdo){
    $errors = [];

    if (getPseudo($pdo)-> fetch()){
        $errors[] = 'Pseudo non disponible';
    }
    if (empty($_POST['pseudo'])) {
        $errors[] = 'Veuillez saisir un pseudo';
    }
    if (empty($_POST['email'])) {
        $errors[] = 'Veuillez saisir un mail';
    }
    if (empty($_POST['nom'])) {
        $errors[] = 'Veuillez saisir un nom';
    }
    if (empty($_POST['prenom'])) {
        $errors[] = 'Veuillez saisir un prenom';
    }
    if (empty($_POST['password'])) {
        $errors[] = 'Veuillez saisir un mot de passe';
    }
    return ['errors' => $errors];
}

function validateLoading() {
    $errors = [];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        if ($_FILES['image']['size'] <= 10000000) {
            $extensionFile = $_FILES['image']['type'];
            $authorizedExtensions = ['image/jpeg', 'image/png', 'image/gif'];

            if (!in_array($extensionFile, $authorizedExtensions)) {
                $errors[] = 'Je n\'accepte que des images';
            }

        } else {
            $error[] = 'le fichier est trop lourd pour un petit serveur ... ';
        }
    } else {
        $errors[] = 'Une image est requise';
    }
    return $errors;
}


function addUser($pdo){
        $req = $pdo->prepare(
            'INSERT INTO utilisateur (pseudo, email, prenom , nom, password)
        VALUES(:pseudo, :email, :prenom, :nom, :password)');
        $req->execute([
            'pseudo' => $_POST['pseudo'],
            'email' => $_POST['email'],
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'password' => md5($_POST['password'])
        ]);

}

function validateLogin() {
    $errors= [];
    if (empty($_POST['pseudo'])) {
        $errors[] = 'Veuillez saisir un pseudo';
    }
    if (empty($_POST['password'])) {
        $errors[] = 'Veuillez saisir un mot de passe';    
    }
return ['errors' => $errors];
    }

    function addImgBdd($pdo, $fileName){
        $query = $pdo->prepare('INSERT INTO photo(imgName, lieu_publi, date_publication, id_user, isPublic)
    VALUES(:imgName, :lieu_publi, :date_publication, :id_user, :isPublic)');
        $query->execute([
            'imgName' => $fileName,
            'lieu_publi' => empty($_POST['lieu_publi']) ? 'Non renseigné' : $_POST['lieu_publi'],
            'date_publication' => date("Y-m-d H:i:s"),
            'id_user' => $_SESSION['utilisateur']['id'],
            'isPublic' => isset($_POST['isPublic']) ? 1 : 0
        ]);
    }

function checkUser($pdo) {
   
    $res = $pdo -> prepare(
        'SELECT * from utilisateur where pseudo = :pseudo and password = :password'
    );
    $res -> execute([
        'pseudo' => $_POST['pseudo'],
        'password' => md5($_POST['password'])
    ]);
        $result = $res -> fetch();
        if ($result){
            session_start();
            $_SESSION['utilisateur'] = $result;
        }else{
            $errors =[];
            $errors[] = 'Pseudo ou mot de passe incorrect';
        }
        return $errors;
}

function deletePhoto($pdo, $id){
    $res = $pdo->prepare('DELETE FROM photo WHERE id = :id');
    $res->execute(['id'=> $id]);
}

function getPhotoById($pdo, $id) {
    $query = $pdo->prepare('SELECT * FROM photo WHERE id=:id');
    $query->execute([
        'id' => $id
    ]);
    return $query;
}
?>