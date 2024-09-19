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
            require_once "InformacionGuardadaBD.php";
            define("TEMPSINACTIU", 10000); //Segons màxims que pot estar l'aplicació inactiva
            session_start();
            $infoBD = new InformacionEnDB();
            $usuario;
            if (isset($_SESSION)) {
                print_r($_SESSION);
                // creo variable usuario para asignar el valor de usuario y mostrarla mas abajo en un echo
                $usuario = $_SESSION["usuari"];
            }

            
            $infoBD = new InformacionEnDB();
            // obtengo la info del usuario actual de la base de datos
            $infoBD->obtenerDatosUsuario($usuario); 
            $infoBD->obtenerInformacion($usuario);        
            $telefono = $infoBD->getTelefono();
            $correo = $infoBD->getCorreo();
            $genero = $infoBD->getGenero();
            $rango = $infoBD->getSatisfaccion();
            $color = $infoBD->getColor(); 
            ?>
            <br /><br /><label for="texto">Modifica el formulario: </label><br /><br />

            <?php

            // si existen todas las variables, las mostrara 
            if ($usuario != null && $telefono != null && $correo  != null && $genero != null && $rango != null && $color != null && isset($_SESSION)) {

                echo ("<label for='usuario'>Usuario: </label> <input type='text' value='{$_SESSION['usuari']}' size='10' disabled>");
                echo ("<br/><br/><label for='numTelefono'>Telefono: </label><input type='tel' name='telefono' id='telefono' value='$telefono' size='12'  ><br /><br />");


                echo ("<label for='mail'>Correo: </label> <input type='mail' name='correo' id='correo' value='$correo'  ><br /><br />");

                echo ("<label for='color'>Color favorito:: </label> <input type='color' name='colorElegido' value='$color'  ><br /><br />");

                echo ("<label for='sexo'>Sexo: </label>");

                if ($genero == 'h') {
                    echo ("<label for='hombre'>Hombre</label><input type='radio' name='hm' id='hombre' value='h' checked >");
                    echo ("<label for='mujer'>mujer</label><input type='radio' name='hm' id='mujer' value='m' >");
                    echo ("<br /><br />");
                } else {
                    echo ("<label for='hombre'>Hombre</label><input type='radio' name='hm' id='hombre' value='h'> ");
                    echo ("<label for='mujer'>Mujer</label><input type='radio' name='hm' id='mujer' value='m' checked >");
                    echo ("<br /><br />");
                }

                echo ("<label for='satisfaccion'>Indique su nivel de satisfaccion con el formulario (Mala, Regular o Buena):</label><br /><br />");
                echo ("<input type='range' name='rango' min='1' max='3' value='$rango' list='lista-rango'>");

                echo ("<input type='text' name='insertarOModificar' id='insertarOModificar' value='modificar' hidden>");
                echo ("<br /><br /><input type='submit' name='enviar' value='ENVIAR' style='background-color: #C7B24A ;' />");
            } else {

                // si no existe dicha informacion mostrara el siguiente mensaje
                echo ("No se ha encontrado información guardada en la base de datos. <br /><br />");
            }

            ?>

            <button style="background-color: #C7B24A ;"><a href="_5Aplicacio.php">Volver al inicio</a></button>
        </form>
    </div>


</body>

</html>