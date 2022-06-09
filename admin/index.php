<?php

session_start();

if ($_POST) {

  include("../config/database.php");

  $username = $_POST['user'];
  $password = $_POST['password'];

  $query = $conn->prepare("SELECT * FROM users WHERE username = :username");
  $query->bindParam(':username', $username);
  $query->execute();
  $user = $query->fetch(PDO::FETCH_LAZY);

  if (!empty($user) && $username == $user['username'] && $password == $user['password'] && $user['role'] == 'admin') {

    $_SESSION['user'] = $username;
    $_SESSION['role'] = $user['role'];
    header('location:home.php');
  } else {
    echo '<script language="javascript">alert("Acceso No Autorizado");</script>';
  }
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-md-4">

      </div>

      <div class="col-md-4">

        <br><br><br>

        <div class="card">

          <div class="card-header">
            Inicio De Sesion
          </div>

          <div class="card-body">

            <form method="POST">
              <div class="form-group">
                <label>Usuario</label>
                <input class="form-control" name="user" placeholder="Escribe tu usuario">
              </div>

              <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña">
              </div>

              <button type="submit" class="btn btn-primary">Acceder como administrador</button>
            </form>

          </div>

        </div>
      </div>




    </div>
  </div>

</body>

</html>