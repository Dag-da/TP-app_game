<?php
require("helpers/functions.php");

/**
 * Get connexion with DB
 * 
 * @return PDO
 */
function get_PDO(): PDO
{
  $serveur = "localhost";
  $dbname = "app_game";
  $login = "root";
  $password = "";

  try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
    return $pdo;
  } catch (PDOException $e) {
    echo "Erreur de connexion : ". $e->getMessage();
  }
}

/**
 * This function return all games in array
 * 
 * @return array
 */
function get_all($table):  array
{
  $pdo = get_PDO();
  $sql = "SELECT * FROM ".$table." ORDER BY name";
  $query = $pdo->prepare($sql);
  $query->execute();
  $result = $query->fetchAll();

  return $result;
}

/** This function check and return ID
 * @return int
 */
function get_id(): int
{
  if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = clear_xss($_GET['id']);
  } else {
    $_SESSION["error"] = "URL invalide!";
    header("Location: index.php");
  }
  
  return $id;
}

/**
 * This function return a single game in array
 * 
 * @return array
 */
function get_sng(): array
{
  $pdo = get_PDO();
  $id = get_id();
  $sql = "SELECT * FROM jeux WHERE id= :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $result = $query->fetch();
  
  if (!$result) {
    $_SESSION["error"] = "This game is not available !";
    // header("Location: index.php");
  }
  
  return $result;
}

