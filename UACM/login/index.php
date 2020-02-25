<?php
include'../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){/*Inicia if*/
	
	$user = $con->real_escape_string(htmlentities($_POST['usuario']));
	$pass = $con->real_escape_string(htmlentities($_POST['contra']));
	$candado = ' ';
	$str_u = strpos($user,$candado);
	$str_p = strpos($pass,$candado);
	
	if(is_int($str_u)){/*Inicia if*/
		$user = '';
	}/*Termina if*/else{/*Inicia else*/
		$usuario = $user;
	}/*Termina else*/
	
	if(is_int($str_p)){/*Incia if*/
		$pass = '';
	}/*Termina if*/else{/*Inicia else*/
		$pass2 = $pass;
	}/*Termina else*/
	
	if($user == null && $pass == null){/*Inicia if*/
		header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
	}/*Termina if*/else{/*Inicia else+*/
		
		$sel = $con->query("SELECT nombre, matricula, colegio, telefono, direccion, nivel, foto, correo, bloqueo, contraseña FROM usuarios WHERE correo='$usuario' AND contraseña='$pass2' AND bloqueo=1 ");
		$row = mysqli_num_rows($sel);
		if($row == 1){//Inicia if
			if($var = $sel->fetch_assoc()){//Inicia if
				$nombre = $var['nombre'];
				$contra = $var['contraseña'];
				$matricula = $var['matricula'];
				$colegio = $var['colegio'];
				$telefono = $var['telefono'];
				$direccion = $var['direccion'];
				$nivel = $var['nivel'];
				$foto = $var['foto'];
				$correo = $var['correo'];
			}//Termina if
			
			//Creacion de variables de sesion por nivel
		if($correo == $usuario && $contra == $pass2 && $nivel == 'ADMINISTRADOR' || $correo == $usuario && $contra == $pass2 && $nivel == 'BIBLIOTECARIO'){//Inicia if
			$_SESSION['nombre'] = $nombre;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['colegio'] = $colegio;
			$_SESSION['telefono'] = $telefono;
			$_SESSION['direccion'] = $direccion;
			$_SESSION['correo'] = $correo;
			$_SESSION['nivel'] = $nivel;
			$_SESSION['foto'] = $foto;
			header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
		}//Termina if
		elseif($correo == $usuario && $contra == $pass2 && $nivel == 'ALUMNO' || $correo == $usuario && $contra == $pass2 && $nivel == 'PROFESOR'){//Inicia elseif
			$_SESSION['nombre'] = $nombre;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['colegio'] = $colegio;
			$_SESSION['telefono'] = $telefono;
			$_SESSION['direccion'] = $direccion;
			$_SESSION['correo'] = $correo;
			$_SESSION['nivel'] = $nivel;
			$_SESSION['foto'] = $foto;
			header('location:../extend/alerta.php?msj=Bienvenido&c=homeuser&p=homeuser&t=success');
		}/*Termina elseif*/
		else{//Inicia else
			header('location:../extend/alerta.php?msj=No tiene permiso para entrar&c=salir&p=salir&t=error');
		}//Termina else
			
		}/*Termina if*/else{//Inicia else
			header('location:../extend/alerta.php?msj=Usuario o contraseña incorrectos&c=salir&p=salir&t=error');
		}//Termina else
		
		
	}/*Termina else+*/
	
}/*Termina if*/else{/*Inicia else*/
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
}/*Termina else*/
?>