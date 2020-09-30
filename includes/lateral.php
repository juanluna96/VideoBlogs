 <!-- Barra lateral -->

 <div class="col-12 col-lg-4 offset-lg-1  mt-3  order-lg-2 order-1 p-0">

   <!-- Barra de logeado -->
   <?php if (isset($_SESSION['usuario'])): ?>
     <div class="z-depth-2 px-4 py-3 mb-3 white">
       <p class="text-center">Bienvenido</p>
       <p class="text-center">
        <strong><?=$_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']?></strong>
        <small class="d-block">Que te gustaría hacer?</small>
      </p>
      <div class="botones row justify-content-center">
       <a href="logout.php" class="btn col btn-danger">Logout</a>
       <a href="mis-datos.php" class="btn col btn-green">Mis datos</a>
       <a href="crearcategoria.php" class="btn w-100 btn-indigo">Crear categorias</a>
       <a href="crearentradas.php" class="btn w-100 btn-green">Crear entradas</a>
     </div>
   </div>
 <?php endif?>
 <!-- Barra de logeado -->

 <?php if (!isset($_SESSION['usuario'])): ?>
   <!-- Barra de registro y login -->
   <div class="z-depth-2 px-4 py-3 white">
     <h4>Entrar a la web</h4>
     <form method="post" action="login.php">
       <div class="md-form input-with-post-icon">
         <i class="fas fa-user input-prefix"></i>
         <input type="text" id="email" name="email" class="form-control" required>
         <label for="email">Usuario</label>
       </div>
       <div class="md-form input-with-post-icon">
         <i class="fas fa-lock input-prefix"></i>
         <input type="password" id="pass" name="pass" class="form-control" required>
         <label for="pass">Contraseña</label>
       </div>
       <button type="submit" class="btn btn-indigo btn-lg btn-block mt-4 text-white">Enviar</button>
     </form>
     <small>Aun no tienes cuenta? <a class="btn-link green-text" data-toggle="modal"
       data-target="#basicExampleModal">Registrate
     aquí</a></small>

     <!-- Modal del formulario de registro-->
     <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Registrate aquí</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form method="post" action="registro.php">
           <div class="modal-body">
             <?=@mostrarError($_SESSION['errores'], 'nombre')?>
             <div class="md-form">
               <input type="text" id="nombre" name="nombre" class="form-control" required>
               <label for="nombre">Nombre</label>
             </div>

             <?=@mostrarError($_SESSION['errores'], 'apellidos')?>
             <div class="md-form">
               <input type="text" id="apellidos" name="apellidos" class="form-control" required>
               <label for="apellidos">Apellidos</label>
             </div>

             <?=@mostrarError($_SESSION['errores'], 'email')?>
             <div class="md-form">
               <input type="email" id="email" name="email" class="form-control">
               <label for="email">Correo</label>
             </div>

             <?=@mostrarError($_SESSION['errores'], 'password')?>
             <div class="md-form">
               <input type="password" id="password" name="password" class="form-control">
               <label for="password">Contraseña</label>
             </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-outline-danger waves-effect"
             data-dismiss="modal">Cancelar</button>
             <button type="submit" class="btn btn-dark-green" name="submit">Registrarse</button>
             <?php borrarErrores();?>
           </div>
         </form>
       </div>
     </div>
   </div>
   <!-- Modal del formulario de registro-->
 </div>
<?php endif?>
<!-- Barra de registro y login -->
</div>
 <!-- Barra lateral -->