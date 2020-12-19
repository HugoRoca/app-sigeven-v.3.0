<?php

// Include connection
require_once('../config/connection.php');

Class User
{
  public function __construct() {}

  public function signIn($userName, $password)
  {
    $sql = "SELECT * 
            FROM user
            WHERE user_name = '$userName'
              AND password = '$password'
              AND state = '1'";
    return execQuery($sql);
  }

  public function getPermissionByUserId($userId)
  {
    $sql = "SELECT * 
            FROM userpermission 
            WHERE id_user = '$userId'";
    return execQuery($sql);
  }

  public function getAllUsers()
  {
    $sql = "SELECT * FROM user";
    return execQuery($sql);
  }
}

?>