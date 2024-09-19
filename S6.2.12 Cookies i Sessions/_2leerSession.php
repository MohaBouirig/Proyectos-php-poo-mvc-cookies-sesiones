<?php
session_start();
echo "<p>El SID de la teva sessió és ".session_id().".</p>";
var_dump($_SESSION);

echo "<br/><a href='_2leerSession2.php'>Enviar</a>";

?>