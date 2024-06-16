<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="../css/home_style.css">
</head>
<body>
<header>
    <div class="banner">
        <div class="navbar">
            <img src="../img/logo_trans.png" class="logo" alt="Logo">
            <ul>
                <li><a href="../views/homepage.html">Home</a></li>
                <li><a href="../views/aboutus.html">About us</a></li>
                <li><a href="bookcentre.php">Book Centre</a></li>
                <li><a href="../views/login.html">Admin</a></li>
            </ul>
        </div>
    </div>
</header>
<main>
    <div class="info">
        <?php
        include("connection.php");
        $centre_id = $_GET['varname'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM book WHERE date_out IS NULL AND centre_id = ?");
        $stmt->bind_param("i", $centre_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt1 = $conn->prepare("SELECT * FROM book_centre WHERE centre_id = ?");
        $stmt1->bind_param("i", $centre_id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()){
                echo "List of Books in ".$row['centre_name'];
            }
        }

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Book Name</th>";
            echo "<th>Author</th>";
            echo "<th>Publisher</th>";
            echo "<th>Language</th>";
            echo "<th>Price</th></tr>";

            while($row = $result->fetch_assoc()){
                echo "<tr>"; 
                echo "<td>".$row['book_name']."</td>";
                echo "<td>".$row['author']."</td>";
                echo "<td>".$row['publisher']."</td>";
                echo "<td>".$row['language']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $stmt->close();
        $stmt1->close();
        $conn->close();
        ?>

    </div>
</main>
</body>
</html>
