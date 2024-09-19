<?php
require_once "usuariosGuardadosBD.php";

$usuBD = new UsuariosEnDB();


if (isset($_POST["usuari"]) && isset($_POST["contrasenya"])) {
    $usuBD->obtenerUsuario($_POST["usuari"]); // obtengo la info del usuario actual de la base de datos para poder comprobarla
    if ($_POST["usuari"] == $usuBD->getUsuario() && hash('sha384', $_POST['contrasenya']) == $usuBD->getPassword()) {
        session_start(); //Iniciem sessió.

        // defino zona horaria y le indico a la SESSION el formato de la fecha y hora
        date_default_timezone_set('Europe/Madrid');
        $_SESSION["ultimAcces"] = date('Y-m-d h:i:s \G\M\T', time()); //Inicialitzem la data d'inici de sessió

        // Creo cookie para poder solucionar el problema del tiempo transcurrido 
        setcookie("tiempoAcceso", time(), time() + 3600, "/", "", 0);
        //Guardem les dades de l'usuari autenticat en la sessió
        $_SESSION["usuari"] = $usuBD->getUsuario();
        $_SESSION["nombre"] = $usuBD->getNombre() . " " . $usuBD->getApellido();

        //Mostrem la pàgina de l'aplicació
        header("Location: _5Aplicacio.php");
    } else { //Si l'autenticació no és correcte...

        header("location:_5inici.php"); //Retornem a la pàgina inicial.
    }
} else { //Si l'autenticació no és correcte...

    header("location:_5inici.php"); //Retornem a la pàgina inicial.
}
