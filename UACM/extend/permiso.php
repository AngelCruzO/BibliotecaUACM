<?php
if($_SESSION['nivel'] != 'ADMINISTRADOR' && $_SESSION['nivel'] != 'BIBLIOTECARIO'){
	header("location:bloqueo.php");
}
?>