<DOCTYPE html>
  <html>

  <head>
  </head>

  <body>
    <header>
      <!-- Enlace a la página principal -->
      <a href='/M07/UF2/php_mvc-master/'>Home</a>&nbsp;&nbsp;

      <!-- Enlace a la lista de posts -->
      <a href='?controller=posts&action=index'>Posts</a>&nbsp;&nbsp;

      <!-- Enlace para crear un nuevo post -->
      <a href='?controller=posts&action=create'>Nuevo Post</a>&nbsp;&nbsp;

      <!-- Enlace a la lista de entrenadores -->
      <a href='?controller=entrenadores&action=index'>Entrenadores</a>&nbsp;&nbsp;

      <!-- Enlace para crear un nuevo Entrenador -->
      <a href='?controller=entrenadores&action=crearEntrenador'>Nuevo Entrenador</a>&nbsp;&nbsp;

      <!-- Enlace a la lista de pokemons -->
      <a href='?controller=pokemons&action=index'>Pokemons</a>&nbsp;

    </header>

    <?php require_once('routes.php'); ?>
    <!-- Se incluye el archivo 'routes.php', que probablemente contiene la lógica de enrutamiento -->

    <footer>
      Copyright Personal
    </footer>

    <body>
      <html>