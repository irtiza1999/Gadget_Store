<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
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
        <strong>Success!</strong> Product deleted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['delete']) && $_GET['delete'] == "false"){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Product could not be deleted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

        $script   = $_SERVER['SCRIPT_NAME'];
        $params   = $_SERVER['QUERY_STRING'];
        echo'
        <div class="container">
            <h1 style= "padding-top: 50px; padding-bottom: 20px;">You Products</h1>
                <div class="row">
                <div class="col-sm-12 col-md-12 col-md-offset-1">
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
                <form action="/store/partials/_editProduct.php" method = "post">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="script" id="script" value='. $script.'>
                        <input type="hidden" name="params" id="params" value='. $params.'>
                        <button type="submit" class="btn btn-danger">Delete Product</button>
                    </form>
        </td>
        <td class="text-center">
                <form action="/store/partials/_deleteProduct.php" method = "post">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="script" id="script" value='. $script.'>
                        <input type="hidden" name="params" id="params" value='. $params.'>
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