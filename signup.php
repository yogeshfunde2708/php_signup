<?php include "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SignUp</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SignUp Form</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <button class="btn btn-outline-warning" type="submit" id="clear-btn">Clear</button>
          </form>
        </div>
      </div>
    </nav>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Sign Up Form</h4>

            <form action="signup.php" method = "post" >
            <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="user_email" id="user_email" class="form-control" placeholder="Enter-Email" type="email">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="user_name" id="user_name" class="form-control" placeholder="Enter Username" type="text">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" name="user_password" id="user_password" placeholder="Password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" name="user_confirm_password" id="user_confirm_password" placeholder="Confirm-Password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                    </div>
                    <select class="custom-select" name="user_gender" id="user_gender" style="max-width: 120px;">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    </select>
                </div> 
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="signup"> Sign Up </button>
                </div> 
            </form>
        </article>
    </div>
</body>
<?php 
if (isset($_POST['signup']))
{
 $user_email = $_POST['user_email'];
 $user_name = $_POST['user_name'];
 $user_gender = $_POST['user_gender'];
 $user_password = $_POST['user_password'];
 $user_confirm_password = ($_POST['user_confirm_password']);


 $insert_data =  "INSERT INTO `users` ( `email`, `username`, `gender`, `password`, `confirmpassword`) VALUES ('$user_email','$user_name','$user_gender','$user_password','$user_confirm_password')";
 $run_data = mysqli_query($connection, $insert_data);

if ($run_data === TRUE) {
  echo '<script>alert("Registration successful!");</script>';
} else {
  echo "Error: " . $run_data . "<br>" . $conn->error;
}
}
$connection->close();
?>
