<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $language = $_POST['language'];
    $price = $_POST['price'];
    $date_in = $_POST['date_in'];
    $date_out = $_POST['date_out'];

    $hostname = "localhost";
    $username = "b032110286";
    $password = "020112-08-0526";
    $dbname = "student_b032110286";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $insert_query = "INSERT INTO book (book_name, author, publisher, language, price, date_in, date_out) VALUES ('$book_name', '$author', '$publisher', '$language', '$price', '$date_in', '$date_out')";
    
    if ($conn->query($insert_query) === TRUE) {
        echo 'success';
    } else {
        echo 'failure';
    }

    $conn->close();
}
?>
