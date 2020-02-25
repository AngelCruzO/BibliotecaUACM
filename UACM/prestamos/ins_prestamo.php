<?php 
include '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){//Incia if
	$titulo = htmlentities($_POST['titulo']);
	$autor = htmlentities($_POST['autor']);
	$nombre = htmlentities($_POST['nombre']);
	$ejemplar = htmlentities($_POST['ejemplar']);
	$status = htmlentities($_POST['status']);
	$id_li = htmlentities($_POST['id']);
	$id = '';
	$ejemplar = 1;
	
	$fecha_inicial = date("Y-m-d",strtotime($fecha_inicial."- 1 day"));
	$fecha_limite = date("Y-m-d",strtotime($fecha_inicial."+ 8 days"));
		
	
	$ins = $con->prepare(" INSERT INTO prestamos VALUES(?,?,?,?,?,?,?,?)");
	$ins->bind_param("issssssi",$id,$titulo,$autor,$nombre,$fecha_inicial,$fecha_limite,$status,$ejemplar);
		
	if($ins->execute()){//Inicia if
		header('location:../extend/alerta.php?msj=Libro fue prestado&c=pre&p=pre&t=success');
		
	}/*Termina if*/else{//Inicia else
		header('location:../extend/alerta.php?msj=El libro no pudo ser prestado&c=pre&p=pre&t=error');
	}//Termina else
	
	$ins->close();
	$con->close();
	
}/*Termina if*/else{//Inicia else
	header('location:../extend/alerta.php?msj=Utilia el formulario&c=pre&p=pre&t=error');
}//Termina else
?>