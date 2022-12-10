<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/store/uploads/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <title>Request For a Product</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    include 'partials/_dbconnect.php';
    include 'partials/_header.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $productName = $_POST['productName'];
    $product_category = $_POST['productCategory'];
    $curUser = $_SESSION['user_id'];
    $showError = false;

    $checkSql = "SELECT * FROM `request` WHERE `request_user_id` = '$curUser'";
    $checkResult = mysqli_query($conn, $checkSql);
    while($row = mysqli_fetch_assoc($checkResult)){
    if($row['request_product_name'] == $productName){
    $showError = "You have already requested for this product";
    break;
    }
    }
    if(!$showError){
    $sql = "INSERT INTO `request` (`request_user_id`, `request_product_name`,`request_catagory` ,`request_time`) VALUES
    ('$curUser', '$productName', '$product_category', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your request has been submitted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Your request has not been submitted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    }

    if($showError != false){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    }
    echo'
    <div class="container" style="margin-top: 100px">
        <h1 class="text-center">Request For a Product</h1>
        <form action="'.$_SERVER['PHP_SELF'].'" method="post">
    <div class="mb-3" style="margin-top: 10px">
        <label for="productName" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="productName" required>
    </div>
    <div class="mb-3" style="margin-top: 10px">
        <label for="ProductCategory" class="form-label" style="margin-right: 10px">Product Category: </label>';
                    $sql2 = "SELECT DISTINCT product_category FROM `products`";
                    $result = mysqli_query($conn, $sql2);
                    while($row = mysqli_fetch_assoc($result)){
                        $product_category = $row['product_category'];
                        echo '<input type="radio" name="productCategory" value="'.$product_category.'" style="margin: 5px">'.strtoupper($product_category)
                        ;
                    }
                
    echo'</div>
    <button type="submit" class="btn btn-success">Submit Request</button>
    </form>
    </div>';
    }else{
        header("location: login.php");
    }
    ?>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>