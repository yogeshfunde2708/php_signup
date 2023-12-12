<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
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
$get_data = "SELECT * FROM users" ;
$run_data = mysqli_query($connection, $get_data);
$i = 0;
while($row = mysqli_fetch_array($run_data))
{
$sr_no = $i+1;
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
        <a href='update.php ? id = $id&username = $username&gender = $gender&password=$password&confirmpassword = $confirmpassword' class='edit-row-btn btn btn-success'>Edit</a>
        </td>
        <td class='text-center'>
        <a href='#' class='delete-row-btn btn btn-danger' data-id='$id'>Delete</a>
        </td>
</tr>
";
}
?>

</thead>
</table>
</div>

</body>
</html>




