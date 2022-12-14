<?php
session_start();
ob_start();
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

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = " select * from user where email='$email' and status='active' ";
    $query = mysqli_query($con, $email_search);

    $emailcount = mysqli_num_rows($query);

    if($emailcount){
      $email_pass = mysqli_fetch_assoc($query);
      $email_pass_from_db = $email_pass['password'];
      $_SESSION['name'] = $email_pass['name'];
      $_SESSION['email'] = $email_pass['email'];
      $_SESSION['id'] = $email_pass['id'];

      $decode_pass = password_verify($password, $email_pass_from_db);

      if($decode_pass){

        if(isset($_POST['remember_me'])){
          setcookie('emailcookie', $email, time()+604800);
          setcookie('passwordcookie', $password, time()+604800);
          ?>
        <script>
            alert("Successfully Login");
            location.replace("../homepage/homepage.php");
        </script>
        <?php
        }
        else{
          ?>
        <script>
            alert("Successfully Login");
            location.replace("../homepage/homepage.php");
        </script>
        <?php
        }

        
      }
      else{
        ?>
        <script>
            alert("Incorrect Password");
        </script>
        <?php
      }
    }
    else{
      ?>
        <script>
            alert("Invalid email");
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
    <input type="email" name="email" value="<?php if(isset($_COOKIE['emailcookie'])){
     echo $_COOKIE['emailcookie'];
    } ?>" class="form-control" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
    <input type="password" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])){
     echo $_COOKIE['passwordcookie'];
    } ?>" class="form-control"  required>
  </div>
  <div class="d-flex">
  <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="remember_me">
  <label class="form-check-label" for="flexSwitchCheckDefault">Remember me</label>
</div>
<div class="ms-5">
  <a style="text-decoration: none;" href="./recover_mail.php">Forgot password?</a>
</div>
  </div>
  <button type="submit" name="submit" class="btn btn-custom mt-2">Submit</button>
  <div class="mt-2">
  <span>Do not have an account?</span> 
  <b><a class="ms-5" style="text-decoration: none;" href="./signup.php">Register!</a></b>
</div>
<div>
<p class="text-center text-danger">
  <?php if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
  }
  else{
    echo $_SESSION['message'] = "you are logged out!";
  } ?>
</p>
</div>
</form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>