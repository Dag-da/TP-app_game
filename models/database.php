<?php
require("utils/helpers/functions.php");
// require_once("utils/secure_form/index.php");

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
    echo "Erreur de connexion : " . $e->getMessage();
  }
}

/**
 * This function return all games in array
 * 
 * @return array
 */
function get_all($table): array
{
  $pdo = get_PDO();
  $sql = "SELECT * FROM " . $table . " ORDER BY name";
  $query = $pdo->prepare($sql);
  $query->execute();
  $result = $query->fetchAll();

  return $result;
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

/** Erase a line from a table
 * @return void
 */
function delete($table): void
{
  $id = get_id();
  $pdo = get_PDO();
  $sql = "DELETE FROM " . $table . " WHERE id=?";
  $query = $pdo->prepare($sql);
  $query->execute([$id]);
}

// $index = [
//     [
//         "row" => "many",
//         "value" => ":many",
//         "input" => $input,
//         "PARAM_" => PDO::PARAM_STR,
//     ],
// ];

/** Create a entry on table
 * @return void
 */
function create_PDO($table, $adds): void
{
  $rows = implode_key(", ", $adds, "row");
  $values = implode_key(", ", $adds, "value");
  $sql = "INSERT INTO " . $table . "(" . $rows . ") VALUES(" . $values . ")";
  $pdo = get_PDO();
  $query = $pdo->prepare($sql);

  foreach ($adds as $add) :
    if (!empty($add['input'])) {
      $query->bindValue($add["value"], $add['input'], $add['PARAM_']);
    }
  endforeach;

  $query->execute();

  $_SESSION["success"] = "Le produit a été bien ajouté";
  header("Location: index.php");
  die;
}

function implode_up($arrs)
{
  $arr2 = array(); 
  foreach ($arrs as $arr) :
    $arr2[] = $arr['row'] . " = " . $arr['value'];
  endforeach;
  return implode(", ", $arr2);
}

function toggle_cr_to_up($arrs)
{
foreach ($arrs as $arr) :
  if ($arr['value'] == "created_at") {
    $arr['value'] = "updated_at";
  }
endforeach;
return $arrs;
}

/**
 * 
 */
function update($table, $adds): void
{
  $pdo = get_PDO();
  $id = get_id();
  $update_adds = toggle_cr_to_up($adds);
  $set = implode_up($update_adds);
  $sql = "UPDATE " . $table . " SET " . $set . " WHERE id = :id";

  $query = $pdo->prepare($sql);

  foreach ($update_adds as $add) :
    if (!empty($add['input'])) {
      $query->bindValue($add["value"], $add['input'], $add['PARAM_']);
    }
  endforeach;
  $query->bindValue(':id', $id, PDO::PARAM_INT);

  $query->execute();

  $_SESSION["success"] = "Le jeu a bien été modifié";
  // header("Location: index.php");
}
