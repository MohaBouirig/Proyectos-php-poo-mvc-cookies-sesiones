<?php
  // Se incluye el archivo de conexión a la base de datos
  require_once('connection.php');

  // Verifica si existen parámetros 'controller' y 'action' en la URL
  if (isset($_GET['controller']) && isset($_GET['action'])) {
    // Si existen, se asignan a las variables $controller y $action
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    // Si no existen, se establecen valores predeterminados
    $controller = 'pages';
    $action     = 'home';
  }

  // Se incluye el archivo de diseño común para la interfaz de usuario
  require_once('views/layout.php');
?>