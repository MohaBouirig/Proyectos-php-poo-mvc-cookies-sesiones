<p>Confirmar eliminacion:</p>


<form action="?controller=pokemons&action=eliminarOk&id=<?php echo $pokemon->id ?>" method="POST">
    <br><label for="eliminar">Escriba "eliminar" para eliminar los datos asociados a <?php echo $pokemon->nombrePokemon ?></label><br> 
    <input type="text" name="eliminar" id="eliminar" placeholder="eliminar">
    <br><br><button type="submit">Enviar</button>
</form>