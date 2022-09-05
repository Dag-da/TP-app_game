<?php
//1-  Query to get all games
$sql = "SELECT * FROM jeux ORDER BY name";
//2- Prépare la query (preformatter)
$query = $pdo->prepare($sql);
//3 - Execute ma requette
$query->execute();
//4 - stock my query in variable
$games = $query->fetchAll();