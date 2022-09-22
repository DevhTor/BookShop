<?php

//includes
include("../template/header.php");
include("../../config/database.php");


//variables
$txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
$txtTitle = (isset($_POST['txtTitle']) ? $_POST['txtTitle'] : "");
$txtAuthor = (isset($_POST['txtAuthor']) ? $_POST['txtAuthor'] : "");
$txtPrice = (isset($_POST['txtPrice']) ? $_POST['txtPrice'] : "");
$txtCategory = (isset($_POST['txtCategory']) ? $_POST['txtCategory'] : "");
$txtRating = (isset($_POST['txtRating']) ? $_POST['txtRating'] : "");
$txtPublicationDate = (isset($_POST['txtPublicationDate']) ? $_POST['txtPublicationDate'] : "");
$txtImage = (isset($_FILES['txtImage']['name']) ? $_FILES['txtImage']['name'] : "");
$btnAction = (isset($_POST['btnAction']) ? $_POST['btnAction'] : "");


//tableX

$query = $conn->prepare('SELECT * FROM books');
$query->execute();
$bookList = $query->fetchAll(PDO::FETCH_ASSOC);


//CRUD
switch ($btnAction) {
  case 'add':
    $query = $conn->prepare("INSERT INTO books (title, author, image, price, category, publication_date, rating) 
            VALUES (:title, :author, :image, :price, :category, :publicationDate, :rating)");

    $query->bindParam(':title', $txtTitle);
    $query->bindParam(':author', $txtAuthor);
    $query->bindParam(':price', $txtPrice);
    $query->bindParam(':category', $txtCategory);
    $query->bindParam(':publicationDate', $txtPublicationDate);
    $query->bindParam(':rating', $txtRating);

    $date = new DateTime();
    $fileName = ($txtImage != "") ? $date->getTimestamp() . "_" . $_FILES['txtImage']['name'] : "image.jpg";

    $tmpImage = $_FILES['txtImage']['tmp_name'];

    if ($tmpImage != "") {
      move_uploaded_file($tmpImage, "../../img/" . $fileName);
    }

    $query->bindParam(':image', $fileName);
    $query->execute();

    //update page
    header("location:books.php");

    break;

  case 'modify':

    if ($txtTitle != "") {

      $query = $conn->prepare("UPDATE books SET title=:title WHERE id=:id");
      $query->bindParam(':title', $txtTitle);
      $query->bindParam(':id', $txtId);
      $query->execute();
    }


    if ($txtImage != "") {

      $query = $conn->prepare("SELECT image FROM books WHERE id = :id");
      $query->bindParam(':id', $txtId);
      $query->execute();
      $book = $query->fetch(PDO::FETCH_LAZY);

      //delete image
      if (isset($book['image']) && $book['image'] != "image.jpg") {
        if (file_exists("../../img/" . $book['image'])) {
          unlink("../../img/" . $book['image']);
        }
      }

      //update image

      $query = $conn->prepare("UPDATE books SET image=:image WHERE id = :id");
      $query->bindParam(':id', $txtId);

      $date = new DateTime();
      $fileName = ($txtImage != "") ? $date->getTimestamp() . "_" . $_FILES['txtImage']['name'] : "image.jpg";
      $tmpImage = $_FILES['txtImage']['tmp_name'];

      if ($tmpImage != "") {
        move_uploaded_file($tmpImage, "../../img/" . $fileName);
      }

      $query->bindParam(':image', $fileName);
      $query->execute();
    }

    header("location:books.php");

    break;

  case 'cancel':
    header("location:books.php");
    break;

  case 'seleccionar':

    $query = $conn->prepare("SELECT * FROM books WHERE id = :id");
    $query->bindParam(':id', $txtId);
    $query->execute();
    $book = $query->fetch(PDO::FETCH_LAZY);

    $txtId = $book['id'];
    $txtTitle = $book['title'];
    $txtImage = $book['image'];
    $txtPrice = $book['price'];
    $txtRating = $book['rating'];
    $txtAuthor = $book['author'];
    


    break;

  case 'borrar':

    $query = $conn->prepare("SELECT image FROM books WHERE id = :id");
    $query->bindParam(':id', $txtId);
    $query->execute();
    $book = $query->fetch(PDO::FETCH_LAZY);

    if (isset($book['image']) && $book['image'] != "image.jpg") {
      if (file_exists("../../img/" . $book['image'])) {
        unlink("../../img/" . $book['image']);
      }
    }


    $query = $conn->prepare("DELETE FROM books WHERE id = :id");
    $query->bindParam(':id', $txtId);
    $query->execute();

    header("location:books.php");

    break;
}


?>


<!----------------------- Book Card-------------------------------->

<div class="col-sm-6 col-md-5">

  <div class="card">
    <div class="card-header">
      Datos De Libro
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group pb-2">
          <label>Id</label>
          <input type="text" value="<?php echo $txtId; ?>" required readonly class="form-control" name="txtId" placeholder="Id">
        </div>
        <div class="form-group pb-2">
          <label>Titulo</label>
          <input type="text" value="<?php echo $txtTitle; ?>" required class="form-control" name="txtTitle" placeholder="titulo">
        </div>
        <div class="form-group pb-2">
          <label>Autor</label>
          <input type="text" value="<?php echo $txtAuthor; ?>" required class="form-control" name="txtAuthor" placeholder="autor">
        </div>
        <div class="form-group pb-2">
          <label>Precio</label>
          <input type="number" step="any" min="0" value="<?php echo $txtPrice; ?>" required class="form-control" name="txtPrice" placeholder="precio">
        </div>
        <div class="form-group pb-2">
          <label>Categoria</label>
          <input type="text" value="<?php echo $txtCategory; ?>" required class="form-control" name="txtCategory" placeholder="Categoria">
        </div>
        <div class="form-group pb-4">
          <label>Año De Publicacion</label>
          <input type="date" value="<?php echo $txtPublicationDate; ?>" required class="form-control" name="txtPublicationDate" min="01-01-01" max="01-01-2050">
        </div>
        <div class="form-group pb-2">
          <label>Rating</label>
          <select name="txtRating" id="txtRating" ?>">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <?php include("../../complements/rating.php"); ?>

          <script src="../../script/rating.js"></script>

        </div>
        <div class="form-group pb-2">
          <img src="../../img/<?php echo $txtImage; ?>" width="50" alt="">
          <input type="file" class="form-control" name="txtImage">
        </div>

        <div class="btn-group" role="group" aria-label="">
          <button type="submit" name="btnAction" value="add" class="btn btn-success" <?php echo ($btnAction == "seleccionar") ? "disabled" : "" ?>>Agregar</button>
          <button type="submit" name="btnAction" value="modify" class="btn btn-warning" <?php echo ($btnAction != "seleccionar") ? "disabled" : "" ?>>Modificar</button>
          <button type="submit" name="btnAction" value="cancel" class="btn btn-info">Cancelar</button>
        </div>
      </form>
    </div>

  </div>
</div>


<!----------------------- Book table -------------------------------->

<div class="col-sm-6 col-md-7">

  <table class="table bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($bookList as $book) { ?>
        <tr>
          <td><?php echo $book['id'] ?></td>
          <td><?php echo $book['title'] ?></td>
          <td><img src="../../img/<?php echo $book['image']; ?>" width="50" alt=""></td>
          <td>
            <form method="POST">
              <input type="hidden" name="txtId" value="<?php echo $book['id'] ?>">
              <input type="submit" name="btnAction" value="borrar" class="btn btn-danger">
              <input type="submit" name="btnAction" value="seleccionar" class="btn btn-primary">
            </form>


          </td>
        </tr>

      <?php } ?>

    </tbody>
  </table>
</div>






<?php include("../template/footer.php"); ?>
