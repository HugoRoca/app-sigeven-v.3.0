<?php

session_start();

require_once('../services/user.php');

$user = new User();

switch ($_GET['action']) {
  case 'signin':
    try {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $fetch = signin($username, $password, $user);

      echo json_encode($fetch);
    } catch (Exception $e) {
      echo json_encode($e);
    }
    break;
  case 'signout':
    signout();
    break;
}

function signin($userName, $password, $class) 
{
  $passwordHash = $password;
  $result = $class->signIn($userName, $passwordHash);
  $fetch = $result->fetch_object();

  if (isset($fetch)) 
  {
    $_SESSION['id'] = $fetch->id;
    $_SESSION['name'] = $fetch->name;
    $_SESSION['image'] = $fetch->image;
    $_SESSION['user_name'] = $fetch->user_name;

    // get permissions by user id
    $permissions = $class->getPermissionByUserId($fetch->id);

    $values = array();

    while ($per = $permissions->fetch_object())
    {
      array_push($values, $per->id_permission);
    }

    in_array(1, $values) ? $_SESSION["dashboard"] = 1 : $_SESSION["dashboard"] = 0;
    in_array(2, $values) ? $_SESSION["warehouse"] = 1 : $_SESSION["warehouse"] = 0;
    in_array(3, $values) ? $_SESSION["purchases"] = 1 : $_SESSION["purchases"] = 0;
    in_array(4, $values) ? $_SESSION["sales"] = 1 : $_SESSION["sales"] = 0;
    in_array(5, $values) ? $_SESSION["access"] = 1 : $_SESSION["access"] = 0;
    in_array(6, $values) ? $_SESSION["reports"] = 1 : $_SESSION["reports"] = 0;

  }

  return $fetch;
}

function signout()
{
    session_start();
    session_destroy();
    header('Location: ../../index.php');
}

?>