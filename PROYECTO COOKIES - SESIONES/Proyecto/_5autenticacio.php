<?php
define("USUARI", "j"); //Definim nom d'usuari vàlid
define("PASSWORD", "j"); //Definim contrsenya vàlida

//Variable donde almacena el valor del checkbox
$savepassword = $_POST["savepassword"];

// si el valor es 1, significa que se debe guardar el usuario y contraseña en cookies
if ($savepassword == 1) {

    // se crea cookies con sus valores de inicio de sesion
    setcookie("usuari", $_POST["usuari"], time() + 3600, "/", "", 0);
    setcookie("contrasenya", $_POST["contrasenya"], time() + 3600, "/", "", 0);
}

// Si el usuario y contraseña de la cookie coincide con el usuario definido, accede
if ($_COOKIE["usuari"] == USUARI && $_COOKIE["contrasenya"] == PASSWORD) {
    session_start(); //Iniciem sessió.

    // defino zona horaria y le indico a la SESSION el formato de la fecha y hora
    date_default_timezone_set('Europe/Madrid');
    $_SESSION["ultimAcces"] = date('Y-m-d h:i:s \G\M\T', time()); //Inicialitzem la data d'inici de sessió

    // Creo cookie para poder solucionar el problema del tiempo transcurrido 
    setcookie("tiempoAcceso", time(), time() + 36000, "/", "", 0);

    //Guardem les dades de l'usuari autenticat en la sessió
    $_SESSION["usuari"] = $_COOKIE["usuari"];

    //Mostrem la pàgina de l'aplicació
    header("Location: _5Aplicacio.php");


// Si las cookies son incorrectas entonces el inicio se validara con los campos de usuario y contraseña
} else if ($_POST["usuari"] == USUARI && $_POST["contrasenya"] == PASSWORD) { 
    session_start(); //Iniciem sessió.

    // defino zona horaria y le indico a la SESSION el formato de la fecha y hora
    date_default_timezone_set('Europe/Madrid');
    $_SESSION["ultimAcces"] = date('Y-m-d h:i:s \G\M\T', time()); //Inicialitzem la data d'inici de sessió

    // Creo cookie para poder solucionar el problema del tiempo transcurrido 
    setcookie("tiempoAcceso", time(), time() + 3600, "/", "", 0);
    //Guardem les dades de l'usuari autenticat en la sessió
    $_SESSION["usuari"] = $_POST["usuari"];

    //Mostrem la pàgina de l'aplicació
    header("Location: _5Aplicacio.php");
} else { //Si l'autenticació no és correcte...

    // Borro el contenido de la cooki y hago que expire:
    setcookie("usuari", NULL, time() - 60, "/", "", 0);
    setcookie("contrasenya", NULL, time() - 60, "/", "", 0);
    header("location:_5inici.php"); //Retornem a la pàgina inicial.
}
