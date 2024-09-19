<?php
define("USUARI", "j"); //Definim nom d'usuari vàlid
define("PASSWORD", "j"); //Definim contrsenya vàlida

$savepassword = $_POST["savepassword"];

if ($savepassword == 1) {
    // debe crear cookies y mandarlo a autentificacio
    setcookie("usuari", $_POST["usuari"], time() + 3600, "/", "", 0);
    setcookie("contrasenya", $_POST["contrasenya"], time() + 3600, "/", "", 0);
}

// Si el usuario y contraseña de la cookie coincide con el usuario definido, accede
if ($_COOKIE["usuari"] == USUARI && $_COOKIE["contrasenya"] == PASSWORD) {
    session_start(); //Iniciem sessió.

    $_SESSION["ultimAcces"] = time(); //Inicialitzem la data d'inici de sessió

    //Guardem les dades de l'usuari autenticat en la sessió
    $_SESSION["usuari"] = $_COOKIE["usuari"];
    $_SESSION["contrasenya"] = $_COOKIE["contrasenya"];

    //Mostrem la pàgina de l'aplicació
    header("Location: _5Aplicacio.php");

} else if ($_POST["usuari"] == USUARI && $_POST["contrasenya"] == PASSWORD) { //Si l'autenticació és correcte...
    session_start(); //Iniciem sessió.

    $_SESSION["ultimAcces"] = time(); //Inicialitzem la data d'inici de sessió

    //Guardem les dades de l'usuari autenticat en la sessió
    $_SESSION["usuari"] = $_POST["usuari"];
    $_SESSION["contrasenya"] = $_POST["contrasenya"];

    //Mostrem la pàgina de l'aplicació
    header("Location: _5Aplicacio.php");
} else { //Si l'autenticació no és correcte...

    // Borro el contenido de la cooki y hago que expire:
    setcookie("usuari", NULL, time() - 60, "/", "", 0);
    setcookie("contrasenya", NULL, time() - 60, "/", "", 0);
    header("location:_5inici.php"); //Retornem a la pàgina inicial.
}
