<p>Confirmar eliminacion:</p>


<form action="?controller=posts&action=eliminarOk&id=<?php echo $post->id ?>" method="POST">
    <br><label for="eliminar">Escriba "eliminar" para eliminar los datos asociados a <?php echo $post->author ?></label><br> 
    <input type="text" name="eliminar" id="eliminar" placeholder="eliminar">
    <br><br><button type="submit">Enviar</button>
</form>