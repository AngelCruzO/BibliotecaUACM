<?php 
include '../conexion/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){/*Inicia 1 if*/
	$id = htmlentities($_GET['id']);
	$fecha_limite = date("Y-m-d",strtotime($fecha_limite."- 1 day"));
	$status = 'DEVUELTO';
	
	
	$up = $con->prepare("UPDATE prestamos SET  fecha_limite=?,status=? WHERE id=? ");
	$up->bind_param('ssi',$fecha_limite,$status,$id);
	if($up->execute()){/*Inicia if*/
		header('location:../extend/alerta.php?msj=Libro devuelto&c=devol&p=devol&t=success');
	}/*Fin if*/
	else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=Libro no devuelto&c=devol&p=devol&t=error');
	}/*Fin else*/
	
	
	$up->close();
	$con->close();
}/*Fin 1 if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=devol&p=devol&t=error');
}/*Fin else*/
?>