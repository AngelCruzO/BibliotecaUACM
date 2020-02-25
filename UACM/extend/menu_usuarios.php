<nav class="black">
	<!--Boton responsivo-->
	<a href="" data-activates="menu" class="button-collpase"><i class="material-icons">menu</i></a>
</nav>

<ul id="menu" class="side-nav fixed blue-grey darken-4"><!--Inicia ul-->
	<li><!--Inicia 1er li-->
		<div class="userView"><!-- inicia Userview-->
			<div class="background">
			<img src="../images/fondo.jpg" width="100%" height="100%" alt="">
			</div>
		
		<!--Datos perfil-->
		<a href="../perfil/index.php"><img src="../usuarios/<?php echo $_SESSION['foto']; ?>" alt="" class="circle"></a>
		<a href="../perfil/perfil.php" class="white-text"><?php echo $_SESSION['nombre']; ?></a>
		<a href="" class="white-text"><?php echo $_SESSION['correo']; ?></a>
		</div><!--termina userview-->
	</li><!--Termina 1er li-->

	
	<li><a href="../inicio/inicio_user.php" class="white-text"><i class="material-icons white-text">home</i>Inicio</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../catalogo/catalogo_user.php" class="white-text"><i class="material-icons white-text">book</i>Catalogo</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../prestamos" class="white-text"><i class="material-icons white-text">archive</i>Prestamos</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../devoluciones" class="white-text"><i class="material-icons white-text">unarchive</i>Devoluciones</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../login/salir.php" class="white-text"><i class="material-icons white-text">power_settings_new</i>Salir</a></li>
	<li><div class="divider"></div></li>
</ul><!--Termina Ul-->
