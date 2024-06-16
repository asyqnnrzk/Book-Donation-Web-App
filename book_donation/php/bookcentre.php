<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Centre</title>
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
            <caption>List of Book Centres</caption>
            <?php
            include("connection.php");

            $sql = "SELECT * FROM book_centre";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $url = "viewbook.php";

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='border'>";
                echo "<tr style= 'background-color: #A7C7E7'><th>No</th><th>Centre</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['centre_id'] . "</td>";
                    echo "<td>Book Centre Name: <a href='$url?varname=" . $row['centre_id'] . "'>" . $row['centre_name'] . "</a><br>Address: " . $row['centre_location'] . "<br>Contact: " . $row['centre_contact'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "0 results";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </div>
    </main>
</body>
</html>
