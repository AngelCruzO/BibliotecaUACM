<?php include '../conexion/conexion.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Sistema Bibliotecario UACM</title>
	<link rel="stylesheet" href="../css/sweetalert2.min.css">
</head>

<body>
	<?php
	/*Variables de php*/
	$mensaje = htmlentities($_GET['msj']);
	$c = htmlentities($_GET['c']);
	$p = htmlentities($_GET['p']);
	$t = htmlentities($_GET['t']);
	
	switch($c){
		case 'us':
			$carpeta = '../usuarios/';
		break;
			
		case 'home':
			$carpeta = '../inicio/';
		break;
		
		case 'homeuser':
			$carpeta = '../inicio/';
		break;

		case 'salir':
			$carpeta = '..';
		break;
			
		case 'pe':
			$carpeta = '../perfil/';
		break;
			
		case 'li':
			$carpeta = '../catalogo/';
		break;
			
		case 'pre':
			$carpeta = '../prestamos/';
		break;
			
		case 'devol':
			$carpeta = '../devoluciones/';
		break;
		

	}
	
	
	switch($p){
		case 'in':
			$pagina = 'index.php';
		break;
			
		case 'home':
			$pagina = 'index.php';
		break;

		case 'homeuser':
			$pagina = 'inicio_user.php';
		break;
			
		case 'salir':
			$pagina = '';
		break;
			
		case 'pe':
			$pagina = 'perfil.php';
		break;
			
		case 'li':
			$pagina = 'index.php';
		break;
		
		case 'pre':
			$pagina = 'index.php';
		break;
		
		case 'devol':
			$pagina = '';
		break;
			
		case 'img':
			$pagina = 'editar_portada.php';
		break;

		case 'sl':
			$pagina = 'slider.php';
		break;
			
	}
	
	if(isset($_GET['id'])){//Inicia if
		$id = htmlentities($_GET['id']);
		$dir = $carpeta.$pagina.'?id='.$id;
	}/*Termina if*/else{//Inicia else
		$dir = $carpeta.$pagina;
	}//Termina else
	
	if($t == "error"){/*Inicia if*/
		$titulo="Oppss...";
	}/*termina if*/else{/*inicia else*/
		$titulo="Buen Trabajo";
	}/*termina else*/
	?>
	
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script>
		swal({
			title:'<?php echo $titulo ?>',
			text:"<?php echo $mensaje ?>",
			type:'<?php echo $t ?>',
			confirmButtonColor:'#3085d6',
			confirmButtonText:'Ok',
		}).then(function(){
			location.href='<?php echo $dir ?>';
		});
		
		$(document).click(function(){
			location.href='<?php echo $dir ?>';
		});
		
		$(document).keyup(function(){
			if(e.which == 27){
				location.href='<?php echo $dir ?>';
			}
		});
	</script>
</body>
</html>