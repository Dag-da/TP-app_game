<?php

require_once("input_upload_img.php");
require_once("input_faille_xss.php");
require_once("input_name.php");
require_once("textarea_description.php");
require_once("input_genre.php");
require_once("input_note.php");
require_once("input_pegi.php");
require_once("input_plateform.php");
require_once("input_price.php");
$adds =
    [
        [
            "row" => "name",
            "value" => ":name",
            "input" => $name,
            "PARAM_" => PDO::PARAM_STR,
        ],
        [
            "row" => "price",
            "value" => ":price",
            "input" => $price,
            "PARAM_" => PDO::PARAM_STMT,
        ],
        [
            "row" => "genre",
            "value" => ":genre",
            "input" => implode(", ", $tableau_propre_de_genre),
            "PARAM_" => PDO::PARAM_STR,
        ],
        [
            "row" => "note",
            "value" => ":note",
            "input" => $note,
            "PARAM_" => PDO::PARAM_STMT,
        ],
        [
            "row" => "plateform",
            "value" => ":plateform",
            "input" => implode(", ", $tableau_propre_de_plateforms),
            "PARAM_" => PDO::PARAM_STR,
        ],
        [
            "row" => "pegi",
            "value" => ":pegi",
            "input" => $pegi,
            "PARAM_" => PDO::PARAM_STMT,
        ],
        [
            "row" => "description",
            "value" => ":description",
            "input" => $description,
            "PARAM_" => PDO::PARAM_STR,
        ],
        [
            "row" => "created_at",
            "value" => "NOW()",
        ],
        [
            "row" => "url_img",
            "value" => ":url_img",
            "input" => $url_img,
            "PARAM_" => PDO::PARAM_STR,
        ],
    ];