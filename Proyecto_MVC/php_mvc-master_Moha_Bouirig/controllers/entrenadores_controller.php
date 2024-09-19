<?php
require_once('models/pokemons.php');

class EntrenadoresController
{
  // Método para mostrar la lista de todos los posts
  public function index()
  {
    // Obtenemos todos los posts y los almacenamos en una variable
    $entrenador = Entrenador::all();
    require_once('views/entrenadores/index.php');
  }

  // Método para mostrar un post específico
  public function showPokemons()
  {
    // Verificamos si se proporciona un ID en la URL. Sin un ID, redirigimos a la página de error
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el post correspondiente
    $pokemon = Pokemons::find($_GET['id']);
    if ($pokemon != null) {
      require_once('views/pokemons/show.php');
    } else {
      return call('pages', 'error');
    }
  }

  // Método estático para mostrar la vista de creación de un nuevo post
  public static function asociarPokemon()
  {
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el post correspondiente
    $entrenador = Entrenador::find($_GET['id']);
    require_once('views/entrenadores/asociarPokemon.php');
  }

  public static function guardarPokemons()
  {
    if (isset($_POST['nombrePokemon']) && isset($_POST['idEntrenador']) && isset($_POST['tipo'])) {
      $pokemon = Pokemons::guardarNuevoPokemon($_POST['nombrePokemon'], $_POST['idEntrenador'], $_POST['tipo']);
      // Redireccionar después de guardar
      header("Location: ?controller=entrenadores&action=index");
    } else {
      return call('pages', 'error');
    }
  }

  // Método estático para mostrar la vista de creación de un nuevo post
  public static function crearEntrenador()
  {
    require_once('views/entrenadores/crearEntrenador.php');
  }

  public static function guardar()
  {
    if (isset($_POST['nombre']) && isset($_POST['apellido'])) {
      $entrenador = Entrenador::guardarNuevoEntrenador($_POST['nombre'], $_POST['apellido']);
      // Redireccionar después de guardar
      header("Location: ?controller=entrenadores&action=index");
    } else {
      return call('pages', 'error');
    }
  }

  // Método para mostrar actualizar de un entrenador específico
  public function datosActualizar()
  {
    // Verificamos si se proporciona un ID en la URL. Sin un ID, redirigimos a la página de error
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el post correspondiente
    $entrenador = Entrenador::find($_GET['id']);
    require_once('views/entrenadores/datosActualizar.php');
  }


  // Método para actualizar un entrenador específico
  public static function guardarEntrenador()
  {
    if (isset($_GET['id']) && isset($_POST['nombre']) && isset($_POST['apellido'])) {
      $entrenador = Entrenador::guardarDatosActualizados($_GET['id'], $_POST['nombre'], $_POST['apellido']);
      // Redireccionar después de guardar
      header("Location: ?controller=entrenadores&action=index");
    } else {
      return call('pages', 'error');
    }
  }

  // Método para mostrar un la eliminación de un entrenador específico
  public function eliminarEntrenador()
  {
    // Verificamos si se proporciona un ID en la URL. Sin un ID, redirigimos a la página de error
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el post correspondiente
    $entrenador = Entrenador::find($_GET['id']);
    require_once('views/entrenadores/eliminarEntrenador.php');
  }

  // Método para eliminar un entrenador específico
  public static function eliminarOk()
  {
    if (isset($_GET['id']) && isset($_POST['eliminar'])) {
      if (strcmp($_POST['eliminar'], 'eliminar') == 0) {
        $entrenador = Entrenador::eliminarConfirmado($_GET['id']);
        // Redireccionar después de guardar
        header("Location: ?controller=entrenadores&action=index");
      } else {
        return call('pages', 'error');
      }
    } else {
      return call('pages', 'error');
    }
  }
}
