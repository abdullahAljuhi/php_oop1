<?php
require_once("category.php");
if (isset($_POST['add-category'])) {
    $category = new Category();
    $category->add($_POST);
} else {
    header("location:index.php"); // if not requst redirct to index.php
}


if(isset($_GET['delcategoryld']))
         {
            $category = new Category();
            $category->delete($_GET['DelID']);
        }

        // Update category
if (isset($_POST['add-category'])) {
    $category = new Category();
    $category->update($_POST,$_GET['ID']);
} else {
    header("location:index.php"); // if not requst redirct to index.php
}
