<!--
Autores: 
Maritzel Euan Solis
Eduardo Emmanuel Ravell May
Ana Carolina Martinez Maza
Leilani Marrufo Novelo
-->


<!DOCTYPE html>
<html>
<head>
<title>Menu principal</title>

<link href="../css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="../css/estilos.css">
<!--fonts--> 
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

</head>
<body>
<div id="cerrar" class="book-appointment">
        		<a href="inicioSesion.html"><img src="../imagenes/cerrar.png"></a>
	</div>
    <form action='principalClase.php' method="post" name="appointment" id="appointment">
        <div id="menu-principal" class="book-appointment " >

	<?php
		//formulario del menu principal
		echo "

		<body>



		<FORM   METHOD=POST ACTION='principalClase.php'>
		<p><font color='white'>

		<H1> Elija la acción que desea relizar </H1>

		<INPUT TYPE= RADIO id='r1' NAME= respuesta VALUE='registro' checked>
		<label for='r1'>Registro de pacientes</label> <br><br> 
		<INPUT TYPE= RADIO id='r2' NAME= respuesta VALUE='reporte'>
		<label for='r2'>Reporte de los pacientes en la habitación de lujo</label> <br> <br>
		<INPUT TYPE= RADIO id='r3' NAME= respuesta VALUE='consulta'>
		<label for='r3'>Consulta de pacientes por cama.</label><br> <br>
		<INPUT TYPE= RADIO id='r4'NAME= respuesta VALUE='baja'>
		<label for='r4'>Eliminar a un paciente</label> <br> <br>
		<INPUT TYPE= RADIO id='r5' NAME= respuesta VALUE='editar'>
		<label for='r5'>Editar datos de un paciente</label> <br> <br>
		<INPUT TYPE= 'SUBMIT' VALUE='Enviar datos'>

		</font>
		</p>
		</FORM>
		
		</body>
		 <h1>Lista completa de pacientes</h1>
		";
//llamo a los metodos creados en principalClase.php (metodos de usuario)
include "principalClase.php";
mostrarTabla();
devuelveAutores();
?>
		</div>			
    </form>

</body>
</html>


