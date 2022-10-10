<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <div class="container" id="head">
        <h1>Welcome to our store</h1>
    </div>
    <div class="container">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut repellendus, alias quos atque excepturi magni
            quo et adipisci, quisquam optio harum cum ex tenetur laborum! Nemo expedita culpa atque. Sunt dolore
            dignissimos odio recusandae, sed cum tenetur odit voluptate aliquam modi harum, magni vel expedita facilis!
            Natus doloribus dolore facere.
        </p>
    </div>
    <div class="container">
        <div class="row">
            <h3 class="text-center">New Products</h3>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/500x400/?coding" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/forum/threads.php?catid='.$id.'">Title</a></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, nulla!
                            ...
                        </p>
                        <a href="" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'partials/_footer.php' ?>
</body>

</html>