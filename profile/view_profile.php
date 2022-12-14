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
    <link href="../css/view_profile.css" rel="stylesheet">
</head>
<body>
    <?php
    include '../connectDB.php';
    ?>
    <div class="container">
        <div>
        <img class="cover-photo w-100" src="https://s3.amazonaws.com/99Covers-Facebook-Covers/watermark/31654.jpg" alt="">
        </div>
        <div class="d-flex w-100">
        <img class="profile-photo" src="https://bellfund.ca/wp-content/uploads/2018/03/demo-user.jpg" alt="">
        <div class="ms-3"><h1 class="mt-2"> <?php echo $_SESSION['name']; ?> </h1>
        <b>Email: </b><?php echo $_SESSION['email']; ?> <br>
        <b>ID:</b> <br>
        </div>
        
        </div>
        
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>