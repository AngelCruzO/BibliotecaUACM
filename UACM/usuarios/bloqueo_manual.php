<?php
include'../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['us']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));

if($bloqueo == 1){/*Inicia if*/
	
	$up = $con->query("UPDATE usuarios SET bloqueo=0 WHERE id='$id'");
	if($up){/*Inicia if*/
		header('location:../extend/alerta.php?msj=El usuario ha sido bloqueado&c=us&p=in&t=success');
	}/*Termina if*/else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=El usuario no ha podido ser bloqueado&c=us&p=in&t=error');
	}/*Termina else*/
	
}/*Termina if*/else{/*Inicia else*/
	
	$up = $con->query("UPDATE usuarios SET bloqueo=1 WHERE id='$id'");
	if($up){/*Inicia if*/
		header('location:../extend/alerta.php?msj=El usuario ha sido desbloqueado&c=us&p=in&t=error');
	}/*Termina if*/else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=El usuario no ha podido ser desbloqueado&c=us&p=in&t=success');
	}/*Termina else*/
	
}/*Termina else*/
?>