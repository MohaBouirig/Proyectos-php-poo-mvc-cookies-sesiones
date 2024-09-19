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
   print ("   <LI>Texto de búsqueda: $texto\n");
   print ("   <LI>Buscar en: $donde\n");
   print ("   <LI>Género: $genero\n");
   print ("</UL>\n");
?>

[ <A HREF='ejercicio1.php'>Nueva búsqueda</A> ]

</BODY>
</HTML>
