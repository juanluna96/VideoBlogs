<?php require_once "includes/redireccion.php";?>
<?php require_once "includes/helpers.php";?>
<?php require_once 'includes/cabecera.php';?>

<!-- Caja principal -->
<div class="container my-4">
	<?php if (mysqli_num_rows(consultasTablas('entradas', 'entradas_categorias')) != 0): ?>
		<?php foreach (consultasTablas('categorias', 'categoria_ind') as $categoria): ?>
			<h1 class="font-weight-bold text-center">Entradas de la categoria: <?=$categoria['nombre']?> </h1>
		<?php endforeach?>

		<!-- Caja principal -->
		<div class="col-12 z-depth-3 mt-3 px-4 py-3 white order-lg-1 order-2 caja_entradas">
			<?php foreach (consultasTablas('entradas', 'entradas_categorias') as $entrada): ?>
				<div class="entrada clearfix">
					<a href="entrada.php?id_entrada=<?=$entrada['id']?>" class="green-text text-uppercase font-weight-bold"><?=$entrada['titulo']?></a>
					<small class="d-block"><?=$entrada['nombre_categoria'] . ' | ' . date('Y/m/d', strtotime($entrada['fecha']));?></small>
					<p class="mt-2 text-justify">
						<?=substr($entrada['descripcion'], 0, 400) . '...'?>
					</p>
					<small class="float-right">Autor(a): <strong><?=$entrada['nombre_autor']?></strong></small>
				</div>
				<hr>
			<?php endforeach?>
		</div>
		<!-- Caja principal -->
		<?php else: ?>
			<h1 class="font-weight-bold text-center">No existe ninguna entrada para esta categoria</h1>
		<?php endif?>

	</div>


	<?php require_once 'includes/footer.php';?>