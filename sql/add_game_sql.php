<?php
$sql = "INSERT INTO jeux(name, price, genre, note, plateform, pegi, description, created_at, url_img) VALUES(:name, :price, :genre, :note, :plateform, :pegi, :description, NOW(), :url_img)";


$query = $pdo->prepare($sql);

$query->bindValue(':name', $name, PDO::PARAM_STR);
$query->bindValue(':price', $price, PDO::PARAM_STMT);
$query->bindValue(':genre', implode(", ", $tableau_propre_de_genre), PDO::PARAM_STR);
$query->bindValue(':note', $note, PDO::PARAM_STMT);
$query->bindValue(':plateform', implode(", ", $tableau_propre_de_plateforms), PDO::PARAM_STR);
$query->bindValue(':pegi', $pegi, PDO::PARAM_STMT);
$query->bindValue(':description', $description, PDO::PARAM_STR);
$query->bindValue(':url_img', $url_img, PDO::PARAM_STR);

$query->execute();

$_SESSION["success"] = "Le jeu a bien été ajouté";
// header("Location: index.php");