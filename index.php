<?php
require_once('modules/connection.php');
session_start();

// FILE PAth
$GLOBALS['APPPATH'] = dirname(__FILE__);
// URL PATH
$GLOBALS['base_url'] = 'http://localhost:5000/';

// sua 

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'pages';
  $action = 'index';
} 
require_once('modules/routes.php');
?>
