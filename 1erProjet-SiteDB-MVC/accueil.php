<?php
  require_once('inc/connection.inc.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  session_start();
  
  require_once('views/layout.php');
?>