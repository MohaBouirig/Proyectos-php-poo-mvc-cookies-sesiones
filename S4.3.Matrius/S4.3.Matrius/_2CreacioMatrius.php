<?php
/* Creació de matrius multidimensionals.*/

//Creem una taula (matriu bidimensional mateixa llarga què amplada)= Matriu formada per vectors o altres parells index/valor.
$taula = array(
				array(
				"nom" => "Bob",
				"ocupacio" => "Superheroi",
				"edat" => 30,
				"poder" => "Visió raigs x"
				),
				array(
				"nom" => "Sally",
				"ocupacio" => "Superheroïna",
				"edat" => 24,
				"poder" => "Força sobrenatural"
				),
				array(
				"nom" => "Jane",
				"ocupacio" => "Superheroïna",
				"edat" => 33,
				"poder" => "Nanotecnologia"
				)
			);
			
//Mostrem un valor concret de la taula
echo "El valor de l'edat del personatge del segon vector és: ".$taula[1]["edat"]."<hr/>";

//Mostrem tot el contingut de la taula
foreach ($taula as $personatge) { //Per cada element de la taula...

		/*El constructor list crea un llistat de variables.
		 * 
		 *La funció each fa un recorregut per tots els elements (parell índex/valor)
		 *d'un vector. Així doncs, retorna el parell índex/valor actual d'un vector
		 *i abança el cursor del vector fins arribar al final d'aquest. 
		 *Si arriba al final del vector retorna fals.
		 */
		foreach ($personatge as $index => $valor) { // Para cada par clave-valor en el elemento...
			echo "$index ... $valor <br/>"; // Mostramos el par clave/valor
		}
		
        echo "<hr/>"; //Insertem línia html
}


//Creem una matriu tridimensional= Matriu formada per matrius formades per vectors o altres parells index/valor.
$personatges = array(
			"dadesPersonals" => array(
								"noms" => array("Bob","Sally","Jane"),
								"edats" => array(30,24,33)
                   ),
			"dadesLaborals" => array(
								"ocupacio" => array("Superheroi","Superheroïna"),
								"poder" => array("Visió raigs x","Força sobrenatural","Nanotecnologia"),
								"ciutat" => array("Nova York")
                   )
 );

//Mostrem un valor concret de la matriu
echo "El nom del primer personatge és: ".$personatges["dadesPersonals"]["noms"][0]."<hr/>";

//Mostrem tot el contingut de la matriu
foreach ($personatges as $dades) { //Per cada element de la matriu...
	foreach ($dades as $contingut){ //Per cada element dels vectors de la matriu
	
		/*while (list($index, $valor) = each ($contingut)) { 
                echo "$index ... $valor <br/>"; 
          }, fa el mateix que la següent estructura*/
          
    	foreach ($contingut as $index => $valor){ //Mentres no arribem al final del vector...
			echo "$index...$valor<br/>"; //Mostrem el parell index/valor
		}
		echo "<hr/>"; //Insertem línia html
	}
}

?>
