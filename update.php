<?php

/**
 * This files show create page
 */
require_once("models/database.php");
$game = get_sng("jeux");
check_not_empty($game);
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";

if (!empty($_POST["updated"])) {
  require_once("utils/secure_form/index.php");
  if (count($error) == 0) {
    update("jeux", $adds);
  }
}
require("view/update_page.php");
