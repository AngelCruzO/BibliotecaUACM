</main>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="../js/sweetalert2.min.js"></script>
<script src="../js/buscador.js"></script>

<script>
	/*boton menu*/$('.button-collpase').sideNav();
	/*input select*/$('select').material_select();
	

    $('.sidenav').sidenav();
	
	
	function may(obj,id){
		obj = obj.toUpperCase();
		document.getElementById(id).value = obj;
	}
	
</script>