<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Inici</title>
</head>

<body style="background-color: #E8CA33;">


	<?php
	// comprobamos si las cookies de usuari y contraseña existen.
	if (isset($_COOKIE["usuari"]) && isset($_COOKIE["contrasenya"])) {
		//redirige a autentificacion
		header("Location: _5autenticacio.php");
	}
	?>

	<form method="POST" action="_5autenticacio.php">

		<input type="text" name="usuari" id="usuari" placeholder="USURIO" /><br /><br />
		<input type="password" name="contrasenya" id="contrasenya" placeholder="CONTRASEÑA" /><br /><br />
		<label for="savepassword">Guardar contrasenya</label><input type="checkbox" name="savepassword" id="savepassword" value="1" /><br /><br />
		<input type="submit" name="enviar" value="Accedir" style="background-color: #C7B24A ;" />

	</form>
</body>

</html>