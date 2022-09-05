<?php
session_start();
ob_start();
require("partials/_show.php");
$content = ob_get_clean();
require("layout.php");