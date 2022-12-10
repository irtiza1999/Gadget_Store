<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <style>
    .blink {
        padding: 15px;
        text-align: center;
        line-height: 50px;
    }

    .b1 {
        animation: blink 1s linear infinite;
    }

    @keyframes blink {
        0% {
            opacity: 0;
        }

        50% {
            opacity: .5;
        }

        100% {
            opacity: 1;
        }
    }
    </style>
</head>

<body>
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">
        <hr class="my-4">
        <div class="footer-copyright py-3">
            <h4>
                <div class="blink"><span class="b1"><a class="link-info" href="/store/request.php">Request For a
                            Product</a></span>
                </div>
            </h4>
        </div>
        <div class="pb-4">
            <a href="">
                <i class="fab fa-facebook-f mr-3"></i>
            </a>

            <a href="">
                <i class="fab fa-twitter mr-3"></i>
            </a>

            <a href="">
                <i class="fab fa-youtube mr-3"></i>
            </a>

            <a href="">
                <i class="fab fa-google-plus-g mr-3"></i>
            </a>

            <a href="">
                <i class="fab fa-dribbble mr-3"></i>
            </a>

            <a href="">
                <i class="fab fa-pinterest mr-3"></i>
            </a>

            <a href="">
                <i class="fab fa-github mr-3"></i>
            </a>

            <a href="">
                <i class="fab fa-codepen mr-3"></i>
            </a>
        </div>
        <div class="footer-copyright py-3">
            <a href="/store/index.php"><img src="/store/uploads/logo.png" height="100"> </a></br>
            ©
            <?php echo date("Y") ?> Copyright:
            <a href="/store/index.php"> Gadget Store </a>

        </div>

    </footer>
</body>

</html>