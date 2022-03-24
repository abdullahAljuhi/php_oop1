<?php
require_once('product.php');

if(isset($_GET['DelID']))
         {
            $product = new Product();
            $product->delete($_GET['DelID']);
        }

 

if (isset($_POST['pro'])) {
    $product = new Product();
    $product->add($_POST);
} else {
    header("location:index.php"); // if not requst redirct to index.php
}

//update product
if (isset($_POST['updateProduct'])) {
    $image = $_FILES['image']['name'];
    $file_path = "../upload/"; //this path for storge image
    $filePart = explode(".", $image);
    $ex = end($filePart);
    $file_ex = ["png", "jpg"];
    if (in_array($ex, $file_ex)) {
        $newName = time() . "." . $ex;
        move_uploaded_file($_FILES["image"]["tmp_name"], $file_path . $newName);
    $product = new Product();
    $product->update($_POST,$_GET['ID'],$newName);
    }
} else {
    header("location:index.php");
}