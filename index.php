<!-- header -->
<?php
// demarrer session
session_start();
$title = "Accueil"; // title for current page
include("partials/_header.php"); // include header
include("helpers/functions.php"); // include function
// inclure PDO pour la connexion a la BDD dans mon script
require_once("helpers/pdo.php");

require_once("sql/selectAll_game_sql.php")
?>
<!-- main-content -->
<div class="pt-16 wrap__content">
  <!-- head content -->
  <div class="wrap__content-head text-center">
    <?php 
    $main_title = "App Game";
    include('partials/_h1.php') 
    ?>
    <p>L'app qui repertorie vos jeux</p>
    <!-- button for add game -->
    <div class="pt-4">
      <a href="add_game.php" class="btn btn-primary">Add Game</a>
    </div>
    <?php
    require_once("partials/_alert.php");
    ?>
  </div>
  <!-- table -->
  <div class="overflow-x-auto mt-16">
    <table class="table w-full">
      <!-- head -->
      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Genre</th>
          <th>Plateforme</th>
          <th>Prix</th>
          <th>PEGI</th>
          <th>Voir</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (count($games) == 0) {
          echo "<tr><td class=text-center>Pas de jeux disponible actuellement</td></tr>";
        } else { 
          $game_id = 0;
          foreach ($games as $game) : ?>
            <tr class="hover:text-blue-500">
              <th><?= ++$game_id ?></th>
              <td><a href="show.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>"><?= $game['name'] ?></a></td>
              <td><?= $game['genre'] ?></td>
              <td><?= $game['plateform'] ?></td>
              <td><?= $game['price'] ?></td>
              <td><?= $game['pegi'] ?></td>
              <td>
                <a href="show.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>">
                  <img src="img/loupe.png" alt="loupe" class="w-4">
                </a>
              </td>
              <td>
                <?php include("partials/_modal.php") ?>
              </td>
            </tr>
          <?php endforeach ?>
        <?php } ?>
      </tbody>
    </table>
  </div>

</div>
<!-- end main-content -->

<!-- footer -->
<?php
include("partials/_footer.php") // include footer
?>
