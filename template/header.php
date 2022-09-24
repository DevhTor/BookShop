<?php 
SESSION_START();
include("../config/Server.php") 

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookShop</title>
    
		<link rel="stylesheet" href="../css/bootstrap.css">
    </head>

  </head>

  <body>
    <nav class=" navbar navbar-expand-md navbar-light bg-primary">
      <div class="container-fluid">
        <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="menu">
          <ul class=" navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-white " href="<?php echo $urlBase ?>/index.php">BookShop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo $urlBase ?>/index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo $urlBase ?>/section/books.php">Libros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo $urlBase ?>/section/we.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo $urlBase ?>/admin/home.php">Administrador</a>
            </li>
          </ul>
      
          <ul class="nav navbar-nav">
            <li class="nav-item" <?php echo (isset($_SESSION['user'])) ? 'hidden' : ''; ?>>
              <a class="nav-link text-white" href="<?php echo $urlBase ?>/section/login.php">Iniciar Sesion</a>
            </li>
            <li class="nav-item dropdown" <?php echo (!isset($_SESSION['user'])) ? 'hidden' : ''; ?>>
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : "" ?>
              </button>
              <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                <li class="">
                  <a class="dropdown-item" href="<?php echo $urlBase ?>/section/closeSession.php">Cerrar Sesion</a>
                </li>
              </ul>
            </li>
            <li class="nav-item" <?php echo (!isset($_SESSION['user'])) ? 'hidden' : ''; ?>>
              <img width="50px" src="<?php echo $urlBase ?>img/avatar.png" alt="" class="nav-link rounded-pill">
            </li>
          </ul>
        </div>
      </div>
    </nav>

		<script src="../script/bootstrap.js"></script>
  </body>
</html>