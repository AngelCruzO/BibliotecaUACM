<?php include'../extend/header.php'; 
//include'../extend/permiso.php'; ?>

<div class="row"><!--Inicio row-->
	<div class="col s12"><!--Inico col-->
		<div class="card"><!--Inicio Card-->
			<div class="card-content"><!--Inicio contenido-->
				<span class="card-title">Alta de libros</span>
				<form class="form" action="ins_libros.php" method="post" enctype="multipart/form-data"><!--Inicio form-->
					
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="titulo" required autofocus title="Titulo del libro" id="libro" onblur="may(this.value, this.id)">
								<label for="titulo">Titulo:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="autor" required title="Nombre del autor" id="autor" onblur="may(this.value, this.id)" pattern="[A-Z/s ]+">
								<label for="autor">Nombre del Autor:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
					
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="edicion" title="Numero de edicion"  id="edicion" >
								<label for="edicion"> Numero de edicion:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="tomo" title="Numero del Tomo/Volumen" id="tomo">
								<label for="tomo">Tomo/Volumen:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
					
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="editorial" title="Nombre de la editorial" id="editorial" onblur="may(this.value, this.id)" required pattern="[A-Z/s ]+">
								<label for="editorial">Nombre de la editorial:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="pais" title="Pais de origen" id="pais" onblur="may(this.value, this.id)" required>
								<label for="pais">Pais:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
					
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="ano" title="Año de impresion, formato 4 digitos" id="ano" required pattern="[0-9]{4}">
								<label for="ano">Año de impresion:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="isbn" title="Codigo ISBN, de 10 a 13 digitos separados o no por un -" id="isbn">
								<label for="isbn">Codigo ISBN:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
					
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="clasificacion" title="Clasificacion a la que pertenece" id="clasificacion" onblur="may(this.value, this.id)" required>
								<label for="clasificacion">Clasificacion:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="ejemplares" title="Numero de ejemplares" id="ejemplares" required>
								<label for="ejemplares">Numero de ejemplares:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
	
					<div class="file-field input-field"><!--Inicia file,input -field-->
						<div class="btn"><!--Inicia btn-->
							<span>Portada:</span>
							<input type="file" name="portada">
						</div><!--Fin btn-->
						<div class="file-path-wrapper"><!--Inicia file-path-wrapper-->
							<input class="file-path validate" type="text">
						</div><!--Fin file-path-wrapper-->
					</div><!--Fin file,input -field-->
					
					<button type="submit" class="btn black" id="btn_guardar1">Guardar <i class="material-icons">send</i></button>
				</form><!--Fin form-->
			</div><!--Fin contenido-->
		</div><!--Fin card-->
	</div><!--Fin col-->
</div><!--Fin row-->

<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<nav class="brown lighten-3"><!--Inicia nav-->
			<div class="nav-wrapper"><!--Inicia nav-wrapper-->
				<div class="input-field"><!--Inicio input-field-->
					<input type="search" id="buscar" autocomplete="off">
					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div><!--Fin input-field-->
			</div><!--Fin nav-wrapper-->
		</nav><!--Fin nav-->
	</div><!--Fin col-->
</div><!--Fin row-->


<?php $sel = $con->query("SELECT * FROM libros ");
$row = mysqli_num_rows($sel);					
?>
<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inica card-->
			<div class="card-content"><!--Inicia contenido-->
				<span class="card-title">Libros (<?php echo $row ?>)</span>
				
				<table class="responsive-table"><!--Inicia tabla-->
					<thead>
						<th>Titulo</th>
						<th>Autor</th>
						<th>Edicion</th>
						<th>Tomo/Volumen</th>
						<th>Editorial</th>
						<th>Pais</th>
						<th>Año</th>
						<th>ISBN</th>
						<th>Clasificacion</th>
						<th>No. de Ejemplares</th>
						<th>Portada</th>
						<th>Actualizar</th>
						<th>Eliminar</th>
						<th>Disponibles</th>
						<th>Prestar</th>
						<th></th>
					</thead>
					
					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $f['titulo'] ?></td>
							<td><?php echo $f['autor'] ?></td>
							<td><?php echo $f['edicion'] ?></td>
							<td><?php echo $f['tomo'] ?></td>
							<td><?php echo $f['editorial'] ?></td>
							<td><?php echo $f['pais'] ?></td>
							<td><?php echo $f['ano'] ?></td>
							<td><?php echo $f['isbn'] ?></td>
							<td><?php echo $f['clasificacion'] ?></td>
							<td><?php echo $f['ejemplares'] ?></td>
							<td><a href="../catalogo/editar_portada.php?id=<?php echo $f['id'] ?>"><img src="<?php echo $f['portada'] ?>" width="70" height="100"></a></td>
							<td><a href="editar_libro.php?id=<?php echo $f['id'] ?>" class="btn-floating blue"><i class="material-icons">loop</i></a></td>
							<td><a href="#" class="btn-floating red" onClick="swal({ title: 'Esta seguro que desea eliminar el libro?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo', }).then(function(){ location.href='eliminar_libro.php?id=<?php echo $f['id'] ?>'; })"><i class="material-icons">clear</i></a></td>
							<td><?php $sel_pres = $con->query("SELECT SUM(ejemplar) as total FROM prestamos WHERE status='PRESTADO'");
							$nuevo_ejemplar = $sel_pres->fetch_assoc();
							
							$total = $f['ejemplares']-$nuevo_ejemplar['total'];
								if($total == 0){
									echo '<span class="red-text">No disponible</span>';
								}else{
							echo $total; }?></td>
							<td><a href="../prestamos/prestamos.php?id=<?php echo $f['id'] ?>" class="btn-floating brown"><i class="material-icons">archive</i></a></td>

						</tr>
						<?php } ?>
						
				</table><!--Fin tabla-->
				
			</div><!--Fin contenido-->
		</div><!--Fin card-->
	</div><!--Fin col-->
</div><!--Fin row-->

<?php include'../extend/scripts.php'; ?>

<script src="../js/validacion.js"></script>
</body>
</html>