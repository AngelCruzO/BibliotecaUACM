<?php
include '../extend/header.php';
$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT * FROM libros WHERE id = ? ");
$sel->bind_param('i',$id);
$sel->execute();
$res = $sel->get_result();

if($f = $res->fetch_assoc()){
	
}
?>


<div class="row"><!--Inicia row-->
  <div class="col s12"><!--Inicia col-->
    <div class="card"><!--Inicia card-->
      <div class="card-content"><!--Inicia content-->
        <span class="card-title">Realizar prestamo</span>
        <form class="form" action="ins_prestamo.php" method="post" autocomplete=off ><!--Inicia form-->
					<input type="hidden" name="status" value="PRESTADO">
					<input type="hidden" name="id" value="<?php $f['id'] ?>">
			
          			<div class="input-field"><!--Inicio input-field-->
						<input type="text" name="titulo" required autofocus title="Titulo del libro" id="libro" onblur="may(this.value, this.id)" value="<?php echo $f['titulo'] ?>">
						<label for="titulo">Titulo:</label>
					</div><!--Fin input-field-->
					
					<div class="input-field"><!--Inicio input-field-->
						<input type="text" name="autor" required title="Nombre del autor" id="autor" onblur="may(this.value, this.id)" pattern="[A-Z/s ]+" value="<?php echo $f['autor'] ?>">
						<label for="autor">Nombre del Autor:</label>
					</div><!--Fin input-field-->
					
			<?php if($_SESSION['nivel'] == 'ADMINISTRADOR' || $_SESSION['nivel'] == 'BIBLIOTECARIO'):?>
			
					<select class="" name="nombre" required>
               		<option value="" disabled selected>Escoge un nombre</option>
               		<?php $sel_us = $con->prepare("SELECT nombre FROM usuarios WHERE bloqueo= 1 ");
				  	$sel_us->execute();
				  	$res_us = $sel_us->get_result();
				  
				  	while($f_us =$res_us->fetch_assoc()){ 
				  		if($f_us['nombre'] != 'ADMINISTRADOR' && $f_us['nombre'] != 'BIBLIOTECARIO'){?>
						<option value="<?php echo $f_us['nombre'] ?>"><?php echo $f_us['nombre'] ?></option>
					<?php } }
				  	$sel_us->close();
				  	?>
              </select>
			<?php else: ?>
					<div class="input-field"><!--Inicio input-field-->
						<input type="text" name="nombre" title="Nombre de usuario"  id="nombre" value="<?php echo $_SESSION['nombre'] ?>">
						<label for="nombre"> Nombre de usuario:</label>
					</div><!--Fin input-field-->
			<?php endif; ?>
			
          <button type="submit" class="btn" >Guardar</button>
        </form><!--Fin form-->
      </div><!--Fin content-->
    </div><!--Fin card-->
  </div><!--Fin col-->
</div><!--Fin row-->

<?php 
$sel->close();
$con->close();
include'../extend/scripts.php'; ?>

</body>
</html>