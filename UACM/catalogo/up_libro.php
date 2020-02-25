<?php 
include '../conexion/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia 1 if*/
	$titulo = htmlentities($_POST['titulo']);
	$autor = htmlentities($_POST['autor']);
	$edicion = htmlentities($_POST['edicion']);
	$tomo = htmlentities($_POST['tomo']);
	$editorial = htmlentities($_POST['editorial']);
	$pais = htmlentities($_POST['pais']);
	$ano = htmlentities($_POST['ano']);
	$isbn = htmlentities($_POST['isbn']);
	$clasificacion = htmlentities($_POST['clasificacion']);
	$ejemplares = htmlentities($_POST['ejemplares']);
	$id = htmlentities($_POST['id']);
	
	$up = $con->prepare("UPDATE libros SET titulo=?, autor=?, edicion=?, tomo=?, editorial=?, pais=?, ano=?, isbn=?, clasificacion=?, ejemplares=? WHERE id=? ");
	$up->bind_param('ssssssissii', $titulo, $autor, $edicion, $tomo, $editorial, $pais, $ano, $isbn, $clasificacion, $ejemplares, $id);
	
	if($up->execute()){/*Inicia 2 if*/
		header('location:../extend/alerta.php?msj=Libro actualizado&c=li&p=li&t=success');
	}/*Fin 2 if*/
	else{/*Incia else*/
		header('location:../extend/alerta.php?msj=El libro no pudo ser actualizado&c=li&p=li&t=error');
	}/*Fin else*/
	
	$up->close();
	$con->close();
}/*Fin 1 if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=li&p=li&t=error');
}/*Fin else*/

?>