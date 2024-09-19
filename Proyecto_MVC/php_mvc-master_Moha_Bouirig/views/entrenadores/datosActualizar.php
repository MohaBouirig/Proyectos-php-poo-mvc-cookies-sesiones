<p>Modificar Datos Entrenador:</p>


<form action="?controller=entrenadores&action=guardarEntrenador&id=<?php echo $entrenador->id ?>" method="POST">
    <br><br><label for="nombre"></label> <input type="text" name="nombre" id="nombre" value="<?php echo $entrenador->nombre ?>">
    <br><br><label for="apellido"></label> <input type="text" name="apellido" id="apellido" value="<?php echo $entrenador->apellido ?>">
    <br><br><button type="submit">Guardar</button>
</form>
