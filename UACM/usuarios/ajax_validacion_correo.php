<?php
include '../conexion/conexion.php';

$correo = $con->real_escape_string($_POST['correo']);

$sel = $con->query("SELECT id FROM usuarios WHERE correo = '$correo' ");
$row = mysqli_num_rows($sel);
if($row != 0){
	echo "<label style='color:red;'>El correo del usuario ya existe</label>";
}else{
	echo "<label style='color:green;'>El correo del usuario esta disponible</label>";
}

$con->close(); ?>