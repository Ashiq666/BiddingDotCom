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
    <link href="../css/signup.css" rel="stylesheet"
</head>
<body>
<?php
include '../connectDB.php';

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    

    $emailquery = " select * from user where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount){
        $userdata = mysqli_fetch_assoc($query);
        $user_name = $userdata['name'];
        $token = $userdata['token'];
 
          $sub = "Password Reset";
          $body = "Hello, $user_name. Click here to recover your account!
          http://localhost/BiddingDotCom/user/forgot_password.php?token=$token ";
          $send_from = "From: nahidhasanashiq18@gmail.com";
          if(mail($email, $sub, $body, $send_from)){
            $_SESSION['message'] = "Check your $email for recover password";
            header('location:./signin.php');
          }
          else{
            ?>
            <script>
                alert("verification link sending failed");
            </script>
            <?php
          } 
     
    }
    else{
        ?>
        <script>
            alert("No email Found");
        </script>
        <?php
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

<form class="form-deg mt-5 mx-auto" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b>Email address</b></label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <button type="submit" name="submit" class="btn btn-custom mt-2">Send Mail</button>
  <div class="mt-2">
  <span class="a">Already have an account?</span> 
  <b><a class="ms-5" class="mt-5" style="text-decoration: none;" href="./signin.php">Login!</a></b>
</div>
</form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>