<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Funcions de data</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	<?php
		//Accedim data actual del sistema como el nombre de segons desde
		//l'Época Unix (1 de Enero de 1970 00:00:00 GMT)
		$dataActual=time();

		//Mostrem la data actual en format UNIX
		echo "<p>La data actual en format UNIX és $dataActual</p>";

		//Generem la dta en format UNIX de la setmana que ve
		$setmanaSeguent =$dataActual + (7 * 24 * 60 * 60); // 7 días; 24 horas; 60 minutos; 60 segundos

		//Mostrem data setmana que ve en format UNIX
		echo "<p>La data de la setmana que ve en format UNIX és $setmanaSeguent</p>";

		//Mostrem la data actual en format dd-mm-yyyy hh:mm:ss
		echo "<p>La data actual és ". date("d-m-Y H:i:s") ."</p>";
                
                //Tornem a mostrar la data actual en segons
                echo "<p>La data actual és ". strtotime(date("d-m-Y H:i:s"));

		//Mostrem la data de la setmana que ve en format dd-mm-yyyy
		echo "<p>Dins d'una setmana la data serà ". date("d-m-Y H:i:s",$setmanaSeguent) ."</p>";
	?>	
</body>

</html>
