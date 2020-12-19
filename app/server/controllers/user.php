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
  case 'getAllUsers':
    try {
      $result = getAllUsers($user);

      echo json_encode($result);
    } catch (Exception $e) {
      echo json_encode($e);
    }
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

function getAllUsers($class)
{
  $usersData = $class->getAllUsers();
  $data = array();

  while ($reg = $usersData->fetch_object())
  {
    $data[] = array(
      "0" => ($reg->state) ? 
        '<button class="btn btn-warning" onclick="redirect(' . $reg->id . ')"><i class="fa fa-pencil"></i></button>'.
        '<button class="btn btn-danger" onclick="disabled(' . $reg->id . ')"><i class="fa fa-close"></i></button>' :
        '<button class="btn btn-warning" onclick="redirect(' . $reg->id . ')"><i class="fa fa-pencil"></i></button>'.
        '<button class="btn btn-primary" onclick="enabled(' . $reg->id . ')"><i class="fa fa-check"></i></button>',
      "1" => $reg->name,
      "2" => $reg->document_type,
      "3" => $reg->document_number,
      "4" => $reg->email,
      "5" => $reg->user_name,
      "6" => '<img src="../files/users/' . $reg->image . '" height="50px" width="50px"/>',
      "7" => ($reg->state) ? 
        '<span class="label bg-green">Activated</<span>' : 
        '<span class="label bg-red">Disabled</<span>'
    );
  }

  $result = array(
    "sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data,
  );

  return $result;
}
?>