<?php include '../extend/header.php';
//include '../extend/permiso.php'; ?>

<div class="row"><!--Inicio row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inicia card-->
			<div class="card-content"><!--Inicia contenido-->
				<span class="card-title">Alta de usuarios</span>
				
				<form action="ins_usuarios.php" class="form" method="post" enctype="multipart/form-data"><!--Inicia form-->
					
					<div class="input-field">
						<input type="text" name="nombre" required autofocus title="Escribe el nombre" pattern="[A-Z/s ]+" id="nombre" onblur="may(this.value, this.id)">
						<label for="nombre">Nombre:</label>
						</input>
					</div>
				
					<div class="input-field">
						<input type="text" name="matricula" title="Ingresa la matricula" id="matricula">
						<label for="matricula">Matricula:</label>
						</input>
					</div>
			
					<select name="colegio" required>
						<option value="" disabled selected>Elige una opción</option>
						<option value="NINGUNO">NINGUNO</option>
						<option value="CCYT">CCyT</option>
						<option value="CCH">CCH</option>
						<option	value="CCS">CCS</option>
					</select>
	
		
					<div class="input-field">
						<input type="text" name="telefono" required  title="Debe contener 10 digitos"  id="telefono" pattern="[0-9]{8,10}">
						<label for="telefono">Telefono:</label>
						</input>
					</div>
	
	
					<div class="input-field">
						<input type="text" name="direccion" required  title="Ingrese la dirección" id="direccion">
						<label for="direccion">Dirección:</label>
						</input>
					</div>


					<div class="input-field">
						<input type="email" name="correo" required  title="Correo electronico" id="correo">
						<label for="correo">Correo electronico:</label>
						</input>
					</div>

                    <div class="validacion" ></div>

					<select name="nivel" required>
						<option value="" disabled selected>Elige una opción</option>
						<option value="ALUMNO">ALUMNO</option>
						<option value="PROFESOR">PROFESOR</option>
						<option	value="ADMINISTRADOR">ADMINISTRADOR</option>
						<option value="BIBLIOTECARIO">BIBLIOTECARIO</option>
					</select>
					

					<button type="submit" class="btn black" id="btn_guardar1">Guardar  <i class="material-icons">send</i></button>
				</form><!--Termina form-->
				
			</div><!--Termina contenido-->
		</div><!--Termina card-->
	</div><!--Termina col-->
</div><!--Termina row-->


<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<nav class="brown lighten-3"><!--Inicia nav-->
			<div class="nav-wrapper"><!--Inicia Wrapper-->
				<div class="input-field"><!--Inicia input-field-->
					<input type="search" id="buscar" autocomplete="off">
					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div><!--Termina input-field-->
			</div><!--Termina wrapper-->
		</nav><!--Termina nav-->
	</div><!--Termina col-->
</div><!--Termina row-->

<?php $sel = $con->query("SELECT * FROM usuarios ");
$row = mysqli_num_rows($sel);
?>

<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inicia card-->
			<div class="card-content"><!--Inicia content-->
				<span class="card-title">Usuarios (<?php echo $row ?>)</span>
				
				<table class="responsive-table"><!--Inicia table-->
					<thead><!--Inician theah-->
						<th>Nombre</th>
						<th>Matricula</th>
						<th>Colegio</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Correo</th>
						<th>Nivel</th>
						<th></th>
						<th>Foto</th>
						<th>Bloqueo</th>
						<th>Eliminar</th>
					</thead><!--Termina thead-->
					
					<?php while($f = $sel->fetch_assoc()){ ?><!--Inicia while consulta-->
						<tr>
							<td><?php echo $f['nombre'] ?></td>
							<td><?php echo $f['matricula'] ?></td>
							<td><?php echo $f['colegio'] ?></td>
							<td><?php echo $f['telefono'] ?></td>
							<td><?php echo $f['direccion'] ?></td>
							<td><?php echo $f['correo'] ?></td>
							<td>
								<form action="up_nivel.php" method="post"><!--Inicia form nivel-->
									<input type="hidden" value="<?php echo $f['id'] ?>" name="id">
									<select name="nivel">
										<option value=""><?php echo $f['nivel'] ?></option>
										<option value="ALUMNO">ALUMNO</option>
										<option value="PROFESOR">PROFESOR</option>
										<option value="ADMINISTRADOR">ADMINISTRADOR</option>
										<option value="BIBLIOTECARIO">BIBLIOTECARIO</option>

									</select>
							</td>
							<td>
								<button type="submit" class="btn-floating black"><i class="material-icons">repeat</i></button>
								</form><!--Termian form nivel-->
							</td>
							<td><img src="<?php echo $f['foto'] ?>" width="50" class="circle"></td>
							<td>
							<?php if($f['bloqueo'] == 1): ?>
								<a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a>
							<?php else: ?>
								<a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a>
							<?php endif; ?>
							</td>
							<td><a href="#" class="btn-floating red" onClick="swal({ title: 'Esta seguro que desea eliminar el usuario?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo', }).then(function(){ location.href='eliminar_usuario.php?id=<?php echo $f['id'] ?>'; })"><i class="material-icons">clear</i></a></td>
						</tr>
					<?php } ?><!--Termina while consulta-->
					
				</table><!--Termina table-->
				
			</div><!--Termina content-->
		</div><!--Termina card-->
	</div><!--Termina col-->
</div><!--Termina row-->

<?php include'../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>