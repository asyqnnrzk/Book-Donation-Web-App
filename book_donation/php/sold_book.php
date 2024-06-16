<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Out Books</title>
    <link rel="stylesheet" href="../css/home_style.css">
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
    <div class="info">
        <?php
        include("connection.php");
        $sql = "SELECT book.*, book_centre.centre_name 
                FROM book 
                INNER JOIN book_centre ON book.centre_id = book_centre.centre_id 
                WHERE date_out IS NOT NULL";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            //Fetches a result row as an associative array
            echo "<table border='1'>";
            echo "<tr><th>Book Name</th>";
            echo "<th>Author</th>";
            echo "<th>Publisher</th>";
            echo "<th>Language</th>";
            echo "<th>Price</th>";
            echo "<th>Date donated</th>";
            echo "<th>Date sold out</th>";
            echo "<th>Centre Name</th></tr>";
            {
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['book_name']."</td>";
                    echo "<td>".$row['author']."</td>";
                    echo "<td>".$row['publisher']."</td>";
                    echo "<td>".$row['language']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['date_in']."</td>";
                    echo "<td>".$row['date_out']."</td>";
                    echo "<td>".$row['centre_name']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "0 results";
        }
        //Freeing all memory associated with it
        mysqli_free_result($result);
        //Closes specified connection
        mysqli_close($conn);
        ?>
    </div>
</main>
</body>
</html>
