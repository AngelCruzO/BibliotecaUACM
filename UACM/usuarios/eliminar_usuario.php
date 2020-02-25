<?php
include'../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM usuarios WHERE id='$id' ");

if($del){/*Inicia if*/
	header('location:../extend/alerta.php?msj=Usuario eliminado&c=us&p=in&t=success');
}/*Termina if*/else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=No se puede eliminar el usuario&c=us&p=in&t=error');
}/*Termina else*/

$con->close();
?>