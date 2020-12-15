<?php


    include "../SQL/bd.php";
   $con=ConectaBD();
   print "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
?>
<?php  

$numCama = $_POST['cama'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
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
	$sentencia = "SELECT clave,numCama FROM pacientes WHERE clave='".$clave."'AND numCama='".$numCama."'";
	$resultado=mysqli_query($con,$sentencia);
	//echo $numCama;
	//echo $row['clave'];
	//echo $row['cama'];
	if ($row=mysqli_fetch_array($resultado)) {
		if(!empty($_POST['clave']) && !empty($_POST['editar1']) && $_POST['editar1']=='actualizar'){
//proceso la informacion si se cumple la condicion 
  $actualiza="UPDATE pacientes SET nombre='".$_POST['nombre']."',numCama='".$_POST['cama']."',tipoHabitacion='".$_POST['tipoHabitacion']."',costo='".$_POST['costo']."'
  WHERE clave='".$_POST['clave']."'";
$queryactualiza=mysqli_query($con,$actualiza);
print "
			<body><script>
			Swal.fire({
			title: 'Registro Actualizado Correctamente',
			text: 'El paciente se edito correctamente',
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
	}else{
		if ($encontrado) { 
		
		print "
		<body><script>
		Swal.fire({
		title: 'Intentelo Nuevamente',
		text: 'Existe un paciente ocupando la cama ".$numCama ."',
		icon: 'info',
		showCancelButton: false,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'OK!'
		}).then((result) => {
		if (result.value) {
			window.location='../paginas/editarRegistro.php';
			}
		})
		;</script></body>";
	}else {

		if(!empty($_POST['clave']) && !empty($_POST['editar1']) && $_POST['editar1']=='actualizar'){
//proceso la informacion si se cumple la condicion 
  $actualiza="UPDATE pacientes SET nombre='".$_POST['nombre']."',numCama='".$_POST['cama']."',tipoHabitacion='".$_POST['tipoHabitacion']."',costo='".$_POST['costo']."'
  WHERE clave='".$_POST['clave']."'";
$queryactualiza=mysqli_query($con,$actualiza);
print "
			<body><script>
			Swal.fire({
			title: 'Registro Actualizado Correctamente',
			text: 'El paciente se edito correctamente',
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

		if (!$queryactualiza) {
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
				window.location='../paginas/editarRegistro.php';
				}
			})
			;</script></body>";	
		}
	}


}
}

  ?>
