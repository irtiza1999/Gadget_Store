<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="/store/productPage.css">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
    .checked {
        color: orange;
    }
    </style>
</head>

<body>
    <?php
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];
    include 'partials/_header.php'; 
    include 'partials/_dbconnect.php';
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];

     if(isset($_GET["err"])){
        $err = $_GET["err"];
        if($err=="True"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid Quantity.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Item added to cart.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    if(isset($_GET["comment"])){
        $comment = $_GET["comment"];
        if($comment=="success"){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Comment added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Comment not added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    
    $id = $_GET['productId'];
    $sql = "SELECT * FROM `products` WHERE product_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['product_id'];
        $name = $row['product_name'];
        $category = strtoupper($row['product_category']);
        $desc = $row['product_description'];
        $price = $row['product_price'];
        $img = $row['product_image'];
        $stock = $row['product_stock'];
    }
    echo'
    <div class="container" id="productPage">
        <div class="product-container main-product-container">
            <div class="product-left-container">
                <img src="'.$img.'"
                    alt="'.$name.'" height="407" width="400" />
            </div>
            <div class="product-col-container">
                <small>
                    <p class="product-info-meta">'.$category.'</p>
                </small>
                <h1 class="product-page">'.$name.'</h1>
                <p>
                    <b>Quick overview</b><br />
                    '.$desc.'
                </p>
                <p class="product-price">
                    <b>Price:</b>
                    <span class="old-price">$499</span>
                    <span class="price">$'.$price.'</span>';
                    if($stock == 0){
                        echo '<span class="product-price-meta" style="float:right;">
                        Not in stock
                    </span>';}
                    else{
                        echo '<span class="product-price-meta" style="float:right;">
                        <strong>In Stock</strong>
                    </span>
                    </p>';
                    }
                if($stock != 0){
                echo'
                <p>
                <form action="partials/_addToCart.php" method="post">';
                    echo'
                    <input type="hidden" name="id" id="id" value='.$id.'>
                    <input type="hidden" name="script" id="script" value='. $script.'>
                    <input type="hidden" name="params" id="params" value='. $params.'>
                    <input class="quantity" style="padding: 10px; type="text" name="quan" id="quan" placeholder="Type quantity" value=1>
                    <button class="btn btn-success" style="margin-left: 10px;">Add to cart</button>
                    <br clear="both" />
                </form>
                </p>';
                    }
    else{
    echo'
    <p>
        <button class="btn btn-secondary" disabled>Add to cart</button>
        <br clear="both" />
    </p>';
    }

    echo '</div>
    </div>
    <br clear="all" />
    <div class="product-container" style="margin-top: 10px;padding: 10px;">
            <h4 class="product-page text-dark">Comments</h4>';
            $sql = "SELECT * FROM `comments` WHERE commented_for = $id";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 0){
                echo '<div class="jumbotron">
                <p class="display-4">No Comments</p>
                <p class="lead">Be the first person to comment.</p>
                <form action="/store/partials/_addComment.php" method="post">
                <input type="hidden" name="productId" value='.$id.'>
                <input type="hidden" name="userId" value='.$_SESSION['user_id'].'>
                <input type="hidden" name="script" id="script" value='. $script.'>
                <input type="hidden" name="params" id="params" value='. $params.'>
                
                <div class="d-flex align-items-start" style="margin-top: 10px; margin-bottom: 10px">
                <div class="rateyo" id= "rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3"> 
                </div>
                <mark class="result"></mark>
                        <input type="hidden" name="rating">
                </div>
                <div>
                <textarea class="form-control" name="comment" id="comment" placeholder="Write your comment here"></textarea>
                <button class="btn btn-success" style="margin-top: 10px;">Submit</button>
                </form>
                </div>
                ';
            }else{
                $userId = $_SESSION['user_id'];
                $sql = "SELECT * FROM `comments` WHERE commented_by = $userId";
                $result3 = mysqli_query($conn, $sql);
                $numOfRows = mysqli_num_rows($result);
                if($numOfRows==0){
                echo'
                <div class="jumbotron d-flex flex-column">
                <p class="lead">Add your Comment and Rating</p>
                <form action="/store/partials/_addComment.php" method="post">
                <input type="hidden" name="productId" value='.$id.'>
                <input type="hidden" name="userId" value='.$_SESSION['user_id'].'>
                <input type="hidden" name="script" id="script" value='. $script.'>
                <input type="hidden" name="params" id="params" value='. $params.'>


                <div class="d-flex align-items-start" style="margin-top: 10px; margin-bottom: 10px">
                <div class="rateyo" id= "rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3"> 
                </div>
                <mark class="result footer"></mark>
                        <input type="hidden" name="rating">
                </div>
                <div>
                <textarea class="form-control" name="comment" id="comment" placeholder="Write your comment here"></textarea>
                <button class="btn btn-success" style="margin-top: 10px;">Submit</button>
                </form>
                </div>';}
                else{
                    echo '<div class="jumbotron">
                <p class="display-6">Sorry you are only eligible for commenting and rating a product once.</p>';
                }
                echo'</div>';
                while($row = mysqli_fetch_assoc($result)){
                    $comment = $row['comment_content'];
                    $commented_by = $row['commented_by'];
                    $rating = $row['rating'];
                    $sql2 = "SELECT * FROM `users` WHERE user_id = $commented_by";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $commented_by = $row2['user_name'];
                    
                    echo'
                    <div class="" style="margin-top: 10px;">
                        <div class="d-flex my-3">
                            <div class="flex-shrink-0">
                                <img src="https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png"
                                    width="54px" height="54px" alt="">
                            </div>
                            <div class="media-body flex-grow-1 ms-3">
                            <p class="my-0" style="margin-right: 30px"><strong>'.$commented_by.'</strong>'; 
                            $temp = 5-$rating;
                            for($i=0; $i<$rating; $i++){
                                echo '<span class="fa fa-star checked"></span>';
                            }
                            for($i=0; $i<$temp; $i++){
                                echo '<span class="fa fa-star"></span>';
                            }
                            echo'</p>
                            '.$comment.'
                            </div>
                        </div>
                ';    
                }
            }
            echo'
    </div>
    <br clear="all" />
    </div>';
    ?>
    <?php include 'partials/_footer.php' ?>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Rating: ' + rating);
            $(this).parent().find('input[name=rating]').val(rating);
        });
    });
    </script>
</body>

</html>