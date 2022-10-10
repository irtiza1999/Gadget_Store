<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" type="text/css">
    <link rel="stylesheet" href="productPage.css">

    <?php include 'partials/_header.php' ?>
    <div class="container" id="productPage">
        <div class="product-container main-product-container">
            <div class="product-left-container">
                <img src="http://www.lyostore.net/sites/default/files/galeria/x-mini_rave_capsule_speaker_charging_port__tuner.jpg"
                    alt="" width="540" />
                image
            </div>
            <div class="product-col-container">
                <small>
                    <p class="product-info-meta">Category</p>
                </small>
                <h1 class="product-page">Product Name</h1>
                <p>
                    <b>Quick overview</b><br />
                    Small description
                </p>
                <p class="product-price">
                    <b>Price:</b>
                    <span class="old-price">$499</span>
                    <span class="price">$399</span>

                    <span class="product-price-meta" style="float:right;">
                        Stock count
                    </span>
                </p>
                <p>
                    <span class="quantity">Quantity select</span>
                    <button class="btn btn-primary">Add to cart</button>
                    <br clear="both" />
                </p>
            </div>
        </div>
        <br clear="all" />
        <div class="product-container">
            <div class="product-left-container">
                <h2 class="product-page">Detaljer</h2>
                <p class="product-body">
                    Long description
                </p>
            </div>
        </div>
        <br clear="all" />
    </div>
</body>

</html>