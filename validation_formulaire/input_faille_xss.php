<?php
  $name = clear_xss($_POST["name"]);
  $price = clear_xss($_POST["price"]);
  $note = clear_xss($_POST["note"]);
  $description = clear_xss($_POST["description"]);
  // clear array genre with foreach
  $tableau_sale_de_genre = !empty($_POST["genre"]) ? $_POST["genre"] : [];
  // je crée un nouveau tableau pour les elements nettoyer
  $tableau_propre_de_genre = [];
  foreach ($tableau_sale_de_genre as $linge_sale) {
    // je lave chaque element et je l'insere dans le nouveau tableau
    $tableau_propre_de_genre[] = clear_xss($linge_sale);
  };
  // clear array plateforms with foreach
  $tableau_sale_platforms = !empty($_POST["plateform"]) ? $_POST["plateform"] : [];
  // je crée un nouveau tableau pour les elements nettoyer
  $tableau_propre_de_plateforms = [];
  foreach ($tableau_sale_platforms as $linge_sale) {
    // je lave chaque element et je l'insere dans le nouveau tableau
    $tableau_propre_de_plateforms[] = clear_xss($linge_sale);
  };
  $pegi = !empty($_POST["pegi"]) ? clear_xss($_POST["pegi"]) : [];
  // $url_img = $img_upload_path;
  debug_array($_FILES);
  $files = clear_xss_multiarr($_FILES);
  debug_array($files);