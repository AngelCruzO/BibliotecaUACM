<?php
include '../conexion/conexion.php';
if($_SESSION['nivel'] == 'ADMINISTRADOR' || $_SESSION['nivel'] == 'BIBLIOTECARIO'){
	include '../devoluciones/lista_admin.php';
}else{
	include '../devoluciones/lista_user.php';
}