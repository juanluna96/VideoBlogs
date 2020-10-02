<?php require_once 'conexion.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog de videojuegos</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="brown lighten-5 ">
    <!-- Start your project here-->
    <div style="min-height: 100vh">

        <!-- Cabecera -->
        <nav class="navbar navbar-expand-lg navbar-dark indigo">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="index.php">Blog de videojuegos</a>
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Categorías</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach (consultasTablas('categorias') as $categoria): ?>
                            <a class="dropdown-item"
                            href="categoria.php?categoria_id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                        <?php endforeach?>
                    </div>
                </li>
                <!-- Dropdown -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>

            </ul>
            <!-- Links -->
            <form class="form-inline" method="POST" action="buscar.php">
                <div class="md-form m-0 buscador input-with-post-icon">
                    <i class="fas fa-search input-prefix text-white"></i>
                    <input type="text" id="buscar" name="buscar" class="form-control">
                    <label for="buscar" class="text-white ml-2">Buscar</label>
                </div>
            </form>
        </div>
        <!-- Collapsible content -->
    </nav>
        <!-- Fin cabecera -->