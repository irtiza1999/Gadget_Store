<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="icon" type="image/x-icon" href="/store/uploads/logo.png">
    <title>Manage User</title>
</head>

<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
}
    if($_SESSION['user_type']=='admin'){
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];
    include 'partials/_header.php';
    include 'partials/_dbconnect.php';
    if(isset($_GET['delete']) && $_GET['delete'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> User deleted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['delete']) && $_GET['delete'] == "false"){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> User could not be deleted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['edit']) && $_GET['edit'] == "success"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>User Edited successfully</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if(isset($_GET['edit']) && $_GET['edit'] == "failed"){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error while editing user</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    echo'
    <h2 style="margin-top: 30px; text-align: center; padding: 10px">Manage Users</h2>
    <div class="col" style="margin-top: 80px;">
        <div class="row flex-lg-nowrap">
            <div class="col mb-3">
                <div class="e-panel card">
                    <div class="card-body">
                        <div class="e-table">
                            <div class="table-responsive table-lg mt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">User Id</th>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center"> User Email</th>
                                            <th class="text-center"> User Address</th>
                                            <th class="text-center"> Change Password</th>
                                            <th class="text-center"> Confirm Password</th>
                                            <th class="text-center">Edit User</th>
                                            <th class="text-center">Joining date</th>
                                            <th class="text-center">User Action</th>
                                            <th class="text-center">Delete User</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        $script = $_SERVER['SCRIPT_NAME'];
                                        $params = $_SERVER['QUERY_STRING'];
                                        $sql = "SELECT * FROM users";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $user_id = $row['user_id'];
                                            $user_name = $row['user_name'];
                                            $user_join = $row['user_created_timestamp'];
                                            $user_email = $row['user_email'];
                                            $user_type = $row['user_type'];
                                            $user_address  = $row['user_address'];
                                        if($user_id!=$_SESSION['user_id']){
                                        echo'
                                        <form action="/store/partials/_editUser.php" method="post">
                                        <tr>
                                            <td class="align-middle">
                                                <label class="bg-light d-inline-flex justify-content-center align-items-center align-top text-center">#'.$user_id.'</label>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div
                                                    class="bg-light d-inline-flex justify-content-center align-items-center align-top">
                                                    <input type="hidden" name="user_id" value="'.$user_id.'">
                                                    <input type="hidden" name="script" value="'.$script.'">
                                                    <input type="hidden" name="params" value="'.$params.'">
                                                    <input name="newName" class="form-control fluid" type="text" value="'.$user_name.'"></input>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div
                                                    class="bg-light d-inline-flex justify-content-center align-items-center align-top">
                                                    <input name="newMail" class="form-control fluid" type="email" value="'.$user_email.'"></input>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div
                                                    class="bg-light d-inline-flex justify-content-center align-items-center align-top">
                                                    <input name="newAddress" class="form-control fluid" type="text" value="'.$user_address.'"></input>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div
                                                    class="bg-light d-inline-flex justify-content-center align-items-center align-top">
                                                    <input name="newPass" class="form-control fluid" type="password"></input>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div
                                                    class="bg-light d-inline-flex justify-content-center align-items-center align-top">
                                                    <input name="cnewPass" class="form-control fluid" type="password"></input>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </td>
                                            </form> 
                                            <td class="align-middle text-center">
                                                <div
                                                    class="bg-light d-inline-flex justify-content-center align-items-center align-top">
                                                    <span>'.$user_join.'</span>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                 <div
                                                    class="bg-light d-inline-flex justify-content-center align-items-center align-top">';
                                                    if($user_type=='admin'){
                                                        echo'<form action="/store/partials/_removeAdmin.php" method="post">
                                                        <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <input type="hidden" name="script" value="'.$script.'">
                                                        <input type="hidden" name="params" value="'.$params.'">
                                                        <button type="submit" class="btn btn-danger">Remove From Admin</button>
                                                        </form>';
                                                    }else if($user_type=='user'){
                                                        echo'<form action="/store/partials/_makeAdmin.php" method="post">
                                                        <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <input type="hidden" name="script" value="'.$script.'">
                                                        <input type="hidden" name="params" value="'.$params.'">
                                                        <button type="submit" class="btn btn-success">Make Admin</button>
                                                        </form>';
                                                    }
                                                echo'</div>
                                            </td>
                                            
                                            
                                            
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                <form action="/store/partials/_deleteUser.php" method = "post">
                                                    <input type="hidden" name="user_id" value="'.$user_id.'">
                                                    <input type="hidden" name="script" id="script" value='. $script.'>
                                                    <input type="hidden" name="params" id="params" value='. $params.'>
                                                    <button type="submit" class="btn btn-danger">Delete User</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>';
                                       
                                        }}
                                        
   echo'</tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div> ';
    include 'partials/_footer.php';}
    else{
        header("location: /store/index.php");
    }
        ?>
</body>

</html>