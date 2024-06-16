<?php
include("connection.php");

// Fetch total number of books for each center
$sql = "SELECT bc.centre_name, COUNT(b.book_id) AS total_books
        FROM book_centre bc
        LEFT JOIN book b ON bc.centre_id = b.centre_id
        GROUP BY bc.centre_name;
        ";

$result = $conn->query($sql);

if (!$result) {
    die("Error executing the query: " . $conn->error);
}

// Prepare data for display
$centre_books = [];

while ($row = $result->fetch_assoc()) {
    $centre_books[] = [
        'centre_name' => $row['centre_name'],
        'total_books' => $row['total_books']
    ];
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Page</title>
    <link rel="stylesheet" href="../css/home_style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <div class="banner">
            <div class="navbar">
                <img src="../img/logo_trans.png" class="logo" alt="Logo">
                <ul>
                    <li><a href="../views/admin_page.html">Home</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="content">
            <h2>Total Number of Books in Each Center:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Centre Name</th>
                        <th>Total Books</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($centre_books as $centre_book): ?>
                        <tr>
                            <td><?php echo $centre_book['centre_name']; ?></td>
                            <td><?php echo $centre_book['total_books']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
