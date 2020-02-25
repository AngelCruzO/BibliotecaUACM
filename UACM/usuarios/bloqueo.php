<?php
include'../conexion/conexion.php';
$user = $_SESSION['correo'];

$up = $con->query("UPDATE usuarios SET bloqueo=0 WHERE correo='$user' ");
if($up){/*Inicia if*/
	$_SESSION = array();
	session_destroy();
	header('location:../extend/alerta.php?msj=USO INDEVIDO DEL SISTEMA&c=us&p=in&t=error');
	exit;
}/*Termina if*/
?>