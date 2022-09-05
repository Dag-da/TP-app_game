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
  foreach ($ARRS as $arrs)
  {
  foreach ($arrs as $key => $arr)
  {
    $result[] = [$key => trim(htmlspecialchars($arr))];
  }
}
  return $result;
}


function clear_xss_arr($arrs)
{
  if (isset($arrs))
    {
    $result = [];
    foreach ($arrs as $arr)
      {
        $result[] = trim(htmlspecialchars($arr));
      }
    return $result;
    }
}
