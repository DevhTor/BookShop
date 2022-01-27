<?php SESSION_START(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookShop</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-primary">

        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">BookShop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="books.php">Libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="we.php">Nosotros</a>
            </li>

            <li class="nav-item" <?php echo (isset($_SESSION['user']))? 'hidden': '';?>>
                <a class="nav-link" href="login.php">Iniciar Sesion</a>
            </li>

            <li class="nav-item" <?php echo (!isset($_SESSION['user']))? 'hidden': '';?>>
                <a class="nav-link" href="closeSession.php">Cerrar Sesion</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="admin/home.php">Administrar</a>
            </li>
        </ul>

    </nav>

    <div class="container">
        <br>
        <div class="row"/>
        
