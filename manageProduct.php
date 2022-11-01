<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
}
    if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!='admin'){
        header("location: /store/index.php");
    }
    else{
        include 'partials/_header.php';
        include 'partials/_dbconnect.php';
        

        if(isset($_GET['delete']) && $_GET['delete'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Product deleted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['delete']) && $_GET['delete'] == "false"){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Product could not be deleted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['edit']) && $_GET['edit'] == "false"){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Product could not be edited.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['edit']) && $_GET['edit'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Product edited.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['add']) && $_GET['add'] == "false"){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Product could not be added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['add']) && $_GET['add'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Product added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
        echo'
        <div class="container">
            <h1 style= "padding-top: 50px; padding-bottom: 20px;">You Products</h1>
                <div class="row">
                <div class="col-sm-12 col-md-12 col-md-offset-1">
                <a href="/store/addProduct.php"><button class="btn btn-success" style= "margin-bottom: 10px">Add new Product <i class="fa fa-plus"></i>
                </button></a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                </th>
                                <th class="text-center">Product</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Edit Product</th>
                                <th class="text-center">Remove Product</th>
                            </tr>
                        </thead>
                <tbody>
                ';
                $sql = "SELECT * FROM `products`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['product_id'];
                    $name = $row['product_name'];
                    $price = $row['product_price'];
                    $image = $row['product_image'];
                    $stock = $row['product_stock'];
                    $desc = $row['product_description'];
                    $category = $row['product_category'];
                echo'
                <tr>
                <td class="" style="text-align: center">
            <span class="">#'.$id.'</span>
            </td>
                <td class="">
                <div class="media">
                <a class="thumbnail pull-lef" href="#"> <img class="media-object"
                        src="'.$image.'"
                        style="width: 72px; height: 72px;"> </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="/store/productPage.php?productId='.$id.'">'.$name.'</a></h4>
                </div>
            </div>
        </td>
        <td class="text-center"><strong>'.$stock.'</strong></td>
        <td class="text-center"><strong>$'.$price.'</strong></td>
        <td class="text-center">
                <form action="/store/editProduct.php" method = "get">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="name" value="'.$name.'">
                        <input type="hidden" name="price" value="'.$price.'">
                        <input type="hidden" name="image" value="'.$image.'">
                        <input type="hidden" name="stock" value="'.$stock.'">
                        <input type="hidden" name="desc" value="'.$desc.'">
                        <input type="hidden" name="category" value="'.$category.'">
                        <button class="btn btn-primary" type="submit">Edit <i class="fa fa-edit"></i></button>
                    </form>
        </td>
        <td class="text-center">
                <form action="/store/partials/_deleteProduct.php" method = "post">
                        <input type="hidden" name="id" value="'.$id.'">
                        <button type="submit" class="btn btn-danger">Delete Product</button>
                    </form>
        </td>
        </tr>';}
        }
    
    
    ?>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>