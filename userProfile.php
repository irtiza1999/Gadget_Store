<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/store/orderProfile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
    <?php
        include 'partials/_header.php';
        include 'partials/_dbconnect.php';
        $userId = $_SESSION['user_id'];
        
        $sql = "SELECT * FROM `users` WHERE user_id = $userId";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $userName = $row['user_name'];
            $userEmail = $row['user_email'];
            $userPhone = $row['user_phone_no'];
            $userAddress = $row['user_address'];
            $userPass = $row['user_pass'];
        }


        if($_SERVER['REQUEST_METHOD']=='POST'){
                $userName = $_POST['newName'];
                $userEmail = $_POST['newEmail'];
                $userPhone = $_POST['newPhone'];
                $password = $_POST['password'];
                $userAddress = $_POST['newAddress'];
                if($userPass == $password){
                    $sql = "UPDATE `users` SET `user_name` = '$userName', `user_email` = '$userEmail', `user_phone_no` = '$userPhone', `user_address` = '$userAddress' WHERE `user_id` = $userId";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your profile has been updated.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
                }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Password is incorrect.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
                
            }
   
    echo'
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5  mr-4"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">'.$userName.'</span><span
                        class="text-black-50">'.$userEmail.'</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="'.$_SERVER['PHP_SELF'].'" method="post">
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="name">Name</label><input type="text"
                                    name="newName" value="'.$userName.'" class="form-control" placeholder="User Name" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="newPhone" value="'.$userPhone.'"
                                    class="form-control" placeholder="Enter phone number" value=""></div>
                            <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" name="newAddress" value="'.$userAddress.'"
                                    class="form-control" placeholder="Enter address" value=""></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="email" name="newEmail" value="'.$userEmail.'"
                                    class="form-control" placeholder="enter email id" value=""></div>
                            <div class="col-md-12"><label class="labels">Password</label><input type="text"
                                    class="form-control" placeholder="Enter Your Password" name="password"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button></div>
                        <form>
                </div>
            </div>
            <div class="col-md-5 p-3 py-5">
                <h4 class="justify-content-between align-items-center mb-3">Order History</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Order Id</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Bill</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $sql = "SELECT * FROM `orders` WHERE order_user_id = $userId";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if ($num>0){
                        while($row = mysqli_fetch_assoc($result)){
                        $orderId = $row['order_id'];
                        $paymentMethod = $row['payment_method'];
                        $amountPaid = $row['bill'];
                        $status = $row['order_status'];
                        $payStatus = $row['payment_status'];
                        echo '<tbody>
                            ';
                            if($status == "Complete"){
                                echo "
                                <tr class='bg-success'>
                                <th scope='row'><a style='color: black' href='/store/orderPage.php?orderId=".$orderId."'>$orderId</a></th>
                                <td>$status</td>
                            <td>$payStatus</td>
                            <td>$$amountPaid</td>
                            <tr>";}
                            else if($status == "Not Delivered"){
                            echo "
                            <tr class='bg-danger'>
                            <th scope='row'><a style='color: black' href='/store/orderPage.php?orderId=".$orderId."'>$orderId</a></th>
                            <td>$status</td>
                            <td>$payStatus</td>
                            <td>$$amountPaid</td>
                            <tr>";
                            }else{
                                echo "<tr class='bg-warning'>
                                <th scope='row'><a style='color: black' href='/store/orderPage.php?orderId=".$orderId."'>$orderId</a></th>
                                <td>$status</td>
                            <td>$payStatus</td>
                            <td>$$amountPaid</td>
                            </tr>";
                            }
                            echo'
                        ';
                    }
                    }else{
                        echo'
                        <tr>
                            <td colspan="4" class="text-center">No Orders Found</td>
                        </tr>';
                        ;
                    }
                    
                    echo'
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>';
     ?>
    <?php include 'partials/_footer.php'?>
</body>

</html>