<?php
// 1- On écrit la requête

$sql = "UPDATE jeux SET 
name = :name,
price = :price,
genre = :genre,
note = :note,
plateform = :plateform,
pegi = :pegi,
description = :description,
updated_at = NOW(),
url_img = :url_img
WHERE id = :id
";

// 2- Preparation de la requête
$query = $pdo->prepare($sql);

// 3- Protection SQL en associant requête et valeur
$query->bindValue(':name', $name, PDO::PARAM_STR);
$query->bindValue(':price', $price, PDO::PARAM_STMT);
$query->bindValue(':genre', implode(", ", $tableau_propre_de_genre), PDO::PARAM_STR);
$query->bindValue(':note', $note, PDO::PARAM_STMT);
$query->bindValue(':plateform', implode(", ", $tableau_propre_de_plateforms), PDO::PARAM_STR);
$query->bindValue(':pegi', $pegi, PDO::PARAM_STMT);
$query->bindValue(':description', $description, PDO::PARAM_STR);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->bindValue(':url_img', $url_img, PDO::PARAM_STR);

// 4- Exécution de la requête
$query->execute();

// Redirection
$_SESSION["success"] = "Le jeu a bien été modifié";
header("Location: index.php");
