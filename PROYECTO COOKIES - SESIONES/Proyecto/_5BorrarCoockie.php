<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar COOCKIES</title>
</head>

<body style="background-color: #E8CA33;">
    <div style="text-align: center;">
        <form method="POST" action="_5Aplicacio.php">
            <?php
            // compruebo que exista la sesion y la muesto
            session_start();
            if (isset($_SESSION)) {
                print_r($_SESSION);
            }
            ?>
            <!-- Mensaje para poder eliminar las cookies, envia el valor del campo mediante post a _5Aplicacio.php -->
            <br /><br /><label for="texto">Si desea eliminar las COOCKIES, escria la palabra ELIMINAR. </label><br /><br />
            <input type="text" name="eliminarCoockies" id="eliminarCoockies" placeholder="ELIMINAR" required/><br /><br />
            <input type="submit" name="enviar" value="ENVIAR" style="background-color: #C7B24A ;" />

        </form>
        <button style="background-color: #C7B24A ;"><a href="_5Aplicacio.php">Volver al inicio</a></button>
    </div>

</body>

</html>