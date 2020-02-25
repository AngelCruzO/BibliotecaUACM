<?php @session_start(); 
if(isset($_SESSION['correo'])){
	header("location:inicio");
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Proyecto</title>
<link rel="stylesheet" href="css/materialize.min.css">
<link rel="stylesheet" href="css/icon.css">
</head>
<body class="grey lighten-2">
<main>
	
	<div class="row"><!--Inicia row-->
		<div class="input-field center col s12 center"><!--Inicio input-field-->
			<img src="images/inicio.jpg" width="200" height="200" class="circle">
		</div><!--Fin input-field-->
	</div><!--Fin row-->
	
	<div class="container"><!--Inicia container-->
		<div class="row"><!--Inicia row-->
			<div class="col s12"><!--Inicia col-->
				<div class="card z-depth-5"><!--Inicia card-->
					<div class="card-content"><!--Inicia contenido-->
						<span class="card-title"><center>Inicio de sesion</center></span>
						
						<form action="login/index.php" method="post" autocomplete="off"><!--Inicia form-->
						
							<div class="input-field"><!--Inicio input-field-->
							<i class="material-icons prefix">perm_identity</i>
								<input type="text" name="usuario" id="usuario" required >
								<label for="usuario">Usuario</label>
							</div><!--Fin input-field-->
							
							<div class="input-field"><!--Inicio input-field-->
							<i class="material-icons prefix">fingerprint</i>
								<input type="password" name="contra" id="contra" required >
								<label for="contra">Contraseña</label>
							</div><!--Fin input-field-->
							
							<div class="input-field center"><!--Inicio input-field-->
								<button type="submit" class="btn waves-effect waves-light">Acceder</button>
							</div><!--Fin input-field-->
							
						</form><!--Fin form-->
					</div><!--Inicia contenido-->
				</div><!--Inicia card-->
			</div><!--Inicia col-->
		</div><!--Inicia row-->
	</div><!--Fin container-->
	
</main>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/materialize.min.js"></script>
</body>
</html>