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

// création array error
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
// variable success
$success = false;

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
  // 7- On stock le jeu dans une variable
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

// 2- On envoie vers le BDO
if (!empty($_POST["updated"]))
{
  // 2 faille xss
  require_once("validation_formulaire/index.php");

  if (count($error) == 0) {
    require_once("sql/update_game_sql.php");
  }
}
?>
<div class="pt-16">
  <a href="index.php" class=""><img src="img/return.svg" alt="" class="w-5"> Revenir à la page d'accueil</a>
</div>
<section class="py-12">
  <a href="index.php" class="text-pink-400 text-sm"><- retour</a>
  <?php
  $main_title = "Modifier un jeu";
  include("partials/_h1.php")
  ?>
  <form action="" method="POST">
    <!-- input for name -->
    <div class="mb-3">
      <label for="name" class="font-semibold text-blue-900">Nom</label>
      <input type="text" name="name" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                if (!empty($_POST["name"])) {
                                                                                                  echo $_POST["name"];
                                                                                                } else { echo $game["name"]; } ?>" />
      <p>
        <?php
        if (!empty($error["name"])) {
          echo $error["name"];
        }
        ?>
      </p>
    </div>
    <!-- input for price -->
    <div class="mb-3">
      <label for="price" class="font-semibold text-blue-900">Prix</label>
      <input type="number" step="0.01" name="price" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                if (!empty($_POST["price"])) {
                                                                                                  echo $_POST["price"];
                                                                                                } else { echo $game["price"]; } ?>" />
      <p>
        <?php
        if (!empty($error["price"])) {
          echo $error["price"];
        }
        ?>
      </p>
    </div>
    <!-- input for genre -->
    <?php
    $genreArray = [
      ["name" => "Aventure", "checked" => "checked"],
      ["name" => "Course"],
      ["name" => "FPS"],
      ["name" => "RPG"],
    ];
      $game_genre = explode(", ", $game["genre"]);
      ?>
    <h2 class="font-semibold text-blue-900">Genre</h2>
    <div class="mt-2 mb-3 flex space-x-6">
      <?php foreach ($genreArray as $genre) : ?>
        <div class="flex item-center space-x-3">
          <label><?= $genre["name"] ?></label>
          <input type="checkbox" name="genre[]" class="checkbox" value="<?= $genre["name"] ?>" <?php
          if(!empty($_POST["genre"])) {
            if (in_array($genre["name"], $_POST["genre"])) echo "checked";
          } else {
            if (in_array($genre["name"], $game_genre)) echo "checked";
          }
            ?> />
        </div>
        <?php endforeach ?>
    </div>
    <p>
      <?php
      if (!empty($error["genre"])) {
        echo $error["genre"];
      }
      ?>
    </p>
    <!-- input for note -->
    <div class="mb-3">
      <label for="note" class="font-semibold text-blue-900">Note</label>
      <input type="number" step="0.1" name="note" class="input input-bordered w-full max-w-xs block" value="<?= $game["note"] ?>" />
      <p>
        <?php
        if (!empty($error["note"])) {
          echo $error["note"];
        }
        ?>
      </p>
    </div>
    <!-- input for plateforms -->
    <?php
    $plateformArray = [
      ["name" => "Switch", "checked" => "checked"],
      ["name" => "Xbox"],
      ["name" => "PS4"],
      ["name" => "PS5"],
      ["name" => "PC"],
    ];
    $game_plateform = explode(", ", $game["plateform"]);
    ?>
    <h2 class="font-semibold text-blue-900">Plateforme</h2>
    <div class="mt-2 mb-3 flex space-x-6">
      <?php foreach ($plateformArray as $plateform) : ?>
        <div class="flex item-center space-x-3">
          <label><?= $plateform["name"] ?></label>
          <input type="checkbox" name="plateform[]" class="checkbox" value="<?= $plateform["name"] ?>" <?php
            if (in_array($plateform["name"], $game_plateform)) echo "checked";
            ?> />
        </div>
      <?php endforeach ?>
    </div>
    <p>
      <?php
      if (!empty($error["plateform"])) {
        echo $error["plateform"];
      }
      ?>
    </p>
    <!-- input description -->
    <div class="mt-5">
      <label for="description" class="font-semibold text-blue-900">Description</label>
      <textarea name="description" class="textarea textarea-bordered block" placeholder="Description du jeu"><?= $game["description"] ?></textarea>
      <p>
        <?php
        if (!empty($error["description"])) {
          echo $error["description"];
        }
        ?>
      </p>
    </div>
    <!-- select for PEGI -->
    <?php
    $pegiArr = [
      ["name" => 3],
      ["name" => 7],
      ["name" => 12],
      ["name" => 16],
      ["name" => 18],
    ]

    ?>
    <div class="">
      <h2 class="font-semibold text-blue-900 pt-4 pb-2">PEGI</h2>
      <select class="select select-bordered w-full max-w-xs" name="pegi">
        <option disabled selected>Choose ?</option>
        <?php foreach ($pegiArr as $pegi) : ?>
          <option value="<?= $pegi["name"] ?>" <?php
              if ($game["pegi"] == $pegi["name"]) echo "selected='selected'";
            ?>><?= $pegi["name"] ?></option>
        <?php endforeach ?>
      </select>
      <p>
        <?php
        if (!empty($error["pegi"])) {
          echo $error["pegi"];
        }
        ?>
      </p>
    </div>
    <!-- input id -->
    <input type="hidden" name="id" value="<?= $game["id"] ?>" />
    <!-- submit btn -->
    <div class="mt-4">
      <input type="submit" name="updated" value="Update" class="btn bg-blue-500">
    </div>
  </form>
</section>