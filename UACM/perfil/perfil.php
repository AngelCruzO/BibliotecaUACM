<?php include'../extend/header.php'; ?>

<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inicia card-->
			<div class="card-content"><!--Inicia content-->
				<h1>Editar pefil</h1>
			</div><!--Fin content-->
			
			<div class="card-tabs"><!--Inicia tabs-->
				<ul class="tabs tabs-fixed-width"><!--Inicia ul-->
					<li class="tab"><a href="#datos" class='active'>Datos</a></li>
					<li class="tab"><a href="#pass" class='active'>Contraseña</a></li>
				</ul><!--Fin ul-->
			</div><!--Fin tabs-->
			
			<div class="card-content grey lighten-4"><!--Inicia content-->
				<div id="datos"><!--Inicia datos-->
					<form class="form" action="up_perfil.php" method="post"><!--Inicio form-->
					
					<div class="input-field"><!--Inicio input-field-->
						<input type="text" name="telefono" title="Telefono del usuario" id="telefono" required pattern="[0-9]{8,10}" value="<?php echo $_SESSION['telefono'] ?>">
						<label for="telefono">Telefono:</label>
					</div><!--Fin input-field-->
					
					<div class="input-field"><!--Inicio input-field-->
						<input type="email" name="correo" title="Correo electronico" id="correo" value="<?php echo $_SESSION['correo'] ?>">
						<label for="correo">Correo electronico:</label>
					</div><!--Fin input-field-->
						
					<div class="input-field"><!--Inicio input-field-->
						<input type="text" name="direccion" title="Direccion del usuario" id="direccion" value="<?php echo $_SESSION['direccion'] ?>">
						<label for="direccion">Direccion:</label>
					</div><!--Fin input-field-->
					
					<button type="submit" class="btn black">Editar<i class="material-icons">send</i></button>
				</form><!--Fin form-->
				</div><!--Fin datos-->
				
				<div id="pass"><!--Inicia pass-->
				<form class="form" action="up_pass.php" method="post" enctype="multipart/form-data"><!--Inicio form-->
					
					<div class="input-field"><!--Inicio input-field-->
						<input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS,LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
						<label for="pass1">Contraseña:</label>
					</div><!--Fin input-field-->
					
					<div class="input-field"><!--Inicio input-field-->
						<input type="password" title="CONTRASEÑA CON NUMEROS,LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" required >
						<label for="pass2"> Verificar contraseña:</label>
					</div><!--Fin input-field-->
	
					<button type="submit" class="btn black" id="btn_guardar">Editar<i class="material-icons">send</i></button>
				</form><!--Fin form-->
				</div><!--Fin pass-->
				
			</div><!--Fin content-->
			
		</div><!--Fin card-->
	</div><!--Fin col-->
</div><!--Fin row-->

<?php include'../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>

</body>
</html>
