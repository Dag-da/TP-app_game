<?php
  if (!empty($name)) {
    if (
      strlen($name) <= 2
    ) {
      $error["name"] = "<span class=text-red-500>*3 caractères minimum</span>";
    } elseif (strlen($name) > 100) {
      $error["name"] = "<span class=text-red-500>*100 caractères maximum</span>";
    }
  } else {
    $error["name"] = $errorMessage;
  }