<?php
// Conexion a la base de datos
require_once "includes/conexion.php";

if (isset($_POST)) {

    // Recoger los valores del formulario de registro
    $nombre    = isset($_POST['nombre']) ? mysqli_real_escape_string($mysqli, $_POST["nombre"]) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($mysqli, $_POST["apellidos"]) : false;
    $email     = isset($_POST['email']) ? mysqli_real_escape_string($mysqli, $_POST["email"]) : false;
    $password  = isset($_POST['password']) ? mysqli_real_escape_string($mysqli, $_POST["password"]) : false;

// Array de errores
    $errores = [];

    // Validar los datos antes de guardarlos en las bases de datos
    // Validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado    = false;
        $errores['nombre']  = 'El nombre no es valido';
        $errores['general'] = "Fallo al registrar al usuario";
    }

    // Validar campo apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado   = false;
        $errores['apellidos'] = 'Los apellidos no son validos';
        $errores['general']   = "Fallo al registrar al usuario";
    }

    // Validar el email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado     = false;
        $errores['email']   = 'El email no es valido';
        $errores['general'] = "Fallo al registrar al usuario";
    }

    // Validar la contraseña
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado   = false;
        $errores['password'] = 'La contraseña no es valida';
        $errores['general']  = "Fallo al registrar al usuario";
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;
        // Cifrar la contraseña

        $password_cifrada = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        //Insertar usuarios en la tabla usuarios en la BD

        $sql    = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos', '$email','$password_cifrada',CURDATE())";
        $insert = mysqli_query($mysqli, $sql);

        if ($insert) {
            echo "Datos insertados correctamente";
            $_SESSION['completado'] = "El registro se ha compleado con exito";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }

    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');
