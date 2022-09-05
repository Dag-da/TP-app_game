<!-- header -->
<?php
// start session
session_start();
$title = "Afficher jeux"; // title for current page
include("partials/_header.php"); // include header
include("helpers/functions.php"); // include function
// inclure PDO pour la connexion a la BDD dans mon script
require_once("helpers/pdo.php");
// debug_array($_GET)

// 1- verifie qu'on recupere id existant du jeux
// on  verifie que id existe (cad pas vide) et qu'il est numérique
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  // 2- je nettoie mon id contre xss
  $id = clear_xss($_GET['id']);
  // 3- faire la query vers BDD
  $sql = "SELECT * FROM jeux WHERE id= :id";
  // 4- Préparation de la query
  $query = $pdo->prepare($sql);
  // 5- Securise la query contre injection sql
  $query->bindValue(':id', $id, PDO::PARAM_INT);
  // 6 Execute la requette vers la BDD
  $query->execute();
  // 7- On stock tous dans une variable
  $game = $query->fetch();
  // debug_array($game);
  // $game = [];

  if (!$game) {
    $_SESSION["error"] = "This game is not available !";
    header("Location: index.php");
  }
} else {
  $_SESSION["error"] = "URL invalide!";
  header("Location: index.php");
}
?>
<div class="pt-16">
  <?php
  $main_title = $game["name"];
  include("partials/_h1.php");
  ?>
  <div class="f">
    <p class="pt-4"><?= $game["description"] ?></p>
    <div class="pt-6 flex space-x-4">
      <p>Genre: <?= $game["genre"] ?></p>
      <p>Prix <?= $game["price"] ?><span class="font-bold text-blue-500"> €</span></p>
      <p>Note: <?= $game["note"] ?>/10</p>
      <div class="pt-4">
    </div>
    <a href="update.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="btn btn-success text-white">Modifier le jeux</a>
    <?php include("partials/_modal.php") ?>
  </div>
</div>
<!-- footer -->
<?php
include("partials/_footer.php") // include footer
?>
