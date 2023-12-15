
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        #table {
            width: 70%;
            margin-left: 15%;
            margin-top: 20px;
            text-align:center;
        }
        #clear-btn{
        margin-left: 10px;
        
 }
    </style>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">Table-signup details</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="signup.php">Home</a>
            </li>
          </ul>
          <form class="d-flex" role="search" method="post">
            <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
            <button class="btn btn-outline-warning" type="submit" id="clear-btn">Clear</button>
          </form>
        </div>
      </div>
    </nav>

    
    <div class="table-responsive">
    <table class="table table-bordered overflow-auto"style="width: 70%; margin-left: 15%; margin-top: 20px; text-align:center;">
      <?php
      include 'database.php';
      if (isset($_POST['submit'])){
      $search = $_POST['search'];

      $sql = "SELECT * FROM users where id LIKE '%$search%' or username LIKE '%$search%'  or email LIKE '%$search%'";
      $result=mysqli_query($connection,$sql);
      if($result){
        if(mysqli_num_rows($result)>0){
          echo '
          <thead>
          <tr>
          <th>Sr No.</th>
          <th>ID</th>
          <th>Email</th>
          <th>Username</th>
          <th>Gender</th>
          <th>Password</th>
          <th>Confirm-Password</th>
          </tr>
          </thead>
          ';
          $i=0;
          while($row = mysqli_fetch_assoc($result)){
          $i++;
          echo'<tbody>
          <tr>
          <td>' . $i . '</td>
          <td>' . $row['id'] . '</td>
          <td>' . $row['email'] . '</td>
          <td>' . $row['username'] . '</td>
          <td>' . $row['gender'] . '</td>
          <td>' . $row['password'] . '</td>
          <td>' . $row['confirmpassword'] . '</td>
          </tr>
          </tbody>';
          }
        }else{
          echo 'data not found';
        }

      }
      
      }
      ?>
    </table>
    </div>
   

<div class="table-responsive">
<table id="table" class="table table-bordered overflow-auto">
<thead>
    <tr>
    <th>Sr No.</th>
    <th>ID</th>
    <th>Email</th>
    <th>Username</th>
    <th>Gender</th>
    <th>Password</th>
    <th>Confirm-Password</th>
    <th>Edit-Input-Fields</th>
    <th>Delete</th>
</tr>
<?php
include "database.php";
$get_data = "SELECT * FROM users" ;
$run_data = mysqli_query($connection, $get_data);
$i = 0;
while($row = mysqli_fetch_array($run_data))
{
$i++;
$sr_no = $i;
$id = $row['id'];
$email = $row['email'];
$username = $row['username'];
$gender = $row['gender'];
$password = $row['password'];
$confirmpassword = $row['confirmpassword'];

echo "
<tr>
<td class='text-center'>$sr_no</td>
<td class='text-center'>$id</td>
<td class='text-center'>$email</td>
<td class='text-center'>$username</td>
<td class='text-center'>$gender</td>
<td class='text-center'>$password</td>
<td class='text-center'>$confirmpassword</td>
<td class='text-center'>
    <a href='update.php?id=$id'class='edit-row-btn btn btn-success'>Edit</a></td><td class='text-center'>
     <a href='delete.php?id=$id' class='delete-row-btn btn btn-danger'>Delete</a></td>
</tr>
";
}
?>

</thead>
</table>
</div>
</body>
</html>




