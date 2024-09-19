<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body style="background-color: #E8CA33;">

    <div style="text-align: center;">
        <form method="POST" action="ValidacionNuevoRegistro.php">
                       
            <br /><br /><label for="texto">Rellene el formulario: </label><br /><br />

            <br /><br /><label for='usuario'>Usuario: </label> <input type='text' name="usuario" id="usuario" size='10' required>
            <br /><br /><label for="password">Password: </label><input type="password" name="password" id="password" size='12' required><br /><br />

            <label for="nombre">Nombre: </label> <input type="text" name="nombre" id="nombre" required><br /><br />

            <label for="apellido">Apellido: </label> <input type="text" name="apellido" id="apellido"><br /><br />
            <input type="submit" name="enviar" value="ENVIAR" style="background-color: #C7B24A ;" />

            <button style="background-color: #C7B24A ;"><a href="_5inici.php">Volver al inicio</a></button>
        </form>
    </div>




</body>

</html>