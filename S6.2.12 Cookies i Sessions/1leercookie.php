<?php
if (isset($_COOKIE["vegetal"])) {
    $vegetal = $_COOKIE["vegetal"];

    echo $vegetal;
} else {
    echo "La cookie ha caducado";
}
?>