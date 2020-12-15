<!--
Autores: 
Maritzel Euan Solis
Eduardo Emmanuel Ravell May
Ana Carolina Martinez Maza
Leilani Marrufo Novelo
-->

<?php 
include "../SQL/bd.php";
	$con=ConectaBD();

$nombre="";
$numCama="";
$tipoHabitacion="";
$costo="";
$edicion="";
$clave="";
//echo "<FONT COLOR=WHITE>".$_GET['accion']."</FONT>";
	if(!empty($_GET['clave']) && !empty($_GET['accion'])&& $_GET['accion']=='editar1'){

//proceso la informacion si se cumple la condicion 
  $recupera="SELECT * FROM pacientes WHERE clave='".$_GET['clave']."'";
  echo "<FONT COLOR=WHITE></FONT>";
$queryrecupera=mysqli_query($con,$recupera);
$edit=mysqli_fetch_array($queryrecupera);

$nombre=$edit['nombre'];
$numCama=$edit['numCama'];
$tipoHabitacion=$edit['tipoHabitacion'];
$costo=$edit['costo'];
$edicion="actualizar";
$clave=$edit['clave'];

} 


 ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Editar Pacientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Custom Theme files -->
	<link href="../css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<link href="../css/style.css" rel='stylesheet' type='text/css' /><link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
</head>
<body>

	<h1>Registro de nuevos pacientes</h1>
    <div class="bg-agile">
		<div class="book-appointment">
		<h2>Registrar paciente</h2>
					<INPUT TYPE= 'submit' id='return' VALUE="Regresar al menu" onclick= location.href='../paginas/formMenu.php'>
			<form action="../SQL/editarSQL.php" method="post" name="appointment" id="appointment">	
				<input type="hidden" name="editar1" value="<?php echo $edicion;?>"> 
				<input type="hidden" name="clave" value="<?php echo $clave;?>"> 
				<div id="resultados_ajax" class="gaps"></div>

				<div class="left-agileits-w3layouts same">
				<div class="gaps">
					<p>Nombre del paciente</p>
						<input type="text" name="nombre" value="<?php echo $nombre;?>" placeholder="" required=""/>
				</div>
		        <div class="gaps">
					<p>Cama Asignada</p>
							<input type="text" name="cama" value="<?php echo $numCama;?>" placeholder="" required="" />
				</div>	
				</div>

				<div class="right-agileinfo same">
				<div class="gaps">
					<p>Habitacion</p>	
						<select class="form-control" name="tipoHabitacion" required=""/ >
							<option <?php if($tipoHabitacion=="General"){echo "selected";} ?>
							value="General">Sala General</option>
							<option <?php if($tipoHabitacion=="Normal"){echo "selected";} ?> value="Normal">Habitacion Normal</option>
							<option <?php if($tipoHabitacion=="Lujo"){echo "selected";} ?> value="Lujo">Habitacion de Lujo</option>	
						</select>
				</div>
				<div class="gaps">
					<p>Costo por dia</p>
		           	 <input type="text" name="costo" value="<?php echo $costo;?>" placeholder="" required="" />
				</div>
				</div>

				<input type="submit" value="Registrar paciente">
			</form>
				
		</div>
    </div>	

</body>
</html>