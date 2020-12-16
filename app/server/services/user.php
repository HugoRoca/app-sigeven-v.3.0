<?php

// Include connection
require_once('../config/connection.php');

Class User
{
  public function __construct() {}

  public function signin($login, $password) {
    $sql = "SELECT ";
    return execQuery($sql);
  }
}

?>