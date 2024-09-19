<?php
//Contingut del cos del correu. Cada línia tindria que estar separada 
//per un CRLF (\r\n). Les línies no haurien d'ocuparmés de 70 caràcteres.
$missatge  = "Nom:    ".$_POST['nom']."\n";
$missatge .= "Correu:  ".$_POST['correu']."\n";
$missatge .= "Missatge: ".$_POST['missatge']."\n";

//Contingut del correu
$destinatari = "pepito.delospalotes@copernic.cat";
$subjecte = "Nou correu"; 
$capcalera  = "From: remitente@remitente.com \n";
$capcalera .= "Reply-To: ".$_POST["correu"];

//send the mail
mail($destinatari, $subjecte, $missatge, $capcalera);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enviament de correu electrònic</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
	<p>Gràcies, <strong><?php echo $_POST["nom"]; ?></strong>, pel teu missatge.</p>
	<p>La teva adreça de correu: <strong><?php echo $_POST["correu"]; ?></strong></p>
	<p>El contingut del teu correu: <br/> <?php echo $_POST["missatge"]; ?> </p>
</body>
</html>


