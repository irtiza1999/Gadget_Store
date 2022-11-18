<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">


    <title>Edit Product</title>
</head>

<body>
    <?php 
    ob_start();
    include 'partials/_dbconnect.php';
    include 'partials/_header.php';
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $name = $_GET["name"];
        $category = $_GET["category"];
        $price = $_GET["price"];
        $description = $_GET["desc"];
        $id = $_GET["id"];
        $image = $_GET["image"];
        $stock = $_GET["stock"];
        
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $newName = $_POST["newName"];
        $newCategory = $_POST["newCategory"];
        $newPrice = $_POST["newPrice"];
        $newDescription = $_POST["newDesc"];
        $newStock = $_POST["newStock"];
        $id = $_POST["id"];

        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
		if ($error === 0 && $img_size > 125000) {
		    header("Location: /store/manageProduct.php?add=false1");
		}else{
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 
			if(in_array($img_ex_lc, $allowed_exs)){
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				// Insert into Database
                $sql = "UPDATE `products` SET `product_name` = '$newName', `product_category` = '$newCategory', `product_price` = '$newPrice', `product_description` = '$newDescription', `product_image` = '$new_img_name', `product_stock` = '$newStock' WHERE `products`.`product_id` = $id";
                $result = mysqli_query($conn, $sql);
				header("Location: /store/manageProduct.php?edit=true");
			}else {
				$sql = "UPDATE `products` SET `product_name` = '$newName', `product_category` = '$newCategory', `product_price` = '$newPrice', `product_description` = '$newDescription', `product_stock` = '$newStock' WHERE `products`.`product_id` = $id";
                $result = mysqli_query($conn, $sql);
                if($result){
                header("Location: /store/manageProduct.php?edit=true");}
			}
		}
	}
}
    echo'
    <div class="container">
        <h1 class="text-center">Edit Product</h1>
        <form action="'.$_SERVER["PHP_SELF"].'" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="userName" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="newName" value="'.$name.'" aria-describedby="userName"
                    required>
            </div>
            <div class="mb-3">
                <label for="signupEmail" class="form-label">Category</label>
                <input type="text" class="form-control" name="newCategory" value="'.$category.'"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="signupEmail" class="form-label">Description</label>
                <input type="text" class="form-control" name="newDesc" value="'.$description.'"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="signupEmail" class="form-label">Price</label>
                <input type="text" class="form-control" name="newPrice" value="'.$price.'"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="signupEmail" class="form-label">Stock</label>
                <input type="text" class="form-control" name="newStock" value="'.$stock.'"
                    aria-describedby="emailHelp" required>
            <div class="mb-3">
                <label for="signupEmail" class="form-label">Image</label>
                <input class="form-control" type="file" name="image"  id="formFileMultiple">
            </div>
            <input type="hidden" name="id" value="'.$id.'">
            <button type="submit" class="btn btn-success mt-3">Confirm</button>
        </form>
    </div>';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>