<?php
include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    
    $url = "../views/admin_page.html";

    $query = "SELECT * FROM admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'";

    $result = $conn->query($query);

    if($result->num_rows == 1) {
        // Redirect to the admin page
        echo 'success';
        exit();
    } else {
        // Redirect back to the login page
        echo 'failure';
        exit();
    }

    $conn->close();
}
?>
