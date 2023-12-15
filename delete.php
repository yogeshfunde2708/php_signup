<?php

if (isset($_GET['id'])) {
    include "database.php";
    $id = $_GET['id'];
    $delete = "DELETE FROM users WHERE id = $id";
    $run_data = mysqli_query($connection, $delete);

    if ($run_data) {
        header('location: table.php');
    } else {
        echo "Error: Unable to delete user.";
    }
} else {
    echo "Error: 'id' not provided in the URL.";
}
?>
