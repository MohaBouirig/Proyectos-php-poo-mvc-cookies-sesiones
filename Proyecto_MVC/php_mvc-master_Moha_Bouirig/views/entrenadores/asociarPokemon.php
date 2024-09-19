<h3>Alta nuevo pokemon para el entrenador <?php echo ($entrenador->nombre . " " . $entrenador->apellido); ?>:</h3>
<form action="?controller=entrenadores&action=guardarPokemons" method="POST">
    <br><br><label for="nombrePokemon">Nombre Pokemon: </label> <input type="text" name="nombrePokemon" id="nombrePokemon">
    <label for="idEntrenador"></label> <input type="hidden" name="idEntrenador" id="idEntrenador" value="<?php echo $entrenador->id ?>">
    <br><br><label for="tipo">Tipo Pokemon: </label> <input type="text" name="tipo" id="tipo">
    <br><br><button type="submit">Guardar</button>
</form>