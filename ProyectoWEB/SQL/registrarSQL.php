<?php
include "bd.php";
print "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
$con=ConectaBD();

//Obtener los valores

$nombre=$_POST['nombre'];
$numCama=$_POST['cama'];
$tipoHabitacion=$_POST['tipoHabitacion'];
$costo=$_POST['costo'];

$consulta = "SELECT * FROM pacientes WHERE numCama = ". $numCama;
$result = mysqli_query($con, $consulta);
 //valida que no haya algun paciente ocupando la cama
$encontrado = true;
if($row=mysqli_fetch_array($result)){	 
		while($row=mysqli_fetch_array($result)){
			$encontrado = true;
			break;
		}		
}else {
	$encontrado=false;
	}
	if ($encontrado) { 
		
		print "
		<body><script>
		Swal.fire({
		title: '',
		text: 'Existe un paciente ocupando la cama ".$numCama."',
		icon: 'info',
		showCancelButton: false,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'OK!'
		}).then((result) => {
		if (result.value) {
			window.location='../paginas/formRegistraPacientes.html';
			}
		})
		;</script></body>";
	} else {
		$SQLguardar="INSERT INTO pacientes(nombre,numCama,tipoHabitacion, costo) VALUES('".$nombre."','".$numCama."','".$tipoHabitacion."','".$costo."')";

		$query=mysqli_query($con,$SQLguardar);
		if ($query) {
			print "
			<body><script>
			Swal.fire({
			title: 'Registro Agregado Correctamente',
			text: 'El paciente se agregó correctamente',
			icon: 'success',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'OK!'
			}).then((result) => {
			if (result.value) {
				window.location='../paginas/formMenu.php';
				}
			})
			;</script></body>";		
		} 
		if (!$query) {
			print "
			<body><script>
			Swal.fire({
			title: 'Error al registrar paciente',
			text: 'Ha ocurrido un error al momento de registrar al paciente',
	     	icon: 'error',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'OK!'
			}).then((result) => {
			if (result.value) {
				window.location='../paginas/formRegistraPacientes.html';
				}
			})
			;</script></body>";	
		}
	}
?>