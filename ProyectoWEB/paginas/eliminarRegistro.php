<?php
/*
Autores: 
Maritzel Euan Solis
Eduardo Emmanuel Ravell May
Ana Carolina Martinez Maza
Leilani Marrufo Novelo
*/
	include "../SQL/bd.php";
	$con=ConectaBD();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Eliminar</title>
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
	<h1>Eliminar registro de un paciente</h1>
	<center><h2>Haga clik en el icono rojo para eliminar un paciente</h2></center>
		<INPUT  id='return' TYPE= 'SUBMIT' VALUE="Regresar al menu" onclick="location.href='../paginas/formMenu.php'">
		
	<?php
		$consulta= "SELECT * from pacientes";
		$query=mysqli_query($con,$consulta);
	?>
		
	<table class="table" >
		 <thead>
		    <tr>
		      <th scope="col">Clave</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Numero Cama</th>
		      <th scope="col">Tipo Habitación</th>
		      <th scope="col">Costo</th>
		      <th scope="col">Accion</th>
		    </tr>
		  </thead>
			<tbody>
		  	<?php
    		while ($fila=mysqli_fetch_array ($query)){
      		?>
				<tr>
			      <th scope="row"><?php echo $fila ['clave']?></th>
			      <td><?php echo $fila ['nombre']?></td>
			      <td><?php echo $fila ['numCama']?></td>
			      <td><?php echo $fila ['tipoHabitacion']?></td>
			      <td><?php echo $fila ['costo']?></td>
			      <td><a class="btn btn-outline-danger"  href="../SQL/bajaSQL.php?numCama=<?php echo $fila ['numCama']?>"><i class="fas fa-trash"></i></a></td>
				</tr>
			</tbody> 
			<?php }
			mysqli_close($con);?>  
	</table>
	
	</div>
	
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/16cf516560.js" crossorigin="anonymous"></script>
	

	
</body>
</html>