<h3>Lista de todos los entrenadores POKEMON:</h3>

<?php foreach ($pokemon as $pokemons) { ?>
  <br>
  <p>
    <!-- Muestra los detalles del Pokemon -->
    <?php echo ("Nombre: " . $pokemons->nombrePokemon . ", " . " &nbsp;&nbsp; " . "  IdEntrenador: " . $pokemons->idEntrenador . ", " . " &nbsp;&nbsp; " . "   Tipo: " . $pokemons->tipo) ?> <br><br>

    <!-- Enlace para ver el entrenador asociado al Pokemon -->
    <a href='?controller=pokemons&action=showEntrenadorAsociado&id=<?php echo $pokemons->idEntrenador; ?>'>Ver Entrenador asociado</a>&nbsp;&nbsp;

    <!-- Enlace para modificar los datos del Pokemon -->
    <a href='?controller=pokemons&action=datosActualizar&id=<?php echo $pokemons->id; ?>'> Modificar POKEMON</a>&nbsp;&nbsp;

    <!-- Enlace para eliminar el Pokemon -->
    <a href='?controller=pokemons&action=eliminarDatos&id=<?php echo $pokemons->id; ?>'>Eliminar POKEMON</a>&nbsp;&nbsp;
  </p>
<?php } ?>