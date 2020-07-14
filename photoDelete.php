<?php
  require_once 'header.php';
  $id = $_GET['id'];
  deletePhoto($pdo, $id);
  header('Location: dashboardPerso.php');

?>