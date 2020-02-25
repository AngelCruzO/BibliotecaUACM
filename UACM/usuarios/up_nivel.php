<?php
include'../conexion/conexion.php';
include'../extend/permiso.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia if*/
	
	$id = $con->real_escape_string(htmlentities($_POST['id']));
	$nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
	
	$up = $con->query("UPDATE usuarios SET nivel='$nivel' WHERE id='$id' ");
	
	if($up){/*Inicia if*/
		header('location:../extend/alerta.php?msj=Nivel actualizado&c=us&p=in&t=success');
	}/*Termina if*/else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=El nivel del usuario no pudo ser actualizado&c=us&p=in&t=error');
	}/*Termina else*/
	
}/*Termina if*/else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}/*Termina else*/

$con->close();
?>