<?php
include 'dbcon.php';

// Get the ID from the URL
$id = $_GET['id'];

// Validate the ID (ensure it's a number)
if (!is_numeric($id)) {
    die("Invalid ID");
}

// Construct the deletion query
$query = "DELETE FROM hmm WHERE id = $id";

// Execute the query
if (mysqli_query($con, $query)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

// Redirect back to the admin page
header('Location: admincontent.php');
?>
