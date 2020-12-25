<?php

session_start();

require_once('../services/user.php');
require_once('../services/permission.php');

$user = new User();
$permission = new Permission();

switch ($_GET['action']) {
  case 'signIn':
    try {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $fetch = signIn($username, $password, $user);

      echo json_encode($fetch);
    } catch (Exception $e) {
      throw new Exception($e);
    }
    break;
  case 'signOut':
    signOut();
    break;
  case 'getAllUsers':
    try {
      $result = getAllUsers($user);

      echo json_encode($result);
    } catch (Exception $e) {
      echo json_encode($e);
    }
    break;
  case 'enableUser':
    try {
      $userId = $_POST['userId'];
      $result = enableUser($userId, $user);

      echo json_encode($result);
    } catch (Exception $e) {
      echo json_encode($e);
    }
    break;
  case 'disabledUser':
    try {
      $userId = $_POST['userId'];
      $result = disableUser($userId, $user);

      echo json_encode($result);
    } catch (Exception $e) {
      throw new Exception($e);
    }
    break;
  case 'getUserById':
    try {
      $userId = $_GET['userId'];
      $result = getUserById($userId, $user);

      echo json_encode($result);
    } catch (Exception $e) {
      throw new Exception($e);
    }
    break;
  case 'getPermissionByUser':
      try {
        $userId = $_GET['userId'];
        $result = getPermissionByUser($userId, $user, $permission);
        echo json_encode($result);
      } catch (Exception $e) {
        throw new Exception($e);
      }
    break;
}

function signIn($userName, $password, $class)
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

function signOut()
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
        '<button title="Edit" class="btn btn-sm btn-warning ml-2" onclick="userListModule.redirectFormUser(' . $reg->id . ')"><svg class="c-icon"><use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use></svg></button>'.
        '<button title="Disabled" class="btn btn-sm btn-danger ml-2" onclick="userListModule.disabledUser(' . $reg->id . ')"><svg class="c-icon"><use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-trash"></use></svg></button>' :
        '<button title="Edit" class="btn btn-sm btn-warning ml-2" onclick="userListModule.redirectFormUser(' . $reg->id . ')"><svg class="c-icon"><use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use></svg></button>'.
        '<button title="Enabled" class="btn btn-sm btn-success ml-2" onclick="userListModule.enabledUser(' . $reg->id . ')"><svg class="c-icon"><use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-check"></use></svg></button>',
      "1" => $reg->name,
      "2" => $reg->document_type,
      "3" => $reg->document_number,
      "4" => $reg->email,
      "5" => $reg->user_name,
      "6" => '<img class="c-avatar-img" src="../files/users/' . $reg->image . '" height="50px" width="50px"/>',
      "7" => ($reg->state) ? 
        '<span class="badge bg-success">Activated</<span>' : 
        '<span class="badge bg-danger text-white">Disabled</<span>'
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

function enableUser($userId, $class) {
  $result = $class->enableUserById($userId);
  return $result ? "User enabled" : "An error ocurred when enabling user";
}

function disableUser($userId, $class) {
  $result = $class->disableUserById($userId);
  return $result ? "User disabled" : "An error ocurred when disabled user";
}

function getUserById($userId, $class) {
  $result = $class->getUserById($userId);
  return $result;
}

function getPermissionByUser($userId, $classUser, $classPermission)
{
  $permissions = $classPermission->getAllPermissions();
  $permissionsByUser = $classUser->getPermissionByUserId($userId);

  $values = array();

  while ($per = $permissionsByUser->fetch_object())
  {
    array_push($values, $per->id_permission);
  }

  $result = "";

  while ($reg = $permissions->fetch_object())
  {
    $switch = in_array($reg->id, $values) ? 'checked' : '';
    $result = $result . '<li><input type="checkbox" ' . $switch . ' name="permission[]" value="' . $reg->id . '"> ' . $reg->name . '</li>';
  }

  return $result;
}
?>