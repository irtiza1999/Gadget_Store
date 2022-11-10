<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_header.php' ?>
    <div class="container my-4">
        <div class="container search my-3">
            <?php
                $noResult = true;
                $temp = $_GET['search'];
                
                $sql = "SELECT * FROM `products` WHERE product_name LIKE '%$temp%' or product_category LIKE '%$temp%' or product_description LIKE '%$temp%'";
                $result = mysqli_query($conn, $sql);
                $check = mysqli_num_rows($result);
                if($check>0 &&strlen($temp)>0){
                    $noResult = false;
                }
                echo'<h1 class="my-3">Search results for <em> '.$_GET['search'].'</em></h1>
            <div class="result my-3">
            <div class="container">
            <div class="row">
            ';
            if(strlen($temp)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['product_id'];
                $name = $row['product_name'];
                $desc = $row['product_description'];
                $price = $row['product_price'];
                $img = $row['product_image'];

                echo'
                    <div class="col-md-4">
                <div class="card" style="height:570px ;width: 18rem; margin-top: 30px;">
                    <img src="'.$img.'" class="card-img-top" alt="'.$name.'" height="300" width="300">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/store/productPage.php?productId='.$id.'">'.$name.'</a></h5>
                        <p class="card-text">'.substr($desc,0,200).' ...</p>
                        <a href="/store/productPage.php?productId='.$id.'" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
                ';}
            }
    
    echo' </div>
    </div>';
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No results found</p>
          <p class="lead">Search for anything else.</p>
        </div>';
      }
    ?>
        </div>
    </div>
    </div>
    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>

</body>

</html>