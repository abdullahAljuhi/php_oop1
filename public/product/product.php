<?php
require_once("../connection.php");
class Product
{
    private $con;

    function __construct()
    {
        $this->con = conDb(); // connection to database
        if (!$this->con) {
            die(" Connection Error ");
        } // check connection
    }

    // This  Add Products
    function add($data)
    {
        if (empty($data['name']) || empty($data['des']) || empty($data['price']) || empty($data['category'])) // For make sure that post value is not empty
        {
            echo " Please Fill in the Blanks";
        } else {
            $name = $data['name'];
            $does = $data['description'];
            $price = $data['price'];
            $category = $data['category'];
            $img = $_FILES['image']['name'];

            $file_path = "../upload/";  // Path that will storge the image
            $filePart = explode(".", $img);
            $ex = end($filePart);
            $file_ex = ["png", "jpg"]; // extintion of images
            if (in_array($ex, $file_ex)) {
                $newName = time() . "." . $ex; // for change name of image
                move_uploaded_file($_FILES["image"]["tmp_name"], $file_path . $newName);

                $query = " insert into product (name,price,description,img,category) values('$name','$price','$does','$newName','$category')"; //Query for insert values to product table
                $result = mysqli_query($this->con, $query);

                if ($result) //check query 
                {
                    header("location:index.php"); // If true redirct to view.php
                } else {
                    echo '  Please Check Your Query '; // if false message 
                }
            }
        }
    }

    function getAll()
    {
        $query = "select * from products  "; // Query to select all data about category table
        $result = mysqli_query($this->con, $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    function update($data, $id,$img)
    {
        $proID = $id;
        $name = $data['name'];
        $does = $data['des'];
        $price = $data['price'];
        $category = $data['category'];

        $query = "update product set name ='" . $name . "', description='" . $does . "', price ='" . $price . "', img ='" . $img . "', category ='" . $category . "' where id='" . $proID . "'"; //this query for update table products
        $result = mysqli_query($this->con, $query);

        if ($result) {
            header("location:index.php");
        } else {
            echo ' Please Check Your Query ';
        }
    }

    function delete($id)
    {
        $proId = $id;
        $query = " delete from product where id = '" . $proId . "'"; // this query for delete record from table product
        $result = mysqli_query($this->con, $query);
        if ($result) {
            header("location:index.php");
        } else {
            echo ' Please Check Your Query ';
        }
    }
}
