<?php include '../extend/header.php'; ?>

<div class="row"><!--Inicia row-->
		
		<div class="col s12"><!--Inicia col-->
			<h2 class="header">Cargar imagenes para slider</h2>
			<div class="row"><!--Inicia row-->
				<div class="col s12"><!--Inicia col-->
					<div class="card"><!--Inicia card-->
						<div class="card-content"><!--Inicia content-->
							<form action="ins_slider.php" class="form" method="post" enctype="multipart/form-data"><!--Inicia form-->
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<div class="file-field input-field"><!--Inicia file,input -field-->
							<div class="btn"><!--Inicia btn-->
							<span>Imagen:</span>
							<input type="file" name="ruta[]" multiple>
							</div><!--Fin btn-->
							<div class="file-path-wrapper"><!--Inicia file-path-wrapper-->
							<input class="file-path validate" type="text">
							</div><!--Fin file-path-wrapper-->
							</div><!--Fin file,input -field-->
								<button type="submit" class="btn black">Guardar</button>
							</form><!--Fin form-->
						</div><!--Fin content-->
					</div><!--Fin card-->
				</div><!--Fin col-->
			</div><!--Fin row-->
		</div><!--Fin col-->
</div><!--Fin row-->

<div class="row cargador"><!--Inicia row-->
	<div class="col s12 center"><!--Inicia col-->
	
		<div class="preloader-wrapper big active"><!--Inicia preloader-->
			<div class="spinner-layer spinner-blue-only"><!--Inicia spinner-->
				<div class="circle-clipper left"><!--Inicia clipper left-->
					<div class="circle"></div>
				</div><!--Fin clipper left--> <div class="gap-patch"><!--Inicia gap-->
					<div class="circle"></div>
				</div><!--Fin gap--> <div class="circle-clipper right"><!--Inicia clipper right-->
					<div class="circle"></div>
				</div><!--Fin clipper right-->
			</div><!--Fin spinner-->
		</div><!--Fin preloader-->
		
	</div><!--Fin col-->
</div><!--Fin row-->

<div class="row"><!--Inicia row-->
	<div class="col s12"><!--Inicia col-->
		<div class="card"><!--Inicia card-->
			<div class="card-content"><!--Inicia content-->
				<?php 
				$sel_img = $con->prepare("SELECT * FROM slider");
				$sel_img->execute();
				$res_img = $sel_img->get_result();
				
					 while($f_img = $res_img->fetch_assoc()){/*Inicia while*/ ?>
					
						<a href="#" onClick="swal({ title: 'Estas seguro que desea eliminar la imagen?', text: 'Al eliminarla no podra recuperarla!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarla', }).then(function(){ location.href='eliminar_slider.php?id=<?php echo $f_img['id'] ?>&ruta=<?php echo $f_img['ruta'] ?>'; })"><img src="<?php echo $f_img['ruta'] ?>"></a>
				<?php 
				 }/*Fin while*/
					 $sel_img->close();
					 $con->close();
				?>
			</div><!--Fin content-->
		</div><!--Fin card-->
	</div><!--Fin col-->
</div><!--Fin row-->


<?php include'../extend/scripts.php'; ?>
<script>
	$('.cargador').hide();
	$('.form').submit(function(event){
		$('.cargador').show();
	});
</script>

</body>
</html>