<?php
include 'dbcon.php';
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$id = $_GET['id']; // getting id from the url
$sql = "DELETE FROM reviews WHERE id = $id"; // the delete statement
if(mysqli_query($con, $sql)){ // executing the statement
    header('Location: adminReview.php'); // redirect back to the reviews page
} else {
    echo "Error deleting record: " . mysqli_error($con); // in case of error
}
?>
