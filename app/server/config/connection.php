<?php

require_once __DIR__."/global.php";

$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_query($connection, 'SET NAMES "' . DB_ENCODE . '"');

if(mysqli_connect_errno()) {
  printf("Fail connection to database: %s\n", mysqli_connect_errno());
}

if(!function_exists('execQuery')) {
  function execQuery($sql) {
    global $connection;
    $query = $connection->query($sql);
    return $query;
  }

  function execQueryRowUnique($sql) {
    global $connection;
    $query = $connection->query($sql);
    $row = $query->fetch_assoc();
    return $row;
  }

  function execQueryIdReturn($sql) {
    global $connection;
    $query = $connection->query($sql);
    return $connection->insert_id;
  }

  function clean($str) {
    global $connection;
    $str = mysqli_real_escape_string($connection, trim($str));
    return htmlspecialchars($str);
  }
}

?>