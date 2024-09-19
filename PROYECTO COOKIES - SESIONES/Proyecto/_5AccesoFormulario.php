<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body style="background-color: #E8CA33;">

    <div style="text-align: center;">
        <form method="POST" action="_5Aplicacio.php">
            <?php
            define("TEMPSINACTIU", 10000); //Segons màxims que pot estar l'aplicació inactiva

            
            // compruebo que exista la sesion y la muesto
            $usuario;
            session_start();
            if (isset($_SESSION)) {
                print_r($_SESSION);
                // creo variable usuario para asignar el valor de usuario y mostrarla mas abajo en un echo
                $usuario = $_SESSION["usuari"];
            }
            ?>


            
            <br /><br /><label for="texto">Rellene el formulario: </label><br /><br />

            <?php
            echo ("<br/>");
            // muestro el usuario en un campo de texto disabled
            echo ("<label for='usuario'>Usuario: </label> <input type='text' value='$usuario' size='10' disabled>");
            ?>

            <br /><br /><label for="numTelefono">Telefono: </label><input type="tel" name="telefono" id="telefono" size='12' required><br /><br />

            <label for="mail">Correo: </label> <input type="mail" name="correo" id="correo" required><br /><br />

            <label for="color">Color favorito: </label> <input type="color" name="colorElegido"><br /><br />

            <label for="sexo">Sexo: </label>
            <label for="hombre">Hombre</label><input type="radio" name="hm" id="hombre" value="h" required>
            <label for="mujer">mujer</label><input type="radio" name="hm" id="mujer" value="m"> <br /><br />

            <label for="satisfaccion">Indique su nivel de satisfaccion con el formulario (Mala, Regular o Buena):</label><br /><br />
            <input type="range" name="rango" min="1" max="3" list="lista-rango" required>
            <datalist id="lista-rango">
                <option value="1" label="Mala">
                <option value="2" label="Regular">
                <option value="3" label="Buena">
            </datalist><br /><br />

            <input type="submit" name="enviar" value="ENVIAR" style="background-color: #C7B24A ;" />

            <button style="background-color: #C7B24A ;"><a href="_5Aplicacio.php">Volver al inicio</a></button>
        </form>
    </div>




</body>

</html>