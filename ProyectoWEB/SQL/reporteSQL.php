<!DOCTYPE html>
<html>

<head>
	<title>Reporte </title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="../css/all.css" rel="stylesheet">
	<link href="../css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
</head>

<body>

<div class="book-appointment">
	
	<H1>CONSULTA DE REGISTROS</H1>
	<center> <H2>Pacientes asignados a la habitación de lujo</H2> </center>
    <INPUT  id='return' TYPE= 'SUBMIT' VALUE='Regresar al menu' onclick=location.href='../paginas/formMenu.php'> ";
<?php

include "bd.php";
$con=ConectaBD();
print "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
	
$consulta = "SELECT * FROM pacientes WHERE tipoHabitacion = 'Lujo'";	

$result = mysqli_query($con, $consulta);
	if($row=mysqli_fetch_array($result)){
		echo "<table  id= 'tabla';> \n";
	    echo "<tr>";
		echo "<td><b><h2>CLAVE</b></td>";
	    echo "<td><b><h2>NOMBRE</b></td>";
		echo "<td><b><h2>NUMERO CAMA</b></td>";
		echo "<td><b><h2>TIPO HABITACION</b></td>";
		echo "<td><b><h2>COSTO</b></td>";
		echo "</tr>";
		do {
			 echo "<td>".$row["clave"]."</td>";
			 echo "<td>".$row["nombre"]."</td> \n";
			 echo "<td>".$row["numCama"]."</td> \n";
			 echo "<td>".$row["tipoHabitacion"]."</td> \n";
			 echo "<td>".$row["costo"]."</td> \n";
			 echo "<tr>";
		} while($row=mysqli_fetch_array($result));
			echo "</table>";
			
	} else {
		print "<body><script>
		Swal.fire({
	    title: 'Datos no encontrados',
	    text: 'No se encontraron registros coincidentes',
	    icon: 'info',
	    showCancelButton: false,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    confirmButtonText: 'Regresar!'
		}).then((result) => {
		if (result.value) {
		  window.location='../paginas/formMenu.php';
			};
		});
		;</script></body>";
	}
?>
</div>			    
</body>
</html>