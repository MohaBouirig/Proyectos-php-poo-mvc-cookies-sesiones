<h3>Lista de todos los entrenadores POKEMON:</h3>

<?php foreach ($entrenador as $entrenadores) { ?>
  <br>
  <p>
    <!-- Muestra el autor del entrenador -->
    <?php echo ("Nombre: " . $entrenadores->nombre . ", " . " &nbsp;&nbsp; " . "   Apellido: " . $entrenadores->apellido); ?> <br><br>

    <!-- Enlace para asociar nuevos pokemons al entrenador -->
    <a href='?controller=entrenadores&action=asociarPokemon&id=<?php echo $entrenadores->id; ?>'>Asociar POKEMONS (Crea nuevos pokemons) </a>&nbsp;&nbsp;

    <!-- Enlace para ver los pokemons asociados al entrenador -->
    <a href='?controller=entrenadores&action=showPokemons&id=<?php echo $entrenadores->id; ?>'>Ver POKEMONS asociados</a>&nbsp;&nbsp;

    <!-- Enlace para modificar los datos del entrenador -->
    <a href='?controller=entrenadores&action=datosActualizar&id=<?php echo $entrenadores->id; ?>'> Modificar Entrenador</a>&nbsp;&nbsp;

    <!-- Enlace para eliminar el entrenador -->
    <a href='?controller=entrenadores&action=eliminarEntrenador&id=<?php echo $entrenadores->id; ?>'>Eliminar Entrenador</a>&nbsp;&nbsp;
  </p>
<?php } ?>