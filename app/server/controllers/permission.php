<?php

session_start();

require_once('../services/permission.php');

$permission = new Permission();

switch ($_GET["action"]) {
  case 'getAllPermissions':
    try {
      $result = getAllPermissions($permission);

      echo json_encode($result);
    } catch (Exception $th) {
      throw new Exception($e);
    }
    break;
}

function getAllPermissions($class) {
  $result = $class->getAllPermissions();
  $data = Array();

  while ($reg = $result->fetch_object())
  {
    $data[] = array(
      "0"=>$reg->name
    );
  }

  $result = array(
    "sEcho"=>1,
    "iTotalRecords"=>count($data),
    "iTotalDisplayRecords"=>count($data),
    "aaData"=>$data
  );

  return $result;
}
?>