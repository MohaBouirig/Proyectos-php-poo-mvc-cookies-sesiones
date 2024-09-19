<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Inici</title>
</head>

<body>


	<?php
	if (isset($_COOKIE["usuari"]) && isset($_COOKIE["contrasenya"])) {
		header("Location: _5autenticacio.php");
	}
	?>

	<form method="POST" action="_5autenticacio.php">

		<label for="usuari">Usuari: </label><input type="text" name="usuari" id="usuari" /><br /><br />
		<label for="contrasenya">Contrasenya: </label><input type="password" name="contrasenya" id="contrasenya" /><br /><br />
		<label for="savepassword">Guardar contrasenya</label><input type="checkbox" name="savepassword" id="savepassword" value="1" /><br /><br />
		<input type="submit" name="enviar" value="Accedir" />

	</form>
</body>

</html>