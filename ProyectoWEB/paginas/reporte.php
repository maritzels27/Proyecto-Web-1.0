<?php
/*
Autores: 
Maritzel Euan Solis
Eduardo Emmanuel Ravell May
Ana Carolina Martinez Maza
Leilani Marrufo Novelo
*/
include "bd.php";
$con=ConectaBD();

print "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";

$consulta = "SELECT * FROM pacientes WHERE WHERE tipoHabitacion = 'Lujo'";
	
$result = mysqli_query($con, $consulta);

if($row=mysqli_fetch_array($result)){
	echo "<table border='1'> \n";
	echo "<tr>";
	echo "<td><b>CLAVE</b></td>";
	echo "<td><b>NOMBRE</b></td>";
	echo "<td><b>NUMERO CAMA</b></td>";
	echo "<td><b>TIPO HABITACION</b></td>";
	echo "<td><b>COSTO</b></td>";
	echo "</tr>";
	do {
	echo "<td align=center>".$row["clave"]."</td>";
	echo "<td>".$row["nombre"]."</td> \n";
	echo "<td align=center>".$row["numCama"]."</td> \n";
	echo "<td>".$row["tipoHabitacion"]."</td> \n";
	echo "<td>".$row["costo"]."</td> \n";
	echo "<tr>";
	} while($row=mysqli_fetch_array($result));
		echo "</table>";
} else {
	if ($numCama == 0) {
		echo "¡ La base de datos está vacía !";
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
	}
?>