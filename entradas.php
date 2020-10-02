<?php require_once "includes/redireccion.php";?>
<?php require_once "includes/helpers.php";?>
<?php require_once 'includes/cabecera.php';?>

<!-- Caja principal -->
<div class="container my-4">
	<h1 class="font-weight-bold text-center">Todas las entradas</h1>
	<!-- Caja principal -->
	<div class="col-12 z-depth-3 mt-3 px-4 py-3 white order-lg-1 order-2 caja_entradas">
		<?php foreach (consultasTablas('entradas') as $entrada): ?>
			<div class="entrada clearfix">
				<a href="entrada.php?id_entrada=<?=$entrada['id']?>" class="green-text text-uppercase font-weight-bold"><?=$entrada['titulo']?></a>
				<small class="d-block"><?=$entrada['nombre_categoria'] . ' | ' . date('Y/m/d', strtotime($entrada['fecha']));?></small>
				<p class="mt-2 text-justify">
					<?=substr($entrada['descripcion'], 0, 400) . '...'?>
				</p>
				<small class="float-right">Autor(a): <strong><?=$entrada['nombre_autor']?></strong></small>
			</div>
		<?php endforeach?>
	</div>
	<!-- Caja principal -->
</div>


<?php require_once 'includes/footer.php';?>