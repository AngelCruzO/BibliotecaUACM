<?php include'../extend/header.php'; ?>


<?php $sel = $con->query("SELECT * FROM prestamos ");					
?>
<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inica card-->
			<div class="card-content"><!--Inicia contenido-->
				<span class="card-title">Prestamos</span>
				
				<table class="striped responsive-table"><!--Inicia tabla-->
					<thead>
						<th>Titulo</th>
						<th>Autor</th>
						<th>Fecha inicial</th>
						<th>Fecha limite</th>
						<th>Estado</th>
					</thead>
					
					<?php while($f = $sel->fetch_assoc()){ 
					if($f['status'] == 'PRESTADO' && $_SESSION['nombre'] == $f['nombre']){
					?>
						<tr>
							<td><?php echo $f['titulo'] ?></td>
							<td><?php echo $f['autor'] ?></td>
							<td><?php echo $f['fecha_inicial'] ?></td>
							<td><?php echo $f['fecha_limite']?></td>
							<td><a href="#" class="btn red white-text"><?php echo $f['status'] ?></a></td>
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