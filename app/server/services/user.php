<?php

// Include connection
require_once('../config/connection.php');

class User
{
  public function __construct()
  {
  }

  public function signIn($userName, $password)
  {
    $sql = "SELECT * 
            FROM user
            WHERE user_name = '$userName'
              AND password = '$password'
              AND state = '1'";
    return execQuery($sql);
  }

  public function getAllUsers()
  {
    $sql = "SELECT * FROM user";
    return execQuery($sql);
  }

  public function enableUserById($userId)
  {
    $sql = "UPDATE user SET state='1' WHERE id='$userId'";
    return execQuery($sql);
  }

  public function disableUserById($userId)
  {
    $sql = "UPDATE user SET state='0' WHERE id='$userId'";
    return execQuery($sql);
  }

  public function getUserById($userId)
  {
    $sql = "SELECT * FROM user WHERE id='$userId'";
    return execQueryRowUnique($sql);
  }

  public function getPermissionByUserId($userId)
  {
    $sql = "SELECT * FROM userPermission where id_user='$userId'";
    return execQuery($sql);
  }

  public function insertUser(
    $name, 
    $documentType, 
    $documentNumber, 
    $address, 
    $charge, 
    $email, 
    $userName, 
    $password, 
    $image, 
    $permissions)
  {
    $sql = "INSERT INTO User ('name', 'document_type', 'document_number', 'address', 'email', 'charge', 'user_name', 'password', 'image', 'state')
      VALUES ('$name', '$documentType', '$documentNumber', '$address', '$email', '$charge', '$userName', '$password', '$image', '0')";
    
    $userIdNew = execQueryIdReturn($sql);

    $numElements = 0;
    $sw = true;

    while ($numElements < count($permissions))
    {
      $sqlInsertPermission = "INSERT INTO userPermission (id_user, id_permission)
        VALUES ('$userIdNew', '$permissions[$numElements]')";
      
      execQuery($sqlInsertPermission) or $sw = false;

      $numElements = $numElements + 1;
    }

    return $sw;
  }

  public function updateUser(
    $userId,
    $name, 
    $documentType, 
    $documentNumber, 
    $address, 
    $charge, 
    $email, 
    $userName, 
    $password, 
    $image, 
    $permissions)
  {
    $sql = "UPDATE User 
      SET name = '$name', 
        document_type = '$documentType', 
        document_number = '$documentNumber', 
        address = '$address', 
        email = '$email', 
        charge = '$charge', 
        user_name = '$userName', 
        password = '$password', 
        image = '$image'
      WHERE id = '$userId'";
    
    execQuery($sql);

    $sqlDeletePermissions = "DELETE FROM userPermission WHERE id_user = '$userId'";
    execQuery($sqlDeletePermissions);

    $numElements = 0;
    $sw = true;

    while ($numElements < count($permissions))
    {
      $sqlInsertPermission = "INSERT INTO userPermission (id_user, id_permission)
        VALUES ('$userId', '$permissions[$numElements]')";
      
      execQuery($sqlInsertPermission) or $sw = false;

      $numElements = $numElements + 1;
    }

    return $sw;
  }
}
