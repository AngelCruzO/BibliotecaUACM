<?php include'../extend/header.php'; 
$sel = $con->prepare("SELECT titulo FROM libros WHERE clasificacion = ? ");
$sel->bind_param('s',$clasificacion);
?>

<div class="row"><!-- Inicia row-->
	<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>MATEMATICAS</b></span>
				<h2 align="center" class="white-text">
					<?php
					$clasificacion = 'MATEMATICAS';
					$sel->execute();
					$res_mat = $sel->get_result();
					echo mysqli_num_rows($res_mat);
					?>
				</h2>
			</div>
		</div>
	</div>
	
	<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>TERROR</b></span>
				<h2 align="center" class="white-text">
					<?php
					$clasificacion = 'TERROR';
					$sel->execute();
					$res_terr = $sel->get_result();
					echo mysqli_num_rows($res_terr);
					?>
				</h2>
			</div>
		</div>
	</div>
	
	<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>GENERAL</b></span>
				<h2 align="center" class="white-text">
					<?php
					$clasificacion = 'GENERAL';
					$sel->execute();
					$res_gen = $sel->get_result();
					echo mysqli_num_rows($res_gen);
					?>
				</h2>
			</div>
		</div>
	</div>
	
		<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>PROGRAMACION</b></span>
				<h2 align="center" class="white-text">
					<?php
					$operacion = 'PROGRAMACION';
					$sel->execute();
					$res_prog = $sel->get_result();
					echo mysqli_num_rows($res_prog);
					?>
				</h2>
			</div>
		</div>
	</div>
<?php include'../extend/scripts.php'; ?>
</body>
</html>