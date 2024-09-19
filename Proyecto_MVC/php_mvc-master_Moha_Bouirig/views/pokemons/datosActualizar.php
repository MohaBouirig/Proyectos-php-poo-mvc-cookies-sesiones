<h3>Modificar Pokemon <?php echo $pokemon->nombrePokemon ?>:</h3>


<form action="?controller=pokemons&action=guardarUpdate&id=<?php echo $pokemon->id ?>" method="POST">
    <br><br><label for="nombrePokemon">Nombre Pokemon: </label> <input type="text" name="nombrePokemon" id="nombrePokemon" value="<?php echo $pokemon->nombrePokemon ?>">
    <label for="idEntrenador"></label> <input type="hidden" name="idEntrenador" id="idEntrenador" value="<?php echo $pokemon->idEntrenador ?>">
    <br><br><label for="tipo">Tipo Pokemon: </label> <input type="text" name="tipo" id="tipo" value="<?php echo $pokemon->tipo ?>">
    <br><br><button type="submit">Guardar</button>
</form>