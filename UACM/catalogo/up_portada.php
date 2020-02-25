<?php 
include '../conexion/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia 1 if*/
	$id = htmlentities($_POST['id']);
	$foto = htmlentities($_POST['anterior']);
	$titulo = htmlentities($_POST['titulo']);
	$ruta = $_FILES['foto']['tmp_name'];
	$imagen = $_FILES['foto']['name'];
	
	$ancho = 500;
	$alto = 400;
	$info = pathinfo($imagen);
	$tamano = getimagesize($ruta);
	$width = $tamano[0];
	$height = $tamano[1];
	
	if($info['extension'] == 'jpg' || $info['extension'] == 'JPG'){/*Inicia if jpg*/
		$imagenvieja = imagecreatefromjpeg($ruta);
		$nueva = imagecreatetruecolor($ancho,$alto);
		imagecopyresampled($nueva, $imagenvieja, 0,0,0,0, $ancho,$alto,$width,$height);
		$copia = "portadas_libros/".$titulo.'.jpg';
		imagejpeg($nueva,$copia);
	}/*Fin if jpg*/
	elseif($info['extension'] == 'png' || $info['extension'] == 'PNG'){/*Inicia if png*/
	$imagenvieja = imagecreatefrompng($ruta);
	$nueva = imagecreatetruecolor($ancho,$alto);
	imagecopyresampled($nueva, $imagenvieja, 0,0,0,0, $ancho,$alto,$width,$height);
	$copia = "portadas_libros/".$titulo.'.png';
	imagepng($nueva,$copia);
	}/*Fin if png*/
	else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=Solo se acepta formato JPG y PNG&c=li&p=img&t=error&id='.$id.'');
		exit;
	}/*Fin else*/
	
	
	$up = $con->prepare("UPDATE libros SET  portada=? WHERE id=? ");
	$up->bind_param('si',$copia,$id);
	if($up->execute()){/*Inicia if*/
		header('location:../extend/alerta.php?msj=Portada actualizada&c=li&p=li&t=success&id='.$id.'');
	}/*Fin if*/
	else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=Portada no actualizada&c=li&p=li&t=error&id='.$id.'');
	}/*Fin else*/
	
	
	$up->close();
	$con->close();
}/*Fin 1 if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=li&p=img&t=error&id='.$id.'');
}/*Fin else*/
?>