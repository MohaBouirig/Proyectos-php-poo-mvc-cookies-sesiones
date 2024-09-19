<?php
class PostsController
{
  // Método para mostrar la lista de todos los posts
  public function index()
  {
    // Obtenemos todos los posts y los almacenamos en una variable
    $posts = Post::all();
    require_once('views/posts/index.php');
  }

  // Método para mostrar un post específico
  public function show()
  {
    // Verificamos si se proporciona un ID en la URL (?controller=posts&action=show&id=x)
    // Sin un ID, redirigimos a la página de error, ya que necesitamos el ID del post para buscarlo en la base de datos
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el post correspondiente
    $post = Post::find($_GET['id']);
    require_once('views/posts/show.php');
  }

  // Método estático para mostrar la vista de creación de un nuevo post
  public static function create()
  {
    require_once('views/posts/create.php');
  }

  public static function guardar()
  {
    if (isset($_POST['autor']) && isset($_POST['contenido'])) {
      $post = Post::guardarNuevoPost($_POST['autor'], $_POST['contenido']);
      // Redireccionar después de guardar
      header("Location: ?controller=posts&action=index");
    } else {
      return call('pages', 'error');
    }
  }

  // Método para mostrar un post específico
  public function datosActualizar()
  {
    // Verificamos si se proporciona un ID en la URL (?controller=posts&action=show&id=x)
    // Sin un ID, redirigimos a la página de error, ya que necesitamos el ID del post para buscarlo en la base de datos
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el post correspondiente
    $post = Post::find($_GET['id']);
    require_once('views/posts/datosActualizar.php');
  }


  //guardarUpdate
  public static function guardarUpdate()
  {
    if (isset($_GET['id']) && isset($_POST['autor']) && isset($_POST['contenido'])) {
      $post = Post::guardarDatosUpdate($_GET['id'], $_POST['autor'], $_POST['contenido']);
      // Redireccionar después de guardar
      header("Location: ?controller=posts&action=index");
    } else {
      return call('pages', 'error');
    }
  }

  // Método para mostrar un post específico
  public function eliminarDatos()
  {
    // Verificamos si se proporciona un ID en la URL (?controller=posts&action=show&id=x)
    // Sin un ID, redirigimos a la página de error, ya que necesitamos el ID del post para buscarlo en la base de datos
    if (!isset($_GET['id']))
      return call('pages', 'error');

    // Utilizamos el ID proporcionado para obtener el post correspondiente
    $post = Post::find($_GET['id']);
    require_once('views/posts/eliminarDatos.php');
  }

  public static function eliminarOk()
  {
    if (isset($_GET['id']) && isset($_POST['eliminar'])) {
      if (strcmp($_POST['eliminar'], 'eliminar') == 0) {
        $post = Post::eliminarConfirmado($_GET['id']);
        // Redireccionar después de guardar
        header("Location: ?controller=posts&action=index");
      } else {
        return call('pages', 'error');
      }
    } else {
      return call('pages', 'error');
    }
  }
}
