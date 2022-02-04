<?php 

SESSION_START();

$urlServer = '//' . $_SERVER['SERVER_NAME'];

if(!isset($_SESSION['user']) || $_SESSION['role']!='admin'){
    header('location: ' .  $urlServer . '/admin/index.php');
    
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php 

    
    
    
    ?>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo $urlServer;?>/admin/home.php">Administrador <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $urlServer;?>/admin/home.php">Home</a>
            <a class="nav-item nav-link" href="<?php echo $urlServer;?>/admin/section/books.php">Libros</a>
            <a class="nav-item nav-link" href="<?php echo $urlServer;?>/admin/section/closeSession.php">Cerrar Sesion</a>
            <a class="nav-item nav-link" href="<?php echo $urlServer;?>">Ver Sitio Web</a>
        </div>
        </div>
    </nav>

    <div class="container">
        <br>
        <div class="row">