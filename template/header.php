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
		<link rel="stylesheet" href="../css/style.css">
    </head>

  </head>

  <body>
    <nav class=" navbar navbar-expand-md navbar-light bg-primary">
      <div class="container-fluid">

				
        <button class="navbar-toggler" data-bs-target="#navBarNav" data-bs-toggle="collapse" 
				type="button" aria-controls="navBarNav" aria-expanded="false"
				aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navBarNav">

        <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      
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
        </div>

        <!-- Right elements -->

        <div class="d-flex align-items-center">
				  <a class=""  <?php echo (isset($_SESSION['user'])) ? 'hidden' : ''; ?> href="<?php echo $urlBase ?>/section/login.php">Iniciar Sesion</a>
            
				<div class="dropdown" <?php echo (!isset($_SESSION['user'])) ? 'hidden' : ''; ?>>		
              
						<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">             
								<?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : "" ?>
              </button>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">   
                  <a class="dropdown-item" href="<?php echo $urlBase ?>/section/closeSession.php">Cerrar Sesion</a>               
              </div>

            <img width="30em" src="<?php echo $urlBase ?>img/avatar.png" alt="" class="rounded-pill">
              
         </div>
				</div>  

          	
            
            
            
          
				
      </div>
    </nav>

		<script src="../script/bootstrap.bundle.js"></script>
  </body>
</html>