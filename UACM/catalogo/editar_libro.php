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
        <span class="card-title">Editar de clientes</span>
        <form class="form" action="up_libro.php" method="post" autocomplete=off ><!--Inicia form-->
         			<input type="hidden" name="id" value="<?php echo $id ?>">	
						
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="titulo" required autofocus title="Titulo del libro" id="libro" onblur="may(this.value, this.id)" value="<?php echo $f['titulo'] ?>">
								<label for="titulo">Titulo:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="autor" required title="Nombre del autor" id="autor" onblur="may(this.value, this.id)" pattern="[A-Z/s ]+" value="<?php echo $f['autor'] ?>">
								<label for="autor">Nombre del Autor:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
			
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="edicion" title="Numero de edicion"  id="edicion" value="<?php echo $f['edicion'] ?>">
								<label for="edicion"> Numero de edicion:</label>
						</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="tomo" title="Numero del Tomo/Volumen" id="tomo" value="<?php echo $f['tomo'] ?>">
								<label for="tomo">Tomo/Volumen:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
			
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="editorial" title="Nombre de la editorial" id="editorial" onblur="may(this.value, this.id)" required pattern="[A-Z/s ]+" value="<?php echo $f['editorial'] ?>">
								<label for="editorial">Nombre de la editorial:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="pais" title="Pais de origen" id="pais" onblur="may(this.value, this.id)" required value="<?php echo $f['pais'] ?>">
								<label for="pais">Pais:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
			
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="ano" title="Año de impresion, formato 4 digitos" id="ano" required pattern="[0-9]{4}" value="<?php echo $f['ano'] ?>">
								<label for="ano">Año de impresion:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="isbn" title="Codigo ISBN, de 10 a 13 digitos separados o no por un -" id="isbn" value="<?php echo $f['isbn'] ?>">
								<label for="isbn">Codigo ISBN:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
			
					<div class="row"><!--Inicia row-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="clasificacion" title="Clasificacion a la que pertenece" id="clasificacion" onblur="may(this.value, this.id)" required value="<?php echo $f['clasificacion'] ?>">
								<label for="clasificacion">Clasificacion:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
						<div class="col s6"><!--Inicia col-->
							<div class="input-field"><!--Inicio input-field-->
								<input type="text" name="ejemplares" title="Numero de ejemplares" id="ejemplares" required value="<?php echo $f['ejemplares'] ?>">
								<label for="ejemplares">Numero de ejemplares:</label>
							</div><!--Fin input-field-->
						</div><!--Termina col-->
						
					</div><!--Termina row-->
		
			  
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