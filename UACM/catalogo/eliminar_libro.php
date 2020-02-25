<?php
include '../conexion/conexion.php';
$id = htmlentities($_GET['id']);

$del = $con->prepare("DELETE FROM libros WHERE id = ? ");
$del->bind->param('i',$id);

if($del->execute()){//Inicia if
	header('location:../extend/alerta.php?msj=Libro eliminado&c=li&p=li&t=success');
}/*Termina if*/else{//Inicia else
	header('location:../extend/alerta.php?msj=El libro no pudo ser eliminado&c=li&p=li&t=error');
}//Termina else

$del->close();
$con->close();

?>