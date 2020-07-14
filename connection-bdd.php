<?php

try {
   $host = 'localhost';
 $dbName = 'insta-booster';
 $user = 'root';
 $password = 'root';
 $pdo = new PDO(
 'mysql:host='.$host.';dbname='.$dbName.';charset=utf8',
 $user,
 $password);
 // Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage());
    exit;
}
?>