<?php

require_once('../config/connection.php');

Class Permission
{
  public function __construct()
  {
  }

  public function getAllPermissions()
  {
    $sql = "SELECT * FROM Permission";
    return execQuery($sql);
  }
}

?>