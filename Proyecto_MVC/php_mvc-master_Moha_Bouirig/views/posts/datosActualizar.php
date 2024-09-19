<p>Modificar Datos:</p>


<form action="?controller=posts&action=guardarUpdate&id=<?php echo $post->id ?>" method="POST">
    <br><br><label for="author"></label> <input type="text" name="autor" id="autor" value="<?php echo $post->author ?>">
    <input type="text" name="iddelEntrenador" value="<?php $_GET['id'] ?>" disabled>
    <br><br><label for="content"></label> <textarea name="contenido" id="contenido" cols="30" rows="10" ><?php echo $post->content ?></textarea>
    <br><br><button type="submit">Guardar</button>
</form>
