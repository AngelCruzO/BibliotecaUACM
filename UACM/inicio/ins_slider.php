<?php
include '../conexion/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia 1 if*/
	$cont = 0;
	foreach($_FILES['ruta']['tmp_name'] as $key => $value){/*Inicia foreach*/
		$ruta = $_FILES['ruta']['tmp_name'][$key];
		$imagen = $_FILES['ruta']['name'][$key];
		
	$ancho = 1080;
	$alto = 250;
	$info = pathinfo($imagen);
	$tamano = getimagesize($ruta);
	$width = $tamano[0];
	$heigth = $tamano[1];
	
	if($info['extension'] == 'jpg' || $info['extension'] == 'JPG'){/*Inicia if jpg*/
		$imagenvieja = imagecreatefromjpeg($ruta);
		$nueva = imagecreatetruecolor($ancho, $alto);
		imagecopyresampled($nueva, $imagenvieja, 0,0,0,0, $ancho,$alto,$width,$heigth);
		$cont++;
		$ran = rand(000,999);
		$renombrar = $ran.$contador;
		$copia = "slider/".$renombrar.".jpg";
		imagejpeg($nueva,$copia);
	}/*Fin if jpg*/
	elseif($info['extension'] == 'png' || $info['extension'] == 'PNG'){/*Inicia if png*/
		$imagenvieja = imagecreatefrompng($ruta);
		$nueva = imagecreatetruecolor($ancho, $alto);
		imagecopyresampled($nueva, $imagenvieja, 0,0,0,0, $ancho,$alto,$width,$heigth);
		$cont++;
		$ran = rand(000,999);
		$renombrar = $ran.$contador;
		$copia = "slider/".$renombrar.".png";
		imagepng($nueva,$copia);
	}/*Fin if png*/
	else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=Solo se acepta formato JPG y PNG&c=home&p=sl&t=error');
		exit;
	}/*Fin else*/
	
	$id_img='';
	$ins = $con->prepare(" INSERT INTO slider VALUES(?,?) ");
	$ins->bind_param("is",$id_img, $copia);
	$ins->execute();
		
	
	}/*Fin foreach*/
	
	if($ins){/*Inicia if*/
		header('location:../extend/alerta.php?msj=Imagenes Guardadas&c=home&p=sl&t=success');
	}/*Fin if*/
	else{/*Inicia else*/
		header('location:../extend/alerta.php?msj=Imagenes no guardadas&c=home&p=sl&t=error');
	}/*Fin else*/
	
	$ins->close();
	$con->close();
}/*Fin 1 if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=home&p=sl&t=error');
}/*Fin else*/
?>