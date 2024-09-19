<p>Here is a list of all posts:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <!-- Muestra el autor del post -->
    <?php echo $post->author; ?>
    
    <!-- Enlace para ver el contenido completo del post -->
    <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>See content</a>

    <!-- Enlace para modificar el contenido completo del post -->
    <a href='?controller=posts&action=datosActualizar&id=<?php echo $post->id; ?>'> Modificar</a>

    <!-- Enlace para eliminar el contenido completo del post -->
    <a href='?controller=posts&action=eliminarDatos&id=<?php echo $post->id; ?>'> Eliminar</a>
  </p>
<?php } ?>