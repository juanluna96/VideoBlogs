<?php
// Conexion a la base de datos
require_once "../../includes/conexion.php";

if (isset($_POST)) {

    // Recoger los valores del formulario de actualizacion
    $nombre    = isset($_POST['nombre']) ? mysqli_real_escape_string($mysqli, $_POST["nombre"]) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($mysqli, $_POST["apellidos"]) : false;
    $email     = isset($_POST['email']) ? mysqli_real_escape_string($mysqli, $_POST["email"]) : false;

// Array de errores
    $errores = [];

    // Validar los datos antes de guardarlos en las bases de datos
    // Validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado    = false;
        $errores['nombre']  = 'El nombre no es valido';
        $errores['general'] = "Fallo al actualizar al usuario";
    }

    // Validar campo apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado   = false;
        $errores['apellidos'] = 'Los apellidos no son validos';
        $errores['general']   = "Fallo al actualizar al usuario";
    }

    // Validar el email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado     = false;
        $errores['email']   = 'El email no es valido';
        $errores['general'] = "Fallo al actualizar al usuario";
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;
        $usuario_id      = $_SESSION['usuario']['id'];

        // Comprobar si el email ya existe
        $sql         = "SELECT id,email FROM usuarios WHERE email='$email'"
        $isset_email = mysqli_query($mysqli, $sql);
        $isset_user  = mysqli_fetch_assoc($isset_email);

        if ($isset_user['id'] == $usuario_id || empty($isset_user)) {
            // Insertar usuarios en la tabla usuarios en la BD
            $sql = "UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',email='$email' WHERE id='$usuario_id'";

            $actualizar = mysqli_query($mysqli, $sql);

            if ($actualizar) {
                $_SESSION['usuario']['nombre']    = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email']     = $email;
                $_SESSION['completado']           = "Tus datos se han actualizado con exito";
            } else {
                $_SESSION['errores']['general'] = "Fallo a guardar el usuario en la BD";
            }
        } else {

        }

    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: ../../mis-datos.php');
