 <?php require_once "includes/redireccion.php";?>
 <?php require_once "includes/helpers.php";?>
 <?php require_once 'includes/cabecera.php';?>

 <div class="container-fluid mt-4">
     <h1 class="text-center font-weight-bold">Crear entradas</h1>

     <div class="row mt-5 justify-content-center p-2">
         <form method="POST" class="col-12 col-lg-5 p-4 z-depth-2 white" action="crud/guardar/guardar-entradas.php">
            <?=@mostrarError($_SESSION['errores_entrada'], 'titulo')?>
            <div class="md-form input-with-post-icon">
             <i class="fas fa-heading input-prefix"></i>
             <input type="text" id="titulo" name="titulo" class="form-control" required>
             <label for="titulo">Titulo</label>
         </div>
         <?=@mostrarError($_SESSION['errores_entrada'], 'descripcion')?>
         <div class="md-form mb-4">
             <textarea id="descripcion" name="descripcion" class="md-textarea form-control" required></textarea>
             <label for="descripcion">Escribe una pequeña descripcion de la entrada que deseas escribir</label>
         </div>
         <?=@mostrarError($_SESSION['errores_entrada'], 'categoria')?>
         <div class="form-group">
             <select class="custom-select px-0" name="categoria" id="categoria" required>
                 <option selected disabled>-- Seleccione una categoria --</option>
                 <?php foreach (consultasTablas('categorias') as $categoria): ?>
                     <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
                 <?php endforeach?>
             </select>
         </div>
         <input type="hidden" name="autor" value="<?=$_SESSION['usuario']['id']?>">
         <button type="submit" class="btn btn-block btn-indigo">Crear entrada</button>
     </form>
     <?php borrarErrores();?>
 </div>
</div>

<?php require_once 'includes/footer.php';?>