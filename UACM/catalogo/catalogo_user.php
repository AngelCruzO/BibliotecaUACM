<?php include '../extend/header.php'; ?>
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


<?php $sel = $con->query("SELECT * FROM libros ");
$row = mysqli_num_rows($sel);	
?>
<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inica card-->
			<div class="card-content"><!--Inicia contenido-->
				<span class="card-title">Libros (<?php echo $row ?>)</span>
				
				<table class="responsive-table striped"><!--Inicia tabla-->
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
						<th>Disponibles</th>
						<th>Portada</th>
						<th>Prestar</th>
					</thead>
					
					<?php while($f = $sel->fetch_assoc()){ 
					?>
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
							<td><?php $sel_pres = $con->query("SELECT SUM(ejemplar) as total FROM prestamos WHERE status='PRESTADO'");
							$nuevo_ejemplar == $sel_pres->fetch_assoc();
							
							$total = $f['ejemplares']-$nuevo_ejemplar['total'];
								if($total == 0){
									echo '<span class="red-text">No disponible</span>';
								}else{
							echo $total; }?></td>
							<td><img src="<?php echo $f['portada'] ?>" width="70" height="100"></td>
							<td><a href="../prestamos/prestamos.php?id=<?php echo $f['id'] ?>" class="btn-floating red"><i class="material-icons">archive</i></a></td>
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