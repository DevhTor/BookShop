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
        <nav class="container-fluid navbar navbar-expand navbar-light bg-primary justify-content-between">

            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link h-white" href="index.php">BookShop</a>
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
            </ul>

            <ul class="nav navbar-nav">

                
                <li class="nav-item" <?php echo (isset($_SESSION['user']))? 'hidden': '';?>>
                    <a class="nav-link" href="login.php">Iniciar Sesion</a>
                </li>

                

                <li class="nav-item dropdown" <?php echo (!isset($_SESSION['user']))? 'hidden': '';?>>
                    
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo (isset($_SESSION['user']))? $_SESSION['user'] : ""?>
                    </button>
                    
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">

                        <li class="">
                            <a class="dropdown-item" href="closeSession.php">Cerrar Sesion</a>
                        </li>
                        
                    </ul>
            
                </li>

                <li class="nav-item" <?php echo (!isset($_SESSION['user']))? 'hidden': '';?>>
                    <img width="50px" src="img/avatar.png" alt="" class="nav-link rounded-pill">
                </li>

                
            </ul>

        </nav>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>

        
