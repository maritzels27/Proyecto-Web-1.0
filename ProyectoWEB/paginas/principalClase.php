<?php 

/*
Autores: 
Maritzel Euan Solis
Eduardo Emmanuel Ravell May
Ana Carolina Martinez Maza
Leilani Marrufo Novelo
*/

print "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
echo "
<head>
	<title>Eliminar</title>
	<link rel='stylesheet' type='text/css' href='../css/estilos.css'>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<link href='../css/all.css' rel='stylesheet'>
	<link href='../css/style.css' rel='stylesheet' type='text/css' />
	<link href='../css/style.css' rel='stylesheet' type='text/css' />
<head>";

class Hospital{

private $opcion;

function __construct($opcion){ // constructor
	$this->opcion=$opcion;
}

function registrar (){
	header ("Location: ../paginas/formRegistraPacientes.html");
}

function mostrarReporte(){
	header("Location: ../SQL/reporteSQL.php");
}

function consultar (){
	header("Location: ../paginas/formNumeroCama.php");
}

function baja(){
	header("Location: ../paginas/eliminarRegistro.php");
}
function editar(){
    header("Location: ../paginas/editarRegistro.php");
}

} //fin de la clase 

// FUNCIONES DEL USUARIO

//estas funciones son llamadas en el menu principal (paginas/formMenu.php)

function mostrarTabla(){ 
	include "../SQL/bd.php";
    $con=ConectaBD();
    $consulta= "SELECT * from pacientes";
    $query=mysqli_query($con,$consulta);
   
    echo "
    <br>
    <CENTER>
    <table class='table '>
    <thead>
      <tr>
        <th scope='col'>Clave</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Numero Cama</th>
        <th scope='col'>Tipo Habitación</th>
        <th scope='col'>Costo</th>
      </tr>
    </thead>
    <tbody>";

    while ($fila=mysqli_fetch_array ($query)){
        echo "<tr>
        <th scope='row'>".$fila ['clave']."</th>
        <td>".$fila ['nombre']."</td>
        <td>".$fila ['numCama']."</td>
        <td>".$fila ['tipoHabitacion']."</td>
        <td>".$fila ['costo']."</td>
        </tr>
        </tbody> ";
    }
    
    mysqli_close($con);
    echo "</table>";
}

function devuelveAutores(){
	echo "<p id='autores'>Programa creado por: LeilaniNovelo, MaritzelEuan, CarolinaMartinez y EduardoRavell &reg; </p>";
}

?>

<?php
//  -----------------------  Principal -----------------------
$opcion = '';
$numCama = 0;
if (isset($_POST['respuesta'])) {
	$opcion=$_POST['respuesta'];
}

//creo el objeto
$objHospital=new Hospital($opcion);

switch ($opcion) {
	case 'registro':
		$objHospital->registrar();
		break;
	case 'reporte':
		$objHospital->mostrarReporte();
		break;
	case 'consulta':
		$objHospital->consultar();
		break;
	case 'baja':
		$objHospital->baja();
		break;	
    case 'editar':
        $objHospital->editar();
        break;    
}
?>