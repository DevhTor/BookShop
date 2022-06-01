<?php 

SESSION_START();

$urlServer = '//' . $_SERVER['SERVER_NAME']. '/bookShop/';

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

    <!--CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css"  >
    <link rel="stylesheet" href="../../css/bootstrap.css">
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