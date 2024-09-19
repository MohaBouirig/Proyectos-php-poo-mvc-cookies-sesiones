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

            // compruebo que exista la sesion y la muesto
            session_start();
            if (isset($_SESSION)) {
                print_r($_SESSION);
            }
            ?>
            <br /><br /><label for="texto">Modifica el formulario: </label><br /><br />

            <?php

            // compruebo que exista las cookies que se han creado en _5AccesoFormulario.php, si existen todas las almacenara en variables y las mostrara
            if (isset($_COOKIE["usuari"]) && isset($_COOKIE["telefono"]) && isset($_COOKIE["correo"]) && isset($_COOKIE["hm"]) && isset($_COOKIE["satisfaccion"]) && isset($_COOKIE["colorElegido"]) ) {

                $usuario = $_COOKIE["usuari"];
                $telefono = $_COOKIE["telefono"];
                $correo = $_COOKIE["correo"];
                $genero = $_COOKIE["hm"];
                $rango = $_COOKIE["satisfaccion"];
                $color = $_COOKIE["colorElegido"];

                echo ("<label for='usuario'>Usuario: </label> <input type='text' value='$usuario' size='10' disabled>");
                echo ("<br/><br/><label for='numTelefono'>Telefono: </label><input type='tel' name='telefono' id='telefono' value='$telefono' size='12'  ><br /><br />");


                echo ("<label for='mail'>Correo: </label> <input type='mail' name='correo' id='correo' value='$correo'  ><br /><br />");

                echo ("<label for='color'>Color favorito:: </label> <input type='color' name='colorElegido' value='$color'  ><br /><br />");

                echo ("<label for='sexo'>Sexo: </label>");

                if ($genero == 'h') {
                    echo ("<label for='hombre'>Hombre</label><input type='radio' name='hm' id='hombre' checked >");
                    echo ("<label for='mujer'>mujer</label><input type='radio' name='hm' id='mujer' >");
                    echo ("<br /><br />");
                } else {
                    echo ("<label for='hombre'>Hombre</label><input type='radio' name='hm' id='hombre' > ");
                    echo ("<label for='mujer'>Mujer</label><input type='radio' name='hm' id='mujer' checked >");
                    echo ("<br /><br />");
                }

                echo ("<label for='satisfaccion'>Indique su nivel de satisfaccion con el formulario (Mala, Regular o Buena):</label><br /><br />");
                echo ("<input type='range' name='rango' min='1' max='3' value='$rango' list='lista-rango'>");


                echo ("<br /><br /><input type='submit' name='enviar' value='ENVIAR' style='background-color: #C7B24A ;' />");
            } else {

                // si no existe dicha informacion mostrara el siguiente mensaje
                echo ("No se ha encontrado información guardada en las cookies. <br /><br />");
            }


            ?>

            <button style="background-color: #C7B24A ;"><a href="_5Aplicacio.php">Volver al inicio</a></button>
        </form>
    </div>


</body>

</html>