<?php
//Accedim al nom d'usuari
$usuari=$_POST["usuari"];
$productes=$_POST["productes"];

//Mostrem el contingut del vector productes
print_r($productes);

//Accedim als productes seleccionats i els mostrem en una llista
function llistarProductes($productes){
	if (!empty($productes)) { //Si la variable productes no està buida...
		echo "<ul>"; //Creem llista html
		//Fem un reccorregut pel vector productes..
		foreach ($productes as $producte) { 
			echo "<li>$producte</li>"; //Mostrem producte actual com li
		}
		echo "</ul>";
	} else { //Si està buida
		echo "No has seleccionat cap producte";
	}
}
?>
