<?php

require_once 'conexion.php';

function mostrarError($errores, $campo)
{
    $alerta = '';

    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = '<div class="alert alert-danger alert-dismissible fade show mb-1" role="alert">' . $errores[$campo] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>';
    }

    return $alerta;
}

function borrarErrores()
{

    if (isset($_SESSION['completado'])) {
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
    }
    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }

    return '';
}

function consultasTablas($tabla, $condicion = null)
{
    global $mysqli;
    switch ($tabla) {
        case ($tabla == 'categorias'):
            if ($condicion == 'categoria_ind') {
                $id_categoria = $_GET['categoria_id'];
                $sql          = "SELECT * FROM $tabla WHERE id={$id_categoria} ORDER BY id ASC";
            } else {
                $sql = "SELECT * FROM $tabla ORDER BY id ASC";
            }
            break;

        case ($tabla == 'entradas'):
            $sql = "SELECT $tabla.*,usuarios.nombre AS 'nombre_autor',categorias.nombre AS 'nombre_categoria' FROM $tabla, usuarios, categorias WHERE usuarios.id = $tabla.usuario_id AND categorias.id = $tabla.categoria_id ORDER BY $tabla.fecha DESC";

            switch ($condicion) {

                case ($condicion == 'ultimas_4'):
                    $sql = "SELECT $tabla.*,usuarios.nombre AS 'nombre_autor',categorias.nombre AS 'nombre_categoria' FROM $tabla, usuarios, categorias WHERE usuarios.id = $tabla.usuario_id AND categorias.id = $tabla.categoria_id ORDER BY $tabla.fecha DESC LIMIT 4";
                    break;

                case ($condicion == 'entradas_categorias'):
                    $id_categoria = $_GET['categoria_id'];
                    $sql          = "SELECT $tabla.*,usuarios.nombre AS 'nombre_autor',categorias.nombre AS 'nombre_categoria' FROM $tabla, usuarios, categorias WHERE usuarios.id = $tabla.usuario_id AND categorias.id = $tabla.categoria_id AND $tabla.categoria_id={$id_categoria} ORDER BY $tabla.fecha DESC";
                    break;

                case ($condicion == 'entrada_ind'):
                    $id_entrada = $_GET['id_entrada'];
                    $sql        = "SELECT $tabla.*,usuarios.nombre AS 'nombre_autor',categorias.nombre AS 'nombre_categoria',categorias.id AS 'id_categoria', usuarios.id AS 'id_autor' FROM $tabla, usuarios, categorias WHERE usuarios.id = $tabla.usuario_id AND categorias.id = $tabla.categoria_id AND $tabla.id={$id_entrada} ORDER BY $tabla.fecha DESC";
                    break;
            }

            break;

        case ($tabla == 'usuarios'):
            if ($condicion == 'mis_datos') {
                $sql = "SELECT * FROM $tabla WHERE id=" . $_SESSION['usuario']['id'] . "";

            }
            break;
    }
    $consulta = $mysqli->query($sql);

    return $consulta;

}

function Buscar_entradas($busqueda = null)
{
    global $mysqli;
    if (!empty($busqueda)) {
        $sql = "SELECT entradas.*,usuarios.nombre AS 'nombre_autor',categorias.nombre AS 'nombre_categoria' FROM entradas, usuarios, categorias WHERE usuarios.id = entradas.usuario_id AND categorias.id = entradas.categoria_id AND entradas.titulo LIKE '%$busqueda%' ORDER BY entradas.titulo ASC";
    }
    $entradas_busqueda = $mysqli->query($sql);

    return $entradas_busqueda;
}
