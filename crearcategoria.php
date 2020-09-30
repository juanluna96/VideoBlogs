 <?php require_once "includes/redireccion.php";?>
 <?php require_once "includes/helpers.php";?>
 <?php require_once 'includes/cabecera.php';?>

 <div class="container-fluid mt-4">
 	<h1 class="text-center font-weight-bold">Crear categorías</h1>

 	<div class="row mt-5 justify-content-center p-2">
 		<form method="POST" class="col-12 col-lg-5 p-4 z-depth-2 white" action="crud/guardar/guardar-categoria.php">
 			<div class="md-form input-with-post-icon">
 				<i class="fas fa-tags input-prefix"></i>
 				<input type="text" id="nombre_categoria" name="nombre_categoria" class="form-control">
 				<label for="nombre_categoria">Nombre de la categoría</label>
 			</div>
 			<button type="submit" class="btn btn-block btn-indigo">Crear categoria</button>
 		</form>
 	</div>
 </div>

 <?php require_once 'includes/footer.php';?>