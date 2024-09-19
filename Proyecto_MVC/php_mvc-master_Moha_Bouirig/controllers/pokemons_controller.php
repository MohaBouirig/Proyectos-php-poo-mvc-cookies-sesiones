<?php
require_once('models/entrenadores.php');

class PokemonsController
{
  // Método para mostrar la lista de todos los pokemons
  public function index()
  {
    // Obtenemos todos los pokemons y los almacenamos en una variable
    $pokemon = Pokemons::all();
    require_once('views/pokemons/index.php');
  }

  // Método para mostrar el entrenador asociado a un pokemon específico
  public function showEntrenadorAsociado()
  {
    // Verificamos si se proporciona un ID en la URL. Sin un ID, redirigimos a la página de error
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el entrenador correspondiente
    $entrenador = Entrenador::find($_GET['id']);
    require_once('views/entrenadores/show.php');
  }

  // Método para mostrar los datos a actualizar de un pokemon específico
  public function datosActualizar()
  {
    // Verificamos si se proporciona un ID en la URL. Sin un ID, redirigimos a la página de error
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el pokemon correspondiente
    $pokemon = Pokemons::buscarPokemon($_GET['id']);
    require_once('views/pokemons/datosActualizar.php');
  }

  // Método para guardar la actualización de datos de un pokemon
  public static function guardarUpdate()
  {
    if (isset($_GET['id']) && isset($_POST['nombrePokemon']) && isset($_POST['idEntrenador']) && isset($_POST['tipo'])) {
      $pokemon = Pokemons::guardarDatosUpdate($_GET['id'], $_POST['nombrePokemon'], $_POST['idEntrenador'], $_POST['tipo']);
      // Redireccionar después de guardar
      header("Location: ?controller=pokemons&action=index");
    } else {
      return call('pages', 'error');
    }
  }

  // Método para mostrar la confirmación de eliminación de un pokemon
  public function eliminarDatos()
  {
    // Verificamos si se proporciona un ID en la URL. Sin un ID, redirigimos a la página de error
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el pokemon correspondiente
    $pokemon = Pokemons::buscarPokemon($_GET['id']);
    require_once('views/pokemons/eliminarDatos.php');
  }

  // Método para confirmar y eliminar un pokemon
  public static function eliminarOk()
  {
    if (isset($_GET['id']) && isset($_POST['eliminar'])) {
      if (strcmp($_POST['eliminar'], 'eliminar') == 0) {
        $pokemon = Pokemons::eliminarConfirmado($_GET['id']);
        // Redireccionar después de guardar
        header("Location: ?controller=pokemons&action=index");
      } else {
        return call('pages', 'error');
      }
    } else {
      return call('pages', 'error');
    }
  }
}
