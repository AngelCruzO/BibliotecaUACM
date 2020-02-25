<?php include '../conexion/conexion.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia 1 if*/
	$correo = $_SESSION['correo'];
	$telefono = $con->real_escape_string(htmlentities($_POST['telefono']));
	$correo1 = $con->real_escape_string(htmlentities($_POST['correo']));
	$direccion = $con->real_escape_string(htmlentities($_POST['direccion']));
	
	$up = $con->query("UPDATE usuarios SET  telefono='$telefono', correo='$correo1', direccion='$direccion' WHERE correo='$correo' ");
	
	if($up){/*Inicia 2 if*/
		$_SESSION['telefono'] = $telefono;
		$_SESSION['correo'] = $correo1;
		$_SESSION['direccion'] = $direccion;
		header('location:../extend/alerta.php?msj=Datos actualizados&c=pe&p=pe&t=success');
	}/*Fin 2 if*/
	else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=Datos no actualizados&c=pe&p=pe&t=error');
	}/*Fin else*/
	
	
	$con->close();
}/*Fin 1 if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=pe&p=pe&t=error');
}/*Fin else*/

?>