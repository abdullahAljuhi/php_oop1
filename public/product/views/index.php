<?php
require_once("../connection.php"); // For connection to database
require_once 'php_opp1/public/category/category.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="../css/bootstrap.css">
    <title> Products</title>
</head>

<body class="bg-light">
    <?php
    require_once("../../include/nav.php")
    ?>
    <div class="container">
        <div class="row">
            <h1 class="bg-dark text-light text-center py-2 mt-3">Products</h1>
            <div class="row mt-2">
                <div class="col-3">
                    <a href="../product/add.php" class="btn btn-outline-primary p-2 fs-4 w-100">Add New Product</a>
                </div>
                <div class="col-3">
                    <a href="../category/add.php" class="btn btn-outline-danger p-2 fs-4 w-100">Add New Category</a>
                </div>
            </div>
            <div class="container bootstrap snippets ">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box no-header clearfix">
                    <div class="main-box-body clearfix">
                        <div class="table-responsive">
                            <table style="margin-top: 10px;" class="table user-list">
                                <thead>
                                    <tr>
                                    <th><span>Product Name</span></th>
                                    <th><span>Pric</span></th>
                                    <th class="text-center"><span>Description</span></th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                      $products = new Product();
                                      if($products->getAll()) {
                                      foreach($products->getAll() as$product) { ?>   
                                    <tr>
                                        <td>
                                            <?php
                                            if(isset($product['img'])){ ?>
                                            <img src="../public/img/<?=$product['img']?> " width="100">
                                            <?php }?>
                                        
                                            <span class="user-subhead"><?= $product['name']?></span>
                                        </td>
                                        <td>$<?= $product['price']?></td>
                                        <td class="text-center">
                                            <span class="label label-default"><?= $product['description']?></span>
                                        </td>
                                
                                        <td style="width: 20%;">
                                            <a href="edit.php/?id=<?= $product['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="/Product/app/productProcess.php?send=del&id=<?= $product['id'] ?>"  class="btn btn-danger">Delet</a>
                                        </td>
                                    </tr>

                                    <?php  }
                                  }  else {
                                    echo "<p class='mt-5 mx-auto'>no items</p>";
                                  }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</body>

</html>