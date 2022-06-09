<?php

include("template/header.php");
include("config/database.php");




$query = $conn->prepare("SELECT * FROM books where rating > 4");
$query->execute();
$bookList = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="jumbotron ">
    <h1 class="display-3">BookShop</h1>
    <p class="lead">We Have Your Favorite's Book</p>
    <br class="my-2">
    <h2>The Most Popular</h2>

    <div class="container-flex">
        <div class="row">
            <div class="col-8 d-flex">
                <?php foreach ($bookList as $book) { ?>
                    <div class="card m-4" style="width:200px; height:350px">
                        <img class="card-img-top" style="height:70%" src="img/<?php echo $book['image']; ?>" alt="">
                        <div class="card-body">
                            <?php include("complements/rating.php"); ?>
                            <h5 class="card-title text-12"><?php echo $book['title']; ?></h5>
                            <a class="btn btn-primary" href="#" role="button">ver Mas</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>


</div>

<?php include("template/footer.php") ?>