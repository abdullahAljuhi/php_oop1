<?php

require_once("../connection.php");
$id = $_GET['GetID'];
$query = " select * from product where id='" . $id . "'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id']; 
    $name = $row['name'];
    $Does = $row['description'];
    $category = $row['category']; 
    $price = $row['price'];
    $image = $row['img'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="../CSS/bootstrap.css" />
    <title>Document</title>
</head>

<body class="bg-light">
    <?php
    require_once("../../include/nav.php")
    ?>
    <!-- this form for update products -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5 shadow">
                    <div class="card-title">
                        <h3 class="bg-dark text-white text-center py-3"> Update </h3>
                    </div>
                    <div class="card-body">

                        <form action="update.php?ID=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control mb-2" placeholder=" product name " name="name" value="<?php echo $name ?>">
                            <input type="text" class="form-control mb-2" placeholder=" description " name="des" value="<?php echo $Does ?>">
                            <select name="category" id="" class="form-select mb-2">
                                <?php

                                $query2 = "select * from category ";
                                $result2 = mysqli_query($con, $query2);
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $cat_id = $row2['id'];
                                    $name = $row2['name'];
                                    if ($category == $cat_id) {
                                        echo "<option selected  value='$category'>" . $name . "</option>";
                                    } else {
                                        echo "<option value='$cat_id'>" . $name . "</option>";
                                    }
                                }

                                ?>


                            </select>
                            <input type="text" class="form-control mb-2" placeholder=" price " name="price" value="<?php echo $price ?>">
                            <input type="file" class="form-control mb-2" placeholder=" image " name="image" value="<?php echo $image ?>" required>
                            <button class="btn btn-dark w-100 fs-4" name="updateProduct">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>