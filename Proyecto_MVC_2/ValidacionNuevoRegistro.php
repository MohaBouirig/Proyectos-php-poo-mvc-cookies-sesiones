<?php
require_once "usuariosGuardadosBD.php";
$usuBD = new UsuariosEnDB();


// compruebo que exista el post que se hace al hacer el submit del formulario _5AccesoFormulario.php
if (isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido"])) {

    // Asignando valores a las propiedades de la instancia de la clase InformacionEnDB
    $usuBD->setUsuario($_POST["usuario"]);
    $usuBD->setPassword(hash('sha384', $_POST["password"]));
    $usuBD->setNombre($_POST["nombre"]);
    $usuBD->setApellido($_POST["apellido"]);


    $usuBD->insertarEnBD($usuBD->getUsuario(), $usuBD->getPassword() , $usuBD->getNombre(), $usuBD->getApellido());
    header("Location: _5inici.php");
} else {
    echo("Vuelva al inicio y vuelva a registrase, el usuario existe o ha dado un error");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Validacion</title>
</head>

<body style="background-color: #E8CA33;">
    <div style="text-align: center;">
        <button style="background-color: #C7B24A ;"><a href="_5inici.php">Volver al inicio</a></button>
    </div>
</body>

</html>