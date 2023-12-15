<?php 
if (isset($_GET['id'])) {
include "database.php";
$update_id = $_GET['id'];
$update_data = "SELECT * FROM users where id ='$update_id'";
$update_run_data = mysqli_query($connection, $update_data);
$update_row = mysqli_fetch_array($update_run_data);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>

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
<nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">Update Details</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="signup.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="table.php">Table</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Update the details</h4>

            <form action="update.php" method = "post" >
            <input type="hidden" name="id" value="<?php echo $update_id; ?>">
            <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="user_email" value="<?php echo isset($update_row['email']) ? $update_row['email'] : ''; ?>" id="user_email" class="form-control" placeholder="Enter-Email" type="email">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="user_name" value="<?php echo isset($update_row['username'])?$update_row['username'] : '';?>" id="user_name" class="form-control" placeholder="Enter Username" type="text">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control"value="<?php echo isset($update_row['password'])?$update_row['password'] : '';?>" name="user_password" id="user_password" placeholder="Password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control"value="<?php echo isset($update_row['confirmpassword'])?$update_row['confirmpassword'] : '';?>" name="user_confirm_password" id="user_confirm_password" placeholder="Confirm-Password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                    </div>
                    <select class="custom-select" name="user_gender" id="user_gender" style="max-width: 120px;">
                    <option value="">Select</option>
                    <option value="male" <?php echo ($update_row['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
                    <option value="female" <?php echo ($update_row['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
                    <option value="other" <?php echo ($update_row['gender'] === 'other') ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div> 
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
                </div> 
            </form>
        </article>
    </div>
</body>


<?php 
include "database.php";
if (isset($_POST['update']))
{
 $id = $_POST['id'];
 $user_email = $_POST['user_email'];
 $user_name = $_POST['user_name'];
 $user_gender = $_POST['user_gender'];
 $user_password = $_POST['user_password'];
 $user_confirm_password = ($_POST['user_confirm_password']);

 if (empty($user_email) || empty($user_name) || empty($user_gender)) {
    echo '<script>alert("Please fill in all fields.");</script>';
} elseif ($user_password !== $user_confirm_password) {
    echo '<script>alert("Password did not match, Please try again.");</script>';
  } else {

 $update_data =  "UPDATE users SET email='$user_email', username= '$user_name', gender = '$user_gender', password = '$user_password', confirmpassword = '$user_confirm_password' WHERE id=$id ";
 $run_update = mysqli_query($connection, $update_data);

if ($run_update === TRUE) {
  echo '<script>alert("Success! Data has been successfully updated!");</script>';
} else {
  echo "Error: " . $run_update . "<br>" . $conn->error;
}
  }
  $user_email = $user_name = $user_gender = $user_password = $user_confirm_password = "";
}
$connection->close();

?>

