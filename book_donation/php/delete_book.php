<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];

    // Perform deletion query
    $delete_query = "DELETE FROM book WHERE book_id = $book_id";

    if ($conn->query($delete_query) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Error deleting record: " . $conn->error]);
    }

    $conn->close();
}
?>
