<?php
session_start();
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $review = $_POST['review'];

    $sql = "INSERT INTO reviews (username, review) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $username, $review);
    $stmt->execute();

    header('Location: home.php');
}
?>
