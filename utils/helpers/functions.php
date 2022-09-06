<?php
function debug_array($arr)
{
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
}

function clear_xss($var)
{
  return trim(htmlspecialchars($var));
}

// function for clear array value
function clear_xss_array($arrs)
{
  $assAR = [];
  foreach ($arrs as $arr) {
    $assAR[] = trim(htmlspecialchars($arr));
  }
}


function clear_xss_multiarr($ARRS)
{
  $result = [];
  foreach ($ARRS as $arrs) {
    foreach ($arrs as $key => $arr) {
      $result[] = [$key => trim(htmlspecialchars($arr))];
    }
  }
  return $result;
}


function clear_xss_arr($arrs)
{
  if (isset($arrs)) {
    $result = [];
    foreach ($arrs as $arr) {
      $result[] = trim(htmlspecialchars($arr));
    }
    return $result;
  }
}

function backup_form($name)
{
  if (!empty($_POST[$name])) {
    return $_POST[$name];
  }
}

function show_error_form($name)
{
  if (!empty($error[$name])) {
    return "<p>" . $error[$name] . "</p>";
  }
}

/** This function create an input type text/number */
function input_varchar($type, $name, $title)
{
  $value = backup_form($name);
  $error = show_error_form($name);
  return "
  <!-- input for name -->
    <div class='mb-3'>
      <label for='" . $name . "' class='font-semibold text-blue-900'>" . $title . "</label>
      <input type='" . $type . "' name='" . $name . "' class='input input-bordered w-full max-w-xs block' value='" . $value . "' />
      " . $error . "
    </div>";
}



/** This function list in "string" different values from multi-array by key 
 * 
 */
function implode_key($glue, $arrs, $key)
{
  $arr2 = array();
  foreach ($arrs as $arr) :
    $arr2[] = $arr[$key];
  endforeach;
  return implode($glue, $arr2);
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

function check_not_empty($arr)
{
  if (!$arr) {
    $_SESSION["error"] = "This game is not available !";
    header("Location: index.php");
  }
}
