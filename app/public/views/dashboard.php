<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: login.html");
} else {
  require 'head.php';
}

require 'footer.php';

ob_end_flush();

?>