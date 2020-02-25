<?php 
include'../extend/header.php'; 
?>

<div class="slider"><!--Inicia slider-->
	<ul class="slides"><!--Inicia ul-->
	<?php 
	$sel = $con->prepare("SELECT * FROM slider");
	$sel->execute();
	$res = $sel->get_result();
		while($f = $res->fetch_assoc()){
	?>
		<li><!--Inicia li-->
			<img src="../inicio/<?php echo $f['ruta'] ?>">
			<div class="caption right-align"><!--Inicia caption-->
				<h3>Empresa</h3>
				<h5 class="light grey-text text-lighten-3">Slogan de la empresa</h5>
			</div><!--Fin caption-->
		</li><!--Fin li-->
		<?php } 
		$sel->close();
		?>
	</ul><!--Fin ul-->
</div><!--Fin slider-->



<?php include'../extend/scripts.php'; ?>
<!--Las funciones de materialize van despues de la llamada de scripts.php-->
<script>
	$('.slider').slider();
</script>
</body>
</html>
