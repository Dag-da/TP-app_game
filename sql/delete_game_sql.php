<?php
// 2- Recupere id dans URL et je nettoie
$id = clear_xss($_GET["id"]);
// 3- requette vers BDD
$sql = "DELETE FROM jeux WHERE id=?";
// 4- prepare ma query
$query = $pdo->prepare($sql);
// 5- on execute la query
$query->execute([$id]);