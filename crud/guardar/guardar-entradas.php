<?php

if (isset($_POST)) {
    // Conexion a la BD
    require_once "../../includes/conexion.php";

    $titulo      = isset($_POST["titulo"]) ? mysqli_real_escape_string($mysqli, $_POST["titulo"]) : false;
    $descripcion = isset($_POST["descripcion"]) ? mysqli_real_escape_string($mysqli, $_POST["descripcion"]) : false;
    $categoria   = isset($_POST["categoria"]) ? (int) $_POST["categoria"] : false;
    $autor       = isset($_POST["autor"]) ? (int) $_POST["autor"] : false;

    // Array de errores
    $errores = [];

    // Validar los datos antes de guardarlos en las bases de datos
    // Validar el titulo
    if (empty($titulo)) {
        $errores['titulo'] = 'El titulo no es valido';
    }

    // Validar la descripcion
    if (empty($descripcion)) {
        $errores['descripcion'] = 'La descripcion no es valida';
    }

    // Validar la descripcion
    if (empty($categoria) || !is_numeric($categoria)) {
        $errores['categoria'] = 'La categoria no es valida';
    }

    if (count($errores) == 0) {
        $sql    = "INSERT INTO entradas VALUES(null,'$autor','$categoria', '$titulo','$descripcion',NOW())";
        $insert = mysqli_query($mysqli, $sql);
        header("Location: ../../index.php");
    } else {
        $_SESSION['errores_entrada'] = $errores;
        header("Location: ../../crearentradas.php");
    }
}
