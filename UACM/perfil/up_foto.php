<?php include '../conexion/conexion.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia 1 if*/
	$correo = $_SESSION['correo'];
	$foto = $_SESSION['foto'];
	
	$extension = '';
	$ruta = 'foto_perfil';
	$archivo = $_FILES['foto']['tmp_name'];
	$nombrearchivo = $_FILES['foto']['name'];
	$info = pathinfo($nombrearchivo);
	if($archivo != ''){/*Inicia 2 if*/
		$extension = $info['extension'];
		if($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG"){/*Inicia 3 if*/
			unlink('../usuarios/'.$foto);
			move_uploaded_file($archivo,'../usuarios/foto_perfil/'.$correo.'.'.$extension);
			$ruta = $ruta."/".$correo.'.'.$extension;
			$up = $con->query("UPDATE usuarios SET  foto='$ruta' WHERE correo='$correo' ");
			if($up){/*Inicia 4 if*/
				$_SESSION['foto'] = $ruta;
				header('location:../extend/alerta.php?msj=Foto de perfil actualizada&c=pe&p=in&t=success');
			}/*Fin 4 if*/
			else{/*Inicia else*/
				header('location:../extend/alerta.php?msj=La foto de perfil no pudo ser actualizada&c=pe&p=in&t=error');
			}/*Fin else*/
		}/*Fin 3 if*/
		else{/*Inica else*/
			header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
		}/*Fin else*/
	}/*Fin 2 if*/
	else{/*Inica else*/
		header('location:../extend/alerta.php?msj=No se detecto ninguna foto para actualizar&c=pe&p=in&t=error');
	}/*Fin else*/
	
	
	
	
	$con->close();
}/*Fin 1 if*/
else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=pe&p=in&t=error');
}/*Fin else*/


?>
