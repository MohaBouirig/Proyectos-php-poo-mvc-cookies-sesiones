<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Modificar Formulario</title>
</head>

<body style="background-color: #E8CA33;">

    <div style="text-align: center;">
        <form method="POST" action="_5Aplicacio.php">
            <?php
            define("TEMPSINACTIU", 10000); //Segons màxims que pot estar l'aplicació inactiva
            session_start();
            require_once "usuariosGuardadosBD.php";
            $usuBD = new UsuariosEnDB();

            if (isset($_SESSION)) {
                print_r($_SESSION);
                // obtengo la info del usuario actual de la base de datos
                $usuBD->obtenerUsuario($_SESSION["usuari"]);
            }

            ?>
            <br /><br /><label for="texto">Modifica USUARIO: </label><br /><br />

            <?php
            // obtengo la info del usuario actual para mostrar en el formulario
            $usuario = $usuBD->getUsuario();
            $contrasenya = $usuBD->getPassword();
            $nombre = $usuBD->getNombre();
            $apellido = $usuBD->getApellido();
            // compruebo que exista las cookies que se han creado en _5AccesoFormulario.php, si existen todas las almacenara en variables y las mostrara pero no se podra modificar ya que estan en disable
            if ($contrasenya != null && $nombre != null && $apellido != null && isset($_SESSION)) {
                echo ("<label for='usu'>Usuario: </label> <input type='text' name='usu' id='usu' value='{$_SESSION['usuari']}' size='10' disabled>"); // en disable no deja enviar los datos por post
                echo ("<input type='text' name='usuario' id='usuario' value='{$_SESSION['usuari']}' size='10' hidden>"); // por eso creo un campo hidden que si que viajara por post aunque este hidden
                echo ("<br/><br/><label for='password'>Password: </label><input type='password' name='password' id='password' value='$contrasenya' size='12' required><br /><br />");
                echo ("<label for='nombre'>Nombre: </label> <input type='text' name='nombre' id='nombre' value='$nombre' required><br /><br />");
                echo ("<label for='apellido'>Apellido: </label> <input type='text' name='apellido' value='$apellido' required><br /><br />");
                echo ("<br /><br /><input type='submit' name='enviar' value='ENVIAR' style='background-color: #C7B24A ;' />");
            } else {
                // si no existe dicha información mostrará el siguiente mensaje
                echo ("No se ha encontrado información guardada en la base de datos. <br /><br />");
            }



            ?>

            <button style="background-color: #C7B24A ;"><a href="_5Aplicacio.php">Volver al inicio</a></button>
        </form>
    </div>


</body>

</html>