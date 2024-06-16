<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the book ID from the POST data
    $book_id = $_POST['book_id'];

    // Get the current date and time
    $current_date = date("Y-m-d H:i:s");

    // Update the date_out field in the database
    $update_query = "UPDATE book SET date_out = '$current_date' WHERE book_id = $book_id";

    if ($conn->query($update_query) === TRUE) {
        // Return a JSON response indicating success
        echo json_encode(["success" => true]);
    } else {
        // Return a JSON response indicating failure and the error message
        echo json_encode(["success" => false, "message" => "Error updating record: " . $conn->error]);
    }

    // Close the database connection
    $conn->close();
}
?>
