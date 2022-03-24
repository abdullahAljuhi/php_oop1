<?php
require_once("./product/product.php"); // For connection to database
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="css/bootstrap.css">
    <title> Products</title>
</head>

<body class="bg-light">
    <?php
    require_once("./include/nav.php")
    ?>
   <div class="container">
        <div class="row text-center py-5">
            <?php 
                $products = new Product();
                if($products->getAll()) {
                foreach($products->getAll() as $product) {
                     ?>   
                    <div class="col-md-3 col-sm-6 my-3 my-md-2">
                    <form action="index.php" method="post">
                        <div class="card shadow">
                            <div>
                            <img src="../public/img/<?=$product['img']?> " alt="Image1" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?=$product['name']?></h5>
                                <p class="card-text">
                                <?=$product['description']?>
                                </p>
                                <h5>
                                    <span class="price">$<?=$product['price']?></span>
                                </h5>
                                <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                                 <input type='hidden' name='product_id' value='<?=$product['id']?>'>
                            </div>
                        </div>
                    </form>
                </div>
           <?php  }
    }  else {
      echo "<p class='mt-5 mx-auto'>Post is empty...</p>";
    }
  ?>
            </div>
        </div>

</body>

</html>