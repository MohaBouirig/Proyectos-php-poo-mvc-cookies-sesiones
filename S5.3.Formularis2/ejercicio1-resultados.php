<HTML LANG="es">

<HEAD>
   <TITLE>Formulario simple. Resultados del formulario</TITLE>
  
</HEAD>

<BODY>

<H1>Formulario simple. Resultados del formulario</H1>

<P>Estos son los datos introducidos:</P>

<?PHP
   $texto = $_POST['texto'];
   $donde = $_POST['donde'];
   $genero = $_POST['genero'];

   print ("<UL>\n");
   print ("   <LI>Texto de b�squeda: $texto\n");
   print ("   <LI>Buscar en: $donde\n");
   print ("   <LI>G�nero: $genero\n");
   print ("</UL>\n");
?>

[ <A HREF='ejercicio1.php'>Nueva b�squeda</A> ]

</BODY>
</HTML>
