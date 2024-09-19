<?php
require_once "usuariosGuardadosBD.php";
require_once "InformacionGuardadaBD.php";
$usuBD = new UsuariosEnDB();
$infoBD = new InformacionEnDB();
$usuario;


//iniciem sessió
session_start();

// compruebo que exista la sesion y la muesto
if (isset($_SESSION)) {
    print_r($_SESSION);
    $usuario = $_SESSION["usuari"];
}

define("TEMPSINACTIU", 1000); //Segons màxims que pot estar l'aplicació inactiva

$infoBD->obtenerDatosUsuario($usuario);
// compruebo que exista el post que se hace al hacer el submit del formulario _5AccesoFormulario.php
if (isset($_POST["telefono"]) && isset($_POST["correo"]) && isset($_POST["hm"]) && isset($_POST["rango"]) && isset($_POST["colorElegido"]) && isset($_POST["insertarOModificar"]) && isset($_SESSION)) {
    
    // Asignando valores a las propiedades de la instancia de la clase InformacionEnDB
    $infoBD->setTelefono($_POST["telefono"]);
    $infoBD->setTelefono($_POST["telefono"]);
    $infoBD->setCorreo($_POST["correo"]);
    $infoBD->setGenero($_POST["hm"]);
    $infoBD->setSatisfaccion($_POST["rango"]);
    $infoBD->setColor($_POST["colorElegido"]);

    // Verificando si se debe modificar o insertar en la base de datos
    if ($_POST["insertarOModificar"] == "modificar") {
        $infoBD->actualizarEnBD($infoBD->getTelefono(), $infoBD->getCorreo(), $infoBD->getGenero(), $infoBD->getSatisfaccion(), $infoBD->getColor(), $infoBD->getUsuario());
    } else {
        $infoBD->insertarEnBD($infoBD->getUsuario(), $infoBD->getNombre(), $infoBD->getApellido(), $infoBD->getTelefono(), $infoBD->getCorreo(), $infoBD->getGenero(), $infoBD->getSatisfaccion(), $infoBD->getColor());
    }
}

// compruebo que exista el post que se hace al hacer el submit del formulario ModificarUsuario.php
if (isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_SESSION)) {

    // Asignando valores a las propiedades de la instancia de la clase InformacionEnDB
    $usuBD->setUsuario($_POST["usuario"]);
    $usuBD->setPassword(hash('sha384', $_POST["password"]));
    $usuBD->setNombre($_POST["nombre"]);
    $usuBD->setApellido($_POST["apellido"]);

    $usuBD->actualizarEnBD($usuBD->getPassword() , $usuBD->getNombre(), $usuBD->getApellido(), $usuBD->getUsuario());
    $_SESSION["nombre"] = $usuBD->getNombre() . " " . $usuBD->getApellido(); // actualizo el nombre de session
    
}

// compruebo que exista el post que se hace al hacer el submit de boorar info
if (isset($_POST["eliminarInfo"])) {
    // el valor lo paso a mayusculas y elimino las cookies
    if (strtoupper($_POST["eliminarInfo"]) == "ELIMINAR") {        
        $infoBD->eliminarEnBD($infoBD->getUsuario());
    }
}

// compruebo que exista el post que se hace al hacer el submit de boorar usuario
if (isset($_POST["eliminarUsuario"])) {
    // el valor lo paso a mayusculas y elimino las cookies
    if (strtoupper($_POST["eliminarUsuario"]) == "ELIMINAR") {
        $usuBD->eliminarEnBD($infoBD->getUsuario());
        session_destroy(); //Destruim sessió
    }
}


//Temps transcorregut des de l'últim accés a la pàgina i la data actual.
$tempsTranscorregut;
if (isset($_COOKIE["tiempoAcceso"])) {
    $tempsTranscorregut = time() - $_COOKIE["tiempoAcceso"];
}


if ($tempsTranscorregut >= TEMPSINACTIU) { //Si la sessió ha caducat, han passat 30 segons o més des de l'últim accés...
    session_destroy(); //Destruim sessió
    header("Location: _5Caducitat.php"); //Mostrem la pàgina de caducitat
} else { //Si no ha caducat...
    setcookie("tiempoAcceso", time(), time() + 36000, "/", "", 0); //Actualitzem la data per tornar a començar
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Aplicació</title>
</head>

<body style="background-color: #E8CA33;">
    <div style="text-align: center;">
        <p>Benvinguda <strong><?php echo $_SESSION["nombre"]; ?></strong></p>
        <button style="background-color: #C7B24A ;"><a href="ModificarUsuario.php">Modificar usuario</a></button>
        <button style="background-color: #C7B24A ;"><a href="EliminarUsuario.php">Eliminar usuario</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5AccesoFormulario.php">Acceso rellenar formulario</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5ModificarFormulario.php">Modificar Formulario</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5AccesoInfo.php">Visualizar información</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5BorrarFormulario.php">Borrar informacion formulario</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5Logout.php">Cerrar sesion</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5inici.php">Volver al inicio</a></button>
    </div>
</body>

</html>