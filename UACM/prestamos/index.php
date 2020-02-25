<?php
include '../conexion/conexion.php';
if($_SESSION['nivel'] == 'ADMINISTRADOR' || $_SESSION['nivel'] == 'BIBLIOTECARIO'){
	include '../prestamos/lista_admin.php';
}else{
	include '../prestamos/lista_user.php';
}