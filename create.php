<?php

/**
 * This files show create page
 */
session_start();
require_once("models/database.php");
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";

if (!empty($_POST["submited"])) {
    require_once("utils/secure_form/index.php");
    if (count($error) == 0) {
        create_PDO("jeux", $adds);
    }
}
require("view/create_page.php");
