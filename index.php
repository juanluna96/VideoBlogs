 <?php require_once "includes/helpers.php";?>
 <?php require_once 'includes/cabecera.php';?>

 <!-- Contenido principal -->
 <div class="container-fluid my-3">

    <div class="row container-fluid mx-0">
        <!-- Mostrar alertas -->
        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="col-12 alert alert-danger" role="alert">
                <p class="m-0"><?=$_SESSION['error_login']?></p>
            </div>
        <?php endif?>

        <?php if (isset($_SESSION['completado'])): ?>
            <div class="col-12 alert alert-success" role="alert">
                <?php echo @$_SESSION['completado']; ?>
            </div>
            <?php elseif (isset($_SESSION['errores']['general'])): ?>
                <div class="col-12 alert alert-danger" role="alert">
                    <p class="m-0"><?php echo $_SESSION['errores']['general'] . ","; ?>
                    <a class="btn-link red-text" data-toggle="modal" data-target="#basicExampleModal">
                        <strong>Intentalo de nuevo</strong>
                    </a>
                </p>
            </div>
        <?php endif?>
        <!-- Caja principal -->
        <div class="col-12 col-lg-7 z-depth-3 mt-3 px-4 py-3 white order-lg-1 order-2">
            <h3 class="mb-4">Ultimas entradas</h3>
            <?php foreach (consultasTablas('entradas', 'ultimas_4') as $entrada): ?>
                <div class="entrada clearfix">
                    <a href="entrada.php?id_entrada=<?=$entrada['id']?>" class="green-text text-uppercase font-weight-bold"><?=$entrada['titulo']?></a>
                    <small class="d-block"><?=$entrada['nombre_categoria'] . ' | ' . date('Y/m/d', strtotime($entrada['fecha']));?></small>
                    <p class="mt-2 text-justify">
                        <?=substr($entrada['descripcion'], 0, 400) . '...'?>
                    </p>
                    <small class="float-right">Autor(a): <strong><?=$entrada['nombre_autor']?></strong></small>
                </div>
            <?php endforeach?>

            <div class="ver-todas mt-3">
                <a href="entradas.php" type="button" class="btn btn-indigo btn-lg btn-block">Ver todas las
                entradas</a>
            </div>
        </div>
        <!-- Caja principal -->

        <?php require_once 'includes/lateral.php';?>
    </div>
</div>
<!-- Contenido principal -->

<?php require_once 'includes/footer.php';?>