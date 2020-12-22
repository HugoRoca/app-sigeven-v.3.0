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

  public function enableUserById($userId){
    $sql = "UPDATE user SET state='1' WHERE id='$userId'";
    return execQuery($sql);
  }

  public function disableUserById($userId){
    $sql = "UPDATE user SET state='0' WHERE id='$userId'";
    return execQuery($sql);
  }
}
