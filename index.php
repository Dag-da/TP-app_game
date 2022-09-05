<?php
  /**
   * This files show the home page
   */
  require_once("models/database.php");
  $games = get_all("jeux");
  require("view/home_page.php");
?>
