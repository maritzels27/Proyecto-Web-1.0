<?php

print "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";

function validaBaja($numCama){
    echo "<body><script>
    Swal.fire({
    title: 'Estas seguro?',
    text: 'Estas a punto de eliminar el paciente de la cama ".$numCama."',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Borrar!'
    }).then((result) => {
    if (result.value) {
        window.location='../SQL/bajaSQL.php?accion=eliminar&numCama=".$numCama."'
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        window.location='../paginas/eliminarRegistro.php';
        }
    })
    </script></body>";
}

function eliminar($numCama){
    include "../SQL/bd.php";
    $con=ConectaBD();

    $borrar= "DELETE from pacientes WHERE numCama=".$numCama;
    $query=mysqli_query($con,$borrar);
    if ($query) {
        print "
        <body><script>
        Swal.fire({
        title: 'El Registro Se ha eliminado Correctamente',
        text: 'El paciente se eliminó correctamente',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
             window.location='../paginas/eliminarRegistro.php';
            }
        })
        ;</script></body>";
        } 
    if (!$query) {
        print "
        <body><script>
        Swal.fire({
        title: 'Error al eliminar paciente',
        text: 'Ha ocurrido un error al momento de eliminar al paciente',
        icon: 'error',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
            window.location='../paginas/eliminarRegistro.php';
             }
        })
        ;</script></body>"; 
        }
} 

?>

<?php

//principal

$numCama = $_GET['numCama']; //obtiene el valor 

if (isset($_GET['accion'])) {
    $opcion = $_GET['accion'];

    if ($opcion == 'eliminar') {
        eliminar($numCama);
    }

}else{
    validaBaja($numCama);
}
?>