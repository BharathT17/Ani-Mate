<?php

include 'dbcon.php';


// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// sanitize your input
$id = isset($_GET['id']) ? (int) $con->real_escape_string($_GET['id']) : 0;

$sql = "SELECT * FROM userr WHERE id = $id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo json_encode($row);
  }
} else {
  echo "No results found";
}
$con->close();
?>
