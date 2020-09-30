 <?php require_once "includes/redireccion.php";?>
 <?php require_once "includes/helpers.php";?>
 <?php require_once 'includes/cabecera.php';?>

 <!-- Caja principal -->
 <div class="container mt-4">
 	<h1 class="font-weight-bold text-center">Mis datos</h1>
 	<form method="post" action="crud/actualizar/actualizar-usuario.php">
 		<?php foreach (consultasTablas('usuarios', 'mis_datos') as $datos_usuario):
?>
 			<?=@mostrarError($_SESSION['errores'], 'nombre')?>
 			<div class="md-form">
 				<input type="text" id="nombre" value="<?=$datos_usuario['nombre']?>" name="nombre" class="form-control" required>
 				<label for="nombre">Nombre</label>
 			</div>

 			<?=@mostrarError($_SESSION['errores'], 'apellidos')?>
 			<div class="md-form">
 				<input type="text" id="apellidos" name="apellidos" class="form-control" value="<?=$datos_usuario['apellidos']?>"required>
 				<label for="apellidos">Apellidos</label>
 			</div>

 			<?=@mostrarError($_SESSION['errores'], 'email')?>
 			<div class="md-form">
 				<input type="email" value="<?=$datos_usuario['email']?>" id="email" name="email" class="form-control">
 				<label for="email">Correo</label>
 			</div>
 		<?php endforeach?>
 		<button type="submit" class="btn btn-block btn-indigo" name="submit">Actualizar datos</button>
 		<?php borrarErrores();?>

 	</form>
 </div>


 <?php require_once 'includes/footer.php';?>