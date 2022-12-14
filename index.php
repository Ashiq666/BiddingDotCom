<?php
session_start();
if(!isset($_SESSION['name'])){
  ?>
  <script>
      alert("you are logged out");
      header('location:../signin.php');
  </script>
  <?php
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="index.css" type="txt/css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-shadow navigation">
        <div class="container">
            <a class="navbar-brand nav-logo text-dark fw-b" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                    <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                </svg> Bidding Dot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2 search-input-bar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light-custom" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg> Search</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Explore
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Art</a></li>
                            <li><a class="dropdown-item" href="#">Other</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Create</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['name']; ?> 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../profile/view_profile.php">View profile</a></li>
                            <li><a class="dropdown-item" href="../profile/Change_info.php">Change Information</a></li>
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../user/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="main-section mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body">
                        Top Arts
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body">
                        <form action="#" method="post" id="post-art-form" onsubmit="return false;">
                            <legend class="text-center secondary-title">
                                Place a art in the <u class="underline-dashed">bidder.com</u>!
                            </legend>
                            <hr />
                            <div class="form-group my-1">
                                <label for="art-photo" class="mb-1">Upload the art's photo<span class="text-danger">*</span>:</label>
                                <input type="file" id="art-photo" name="art-photo" class="form-control" />
                            </div>
                            <div class="form-group my-1">
                                <label for="art-price" class="mb-1">The base price of the art<span class="text-danger">*</span>:</label>
                                <input type="text" id="art-price" name="art-price" class="form-control" placeholder="e.g. 1000" />
                            </div>
                            <div class="my-1">
                                <span class="error-text fw-bold" id="error-text" style="font-size: 0.8rem;"></span>
                            </div>
                            <div class="form-group my-1">
                                <input type="submit" id="submit-btn" name="submit-btn" value="Post the art" class="form-control btn btn-sm btn-dark" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="c">
        <p class="ss">sadasasd</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>