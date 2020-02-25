<?php include '../conexion/conexion.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia 1 if*/
	$correo = $_SESSION['correo'];
	$pass = $con->real_escape_string(htmlentities($_POST['pass1']));
	/*$pass = sha1($pass);*/
	
	$up = $con->query("UPDATE usuarios SET  contraseña='$pass' WHERE correo='$correo' ");
	
	if($up){/*Inicia 2 if*/
		
		header('location:../extend/alerta.php?msj=Password actualizado&c=pe&p=pe&t=success');
	}/*Fin 2 if*/
	else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=Password no pudo ser actualizado&c=pe&p=pe&t=error');
	}/*Fin else*/
	
	
	$con->close();
}/*Fin 1 if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=pe&p=pe&t=error');
}/*Fin else*/

?>