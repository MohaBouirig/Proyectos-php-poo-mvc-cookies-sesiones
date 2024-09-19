<HTML LANG="es">

<HEAD>
   <TITLE>Elementos de entrada. Resultados del formulario</TITLE>
  
</HEAD>

<BODY>

<H1>Elementos de entrada. Resultados del formulario</H1>

<H2>Elementos  de tipo INPUT</H2>

<H3>TEXT</H3>
<?PHP

   print ($_POST ['cadena']);
?>
<HR>

<H3>RADIO</H3>
<?PHP

   print ($_POST ['sexo']);
?>
<HR>

<H3>CHECKBOX</H3>
<?PHP
     foreach ($_POST['extras'] as $extra)
      print ("$extra<BR>\n");
?>

<HR>

<H3>HIDDEN</H3>
<?PHP

   print ($_POST ['username']);
?>
<HR>

<H3>PASSWORD</H3>
<?PHP
  
   print ($_POST ['clave']);
?>
<HR>

<H3>SUBMIT</H3>
<?PHP
 
   if ($_POST ['enviar'])
      print ("Se ha pulsado el botón de enviar");
?>
<HR>

<H2>Elemento SELECT</H2>

<H3>SELECT SIMPLE</H3>
<?PHP
 
   print ($_POST ['color']);
?>
<HR>

<H3>SELECT MÚLTIPLE</H3>
<?PHP
  
   foreach ($_POST['idiomas'] as $idioma)
      print ("$idioma<BR>\n");
?>
<HR>

<H2>Elemento TEXTAREA</H2>
<?PHP

   print ($_POST ['comentario']);
?>

<BR><BR>
[ <A HREF='javascript:history.back()'>Volver</A> ]

</BODY>
</HTML>
