<?php
include ("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $language = $_POST['language'];
    $price = $_POST['price'];
    $centre_name = $_POST['centre'];
    $date_in = date("Y-m-d H:i:s");
    $date_out = NULL;

    // Debugging: Log the received data
    file_put_contents('log.txt', "Received data: " . print_r($_POST, true) . "\n", FILE_APPEND);

    // Check if the center name exists in the database
    $centre_query = "SELECT centre_id FROM book_centre WHERE centre_name = '$centre_name'";
    $centre_result = $conn->query($centre_query);

    if ($centre_result->num_rows > 0) {
        // Center exists, fetch its ID
        $centre_row = $centre_result->fetch_assoc();
        $centre_id = $centre_row['centre_id'];

        // Insert the book data with the retrieved center ID
        $insert_query = "INSERT INTO book (book_name, author, publisher, language, price, date_in, date_out, centre_id) 
                         VALUES ('$book_name', '$author', '$publisher', '$language', '$price', '$date_in', NULL, '$centre_id')";

        if ($conn->query($insert_query) === TRUE) {
            echo 'success';
        } else {
            echo 'failure';
            // Debugging: Log the SQL error
            file_put_contents('log.txt', "SQL error: " . $conn->error . "\n", FILE_APPEND);
        }
    } else {
        echo 'centre not exist';
    }

    $conn->close();
}
?>
