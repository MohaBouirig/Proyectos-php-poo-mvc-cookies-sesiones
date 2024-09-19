<?php
// Función que llama al controlador y acción correspondientes
function call($controller, $action)
{
  // Incluye el archivo del controlador específico
  require_once('controllers/' . $controller . '_controller.php');

  // Inicia el controlador según el tipo de controlador
  switch ($controller) {
    case 'pages':
      $controller = new PagesController();
      break;
    case 'posts':
      // Se necesita el modelo para realizar consultas a la base de datos más adelante en el controlador
      require_once('models/post.php');
      $controller = new PostsController();
      break;
    case 'entrenadores':
      // Se necesita el modelo para realizar consultas a la base de datos más adelante en el controlador
      require_once('models/entrenadores.php');
      $controller = new EntrenadoresController();
      break;
    case 'pokemons':
      // Se necesita el modelo para realizar consultas a la base de datos más adelante en el controlador
      require_once('models/pokemons.php');
      $controller = new PokemonsController();
      break;
  }

  // Ejecuta el método correspondiente en el controlador
  $controller->{$action}(); // ejecuta el nombre del método guardado en $action del controlador correspondiente
}

// Definición de controladores y sus acciones
$controllers = array(
  'pages' => ['home', 'error'],
  'posts' => ['index', 'show', 'create', 'guardar', 'datosActualizar', 'guardarUpdate', 'eliminarDatos', 'eliminarOk'],
  'entrenadores' => ['index', 'showPokemons', 'crearEntrenador', 'asociarPokemon', 'guardarPokemons', 'guardar', 'datosActualizar', 'guardarEntrenador', 'eliminarEntrenador', 'eliminarOk'],
  'pokemons' => ['index', 'showEntrenadorAsociado', 'datosActualizar', 'guardarUpdate', 'eliminarDatos', 'eliminarOk']
);

// Verifica si el controlador y la acción están definidos
if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    // Llama a la función call con el controlador y la acción proporcionados
    call($controller, $action);
  } else {
    // Si la acción no está definida para el controlador dado, llama a la acción de error en el controlador de páginas
    call('pages', 'error');
  }
} else {
  // Si el controlador no está definido, llama a la acción de error en el controlador de páginas
  call('pages', 'error');
}
