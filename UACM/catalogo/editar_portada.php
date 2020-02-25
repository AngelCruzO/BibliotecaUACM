<?php include '../extend/header.php'; 
$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT portada, titulo FROM libros WHERE id = ? ");
$sel->bind_param('i',$id);
$sel->execute();
$res = $sel->get_result();

if($f = $res->fetch_assoc()){
	$foto = $f['portada'];
	$titulo = $f['titulo'];
}
$sel->close();
?>

<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col1-->
		<h2 class="header">Actualizar portada libro</h2>
			<div class="card horizontal"><!--Inicia horizontal-->
				<div class="card-image"><!--Inicia image-->
				<img src="<?php echo $foto ?>" width="200" height="200">
				</div><!--Fin image-->
				<div class="card-stacked"><!--Inicia stacked-->
					<div class="card-content"><!--Inicia content-->
					<form action="up_portada.php" class="form" method="post" enctype="multipart/form-data"><!--Inicia form-->
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<input type="hidden" name="anterior" value="<?php echo $foto ?>">
						<input type="hidden" name="titulo" value="<?php echo $titulo ?>">
						<div class="file-field input-field"><!--Inicia file,input -field-->
						<div class="btn"><!--Inicia btn-->
							<span>Portada:</span>
							<input type="file" name="foto">
						</div><!--Fin btn-->
						<div class="file-path-wrapper"><!--Inicia file-path-wrapper-->
							<input class="file-path validate" type="text">
						</div><!--Fin file-path-wrapper-->
					</div><!--Fin file,input -field-->
						<button type="submit" class="btn black">Actualizar</button>
					</form><!--Fin form-->
					</div><!--Fin content-->
				</div><!--Fin stacked-->
			</div><!--Fin horizontal-->
		</div><!--Fin col1-->
</div><!--Termina row-->
	<?php include'../extend/scripts.php'; ?>

</body>
</html>