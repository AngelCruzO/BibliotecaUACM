<?php
include'../conexion/conexion.php';
if(!isset($_SESSION['correo'])){
	header('location:../');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link rel="stylesheet" href="../css/icon.css">
	<link rel="stylesheet" href="../css/sweetalert2.min.css">
<title>Sistema Bibliotecario UACM</title>
</head>

<body class="grey lighten-3">
	<main>
		<?php
		if($_SESSION['nivel'] == 'ADMINISTRADOR' || $_SESSION['nivel'] == 'BIBLIOTECARIO'){
			include '../extend/menu_admin.php';
		}else{
			include '../extend/menu_usuarios.php';
		}
		?>
	
	
