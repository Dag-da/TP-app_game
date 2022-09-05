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