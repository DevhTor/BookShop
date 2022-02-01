<?php 

include("../template/header.php");
include("../config/database.php");

$query = $conn->prepare("SELECT * FROM books");
$query->execute();
$bookList = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<br>
<div class="container-flex bg-primary ">
    <div class="col-6 ">

        <div class="row">
            <?php foreach($bookList as $book){ ?>
                
                <div class="col-4 card">
                    <img class="card-img-top" src="../img/<?php echo $book['image'];?>" alt="" >
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $book['title'];?></h4>
                        <a name="" id="" class="btn btn-primary" href="#" role="button">ver Mas</a>
                    </div>
                </div>

            <?php } ?>
        </div>

        <div class="row">
            <div class="col">
                horizontal
            </div>
        </div>

    </div>
    
    
</div>

<?php include("../template/footer.php")?>