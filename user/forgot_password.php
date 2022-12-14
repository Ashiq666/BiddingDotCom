<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/signup.css" rel="stylesheet" </head>

<body>
    <?php
    include '../connectDB.php';

    if (isset($_POST['submit'])) {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];


            $new_password = mysqli_real_escape_string($con, $_POST['password']);
            $con_password = mysqli_real_escape_string($con, $_POST['c_password']);

            //pass encypt
            $pass = password_hash($new_password, PASSWORD_BCRYPT);
            $c_pass = password_hash($con_password, PASSWORD_BCRYPT);


            if ($new_password === $con_password) {

                $updatequery = " update user set password='$pass' where token='$token' ";

                $iquery = mysqli_query($con, $updatequery);

                if ($iquery) {
                    $_SESSION['message'] = "Your password has been updated";
                    header('location:./signin.php');
                } else {
                    $_SESSION['message'] = "Your password has not updated";
                    header('location:./forgot_password.php');
                }
            } else {
                $_SESSION['message'] = "Your password not matching";
            }
        } else {
            echo "No token found.";
        }
    }

    ?>

    <nav class="navbar navbar-expand-lg nav-deg">
        <div class="container-fluid">
            <a class="navbar-brand nav-text ms-4" href="#">Bidding Dot Com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto" style="width: 600px;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active nav-text" aria-current="page" href="./signin.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active ms-3 nav-text" aria-current="page" href="./signup.php">Registration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form class="form-deg mt-5 mx-auto" action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><b>Confirm Password</b></label>
            <input type="password" name="c_password" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-custom mt-2">Update</button>
        <div>
            <p class="text-danger text-center"> <?php
                                                if (isset($_SESSION['pmsg'])) {
                                                    echo $_SESSION['pmsg'];
                                                } else {
                                                    echo $_SESSION['pmsg'] = "";
                                                }  ?> </p>
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>