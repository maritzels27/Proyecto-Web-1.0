<?php
/*
Autores: 
Maritzel Euan Solis
Eduardo Emmanuel Ravell May
Ana Carolina Martinez Maza
Leilani Marrufo Novelo
*/

print "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
print "<body><script>
			Swal.fire({
			  title: 'Indique numero de cama a consultar',
			  input: 'number',
			  showCancelButton: true,
			  confirmButtonText: 'Consultar',
			  showLoaderOnConfirm: true,
			}).then((result) => {
			  if (result.value) {
			    window.location = '../SQL/consultaSQL.php?numCama=' + result.value
			  } else if (result.dismiss === Swal.DismissReason.cancel) {
			    window.location='formMenu.php';
			  }
			})
	</script></body>";
?>
