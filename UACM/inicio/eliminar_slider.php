<?php 
include '../conexion/conexion.php';
$id = htmlentities($_GET['id']);
$ruta = htmlentities($_GET['ruta']);

$del = $con->prepare("DELETE FROM slider WHERE id=? ");
$del->bind_param('i',$id);

if($del->execute()){/*Inicia if*/
	unlink($ruta);
	header('location:../extend/alerta.php?msj=Imagen borrada&c=home&p=sl&t=success');
}/*Fin if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Imagen no borrada&chome&p=sl&t=error');
}/*Fin else*/

$del->close();
$con->close();
?>