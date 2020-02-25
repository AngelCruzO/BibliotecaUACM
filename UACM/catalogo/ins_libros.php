<?php 
include '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){//Incia if
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
	
	$id = '';
	
	$extension = '';
	$ruta = 'portadas_libros';
	$archivo = $_FILES['portada']['tmp_name'];
	$nombrearchivo = $_FILES['portada']['name'];
	$info = pathinfo($nombrearchivo);
	if($archivo != ''){/*Inicia noveno if*/
		$extension = $info['extension'];
		if($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG"){/*Inicia decimo if*/
			move_uploaded_file($archivo,'portadas_libros/'.$titulo.'.'.$extension);
			$ruta = $ruta."/".$titulo.'.'.$extension;
		}/*Fin decimo if*/
		else{/*Inica elese*/
			header('location:../extend/alerta.php?msj=El formato no es valido&c=li&p=li&t=error');
			exit;
		}/*Fin else*/
	}/*Fin noveno if*/
	else{/*Inica else*/
		$ruta = "portadas_libros/portada.png";
	}/*Fin else*/
	
	$ins = $con->prepare(" INSERT INTO libros VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
	$ins->bind_param("issssssissis",$id,$titulo,$autor,$edicion,$tomo,$editorial,$pais,$ano,$isbn,$clasificacion,$ejemplares,$ruta);
	
	if($ins->execute()){//Inicia if
		header('location:../extend/alerta.php?msj=Libro guardado&c=li&p=li&t=success');
	}/*Termina if*/else{//Inicia else
		header('location:../extend/alerta.php?msj=El libro no pudo ser guardado&c=li&p=li&t=error');
	}//Termina else
	
	$ins->close();
	
	$con->close();
	
}/*Termina if*/else{//Inicia else
	header('location:../extend/alerta.php?msj=Utilia el formulario&c=li&p=li&t=error');
}//Termina else
?>