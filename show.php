<?php
  /**
   * This files show single page
   */
  require_once("models/database.php");
  $game = get_sng("jeux");
  $title = $game['name']; // current page title
  require("view/show_page.php");
?>