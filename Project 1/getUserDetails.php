<?php
    include 'dbcon.php';

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 

    // Assuming the user is logged in and you have a user ID
    $userId = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"]. "<br>";
            echo "Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "No results";
    }
    $con->close();
?>
