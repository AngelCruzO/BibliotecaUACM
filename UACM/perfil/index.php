<?php include'../extend/header.php'; ?>

<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<h2 class="header">Actualizar foto de perfil</h2>
		<div class="card horizontal"><!--Inicia horizontal-->
			
			<div class="card-image"><!--Inicia image-->
				<img src="../usuarios/<?php echo $_SESSION['foto']; ?>" width="200" height="200">
			</div><!--Termina image-->
			
			<div class="card-stacked"><!--Inicia stacked-->
				<div class="card-content"><!--Inicia content-->
					
					<form action="up_foto.php" method="post" enctype="multipart/form-data"><!--Inicia form-->
						
						<div class="file-field input-field"><!--Incia file,input-->
							
							<div class="btn"><!--Inicia btn-->
								<span>Foto:</span>
								<input type="file" name="foto">
							</div><!--Termina btn-->
							
							<div class="file-path-wrapper"><!--Inicia wrapper-->
								<input class="file-path validate" type="text">
							</div><!--Termina wrapper-->
							
						</div><!--Termina file,input-->
						
						<button type="submit" class="btn black">Actualizar</button>
						
					</form><!--Termina form-->
					
				</div><!--Termina content-->
			</div><!--Termina stacked-->
			
		</div><!--Termina horizontal-->
	</div><!--Termina col-->
</div><!--Termina row-->

<?php include'../extend/scripts.php'; ?>

</body>
</html>