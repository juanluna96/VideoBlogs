<?php
if (isset($_POST)) {
    // Conexion a la BD
    require_once "../../includes/conexion.php";

    $nombre = isset($_POST["nombre_categoria"]) ? mysqli_real_escape_string($mysqli, $_POST["nombre_categoria"]) : false;

    // Array de errores
    $errores = [];

    // Validar los datos antes de guardarlos en las bases de datos
    // Validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado    = false;
        $errores['nombre']  = 'El nombre no es valido';
        $errores['general'] = "Fallo al crear una nueva categoria";
    }

    if (count($errores) == 0) {
        $sql    = "INSERT INTO categorias VALUES(null,'$nombre')";
        $insert = mysqli_query($mysqli, $sql);
    }
}

header("Location: ../../index.php");
