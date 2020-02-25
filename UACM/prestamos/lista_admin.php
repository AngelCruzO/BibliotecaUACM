<?php include'../extend/header.php'; ?>

<br>
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

<?php $sel = $con->query("SELECT * FROM prestamos ");					
?>
<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inica card-->
			<div class="card-content"><!--Inicia contenido-->
				<span class="card-title">Prestamos</span>
				
				<table class="striped responsive-table"><!--Inicia tabla-->
					<thead>
						<th>Nombre Usuario</th>
						<th>Titulo</th>
						<th>Autor</th>
						<th>Fecha inicial</th>
						<th>Fecha limite</th>
						<th>Devolver</th>
					</thead>
					
					<?php while($f = $sel->fetch_assoc()){ 
					if($f['status'] == 'PRESTADO'){
					?>
						<tr>
							<td><?php echo $f['nombre'] ?></td>
							<td><?php echo $f['titulo'] ?></td>
							<td><?php echo $f['autor'] ?></td>
							<td><?php echo $f['fecha_inicial'] ?></td>
							<td><?php echo $f['fecha_limite']?></td>
							<td><a href="../devoluciones/up_devol.php?id=<?php echo $f['id'] ?>" class="btn-floating brown"><i class="material-icons">unarchive</i></a></td>

						</tr>
						<?php } }?>
					
				</table><!--Fin tabla-->
				
			</div><!--Fin contenido-->
		</div><!--Fin card-->
	</div><!--Fin col-->
</div><!--Fin row-->

<?php include'../extend/scripts.php'; ?>

<script src="../js/validacion.js"></script>
</body>
</html>
