<?php
// demarre session
session_start();
include("helpers/functions.php"); // include function
// 1- connexion a ma BDD
// inclure PDO pour la connexion a la BDD dans mon script
require_once("helpers/pdo.php");
// 2- requête delete
require_once('sql/delete_game_sql.php');

//6- redirection
$_SESSION["success"] = "Le jeu est bien supprimé !";
header("Location:index.php");