<p>Confirmar eliminacion:</p>


<form action="?controller=entrenadores&action=eliminarOk&id=<?php echo $entrenador->id ?>" method="POST">
    <br><label for="eliminar">Escriba "eliminar" para eliminar los datos asociados a <?php echo $entrenador->nombre ?> (tambien se eliminaran los pokemons!)</label><br> 
    <input type="text" name="eliminar" id="eliminar" placeholder="eliminar">
    <br><br><button type="submit">Enviar</button>
</form>