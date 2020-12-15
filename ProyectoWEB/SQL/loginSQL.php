
<?php

if(!empty($_POST)){
	if(isset($_POST["user"]) &&isset($_POST["pass"])){
		if($_POST["user"]!=""&&$_POST["pass"]!=""){
			include "bd.php";
			$con=ConectaBD();

			$user_id=null;
			$sql1= "SELECT * FROM usuarios WHERE (user=\"$_POST[user]\") and password=\"$_POST[pass]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["ID"];
				
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../paginas/inicioSesion.html';</script>";
			}else{
				
				header ("Location: ../paginas/formMenu.php");
				print "<script>window.location='../paginas/menuPrincipal.php';</script>";
			}
		}
	}
}


 ?>