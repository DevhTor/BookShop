<?php 

include("../template/header.php");
include("../config/database.php");

$query = $conn->prepare("SELECT * FROM books");
$query->execute();
$bookList = $query->fetchAll(PDO::FETCH_ASSOC);

?>

 

<div class="container-flex">   
    <div class="row ">
        <div class="col-8 d-flex flex-wrap ">
            <?php foreach($bookList as $book){ ?>             
                <div class="card m-4" style="width:200px; height:350px" >
                    <img class="card-img-top" style="height:70%" src="../img/<?php echo $book['image'];?>" alt="" >
                    <div class="card-body">
                        <h5 class="card-title text-12"><?php echo $book['title'];?></h5>
                        <a class="btn btn-primary" href="#" role="button">ver Mas</a>
                    </div>
                </div>
            <?php } ?> 
        </div>
        
        <div class="col-4">
            Carrito
        </div>

    </div>  
</div>


<?php include("../template/footer.php")?>