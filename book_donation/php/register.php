<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST['admin_name'];
    $username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_email = $_POST['admin_email'];
    $centre_name = $_POST['centre_name'];

    // Check if the username already exists
    $query = "SELECT * FROM admin WHERE admin_username = '$username'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        // Username already exists
        echo 'exists';
        exit;
    }

    // Check if the centre name exists
    $centre_query = "SELECT centre_id FROM book_centre WHERE centre_name = '$centre_name'";
    $centre_result = mysqli_query($conn, $centre_query) or die(mysqli_error($conn));

    if (mysqli_num_rows($centre_result) == 0) {
        // Centre name does not exist
        echo 'centre_not_found';
        exit;
    }

    // Centre name exists, retrieve centre_id
    $centre_row = mysqli_fetch_assoc($centre_result);
    $centre_id = $centre_row['centre_id'];

    // Insert new user with the retrieved centre_id
    $insert_query = "INSERT INTO admin (admin_name, admin_username, admin_password, admin_email, centre_id) VALUES ('$admin_name', '$username', '$admin_password', '$admin_email', '$centre_id')";
    if (mysqli_query($conn, $insert_query)) {
        // Registration successful
        echo 'success';
        exit;
    } else {
        // Registration failed
        echo 'failure';
        exit;
    }

    $conn->close();
}
?>
