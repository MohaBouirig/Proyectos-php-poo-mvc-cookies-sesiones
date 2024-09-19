<?php
//iniciem sessió
session_start();

define("TEMPSINACTIU", 1000); //Segons màxims que pot estar l'aplicació inactiva

// compruebo que exista el post que se hace al hacer el submit de eliminar cookies
if (isset($_POST["eliminarCoockies"])) {
    // el valor lo paso a mayusculas y elimino las cookies de usuario y contraseña
    if (strtoupper($_POST["eliminarCoockies"]) == "ELIMINAR") {
        setcookie("usuari", NULL, time() - 60, "/", "", 0);
        setcookie("contrasenya", NULL, time() - 60, "/", "", 0);
    }
}

// compruebo que exista el post que se hace al hacer el submit del formulario _5AccesoFormulario.php
if (isset($_POST["telefono"]) && isset($_POST["correo"]) && isset($_POST["hm"]) && isset($_POST["rango"]) && isset($_POST["colorElegido"])) {  
    // creo cookies con los valores enviados mediante post
    setcookie("telefono", $_POST["telefono"], time() + 3600, "/", "", 0);
    setcookie("correo", $_POST["correo"], time() + 3600, "/", "", 0);
    setcookie("hm", $_POST["hm"], time() + 3600, "/", "", 0);
    setcookie("satisfaccion", $_POST["rango"], time() + 3600, "/", "", 0);
    setcookie("colorElegido", $_POST["colorElegido"], time() + 3600, "/", "", 0);


}

// compruebo que exista el post que se hace al hacer el submit de boorar formulario
if (isset($_POST["eliminarInfo"])) {
    // el valor lo paso a mayusculas y elimino las cookies
    if (strtoupper($_POST["eliminarInfo"]) == "ELIMINAR") {
        setcookie("telefono", NULL, time() - 60, "/", "", 0);
        setcookie("correo", NULL, time() - 60, "/", "", 0);
        setcookie("hm", NULL, time() - 60, "/", "", 0);
        setcookie("satisfaccion", NULL, time() - 60, "/", "", 0);
        setcookie("colorElegido", NULL, time() - 60, "/", "", 0);
    }
}

// compruebo que exista la sesion y la muesto
if (isset($_SESSION)) {
    print_r($_SESSION);
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
        <p>Benvinguda <strong><?php echo $_SESSION["usuari"]; ?></strong></p>
        <button style="background-color: #C7B24A ;"><a href="_5BorrarCoockie.php">Borrar Coockies</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5AccesoFormulario.php">Acceso rellenar formulario</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5ModificarFormulario.php">Modificar Formulario</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5AccesoInfo.php">Visualizar información</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5BorrarFormulario.php">Borrar informacion formulario</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5Logout.php">Cerrar sesion</a></button>
        <button style="background-color: #C7B24A ;"><a href="_5inici.php">Volver al inicio</a></button>
    </div>
</body>

</html>