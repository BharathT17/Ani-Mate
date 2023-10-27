<?php
include 'dbcon.php';
// Fetch movies
$movies_query = "SELECT * FROM hmm WHERE type = 'movie'";
$movies_result = mysqli_query($con, $movies_query);
$movies = mysqli_fetch_all($movies_result, MYSQLI_ASSOC);

// Fetch series
$series_query = "SELECT * FROM hmm WHERE type = 'series'";
$series_result = mysqli_query($con, $series_query);
$series = mysqli_fetch_all($series_result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="icon" href="images/logocutout.png">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .section {
            border: 1px solid #000;
            padding: 20px;
            width: 45%;
        }
        table {
            width: 100%;
        }
        tr:nth-child(even) {
            background-color: wheat;
        }
        tr {
            border: 1px solid black;
            margin-bottom: 10px;
        }
        .delete-button {
                display: block;
                text-decoration: auto;
    width: 150px;
    height: 25px;
    margin: 10px auto;
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }
    td{
        text-align: center;
        border: 2px solid black;
        border-radius: 7px;
    }   
    h2{
        text-align: center;
        text-decoration: underline;
        }
    h1{
        text-align: center; 
    }
    }
    </style>
</head>
<body>
     <h1>Admin Content Control Panel</h1>
<div class="container">

    <div class="section">
        <h2>Movies</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($movies as $movie) {
                echo '<tr>';
                echo '<td>' . $movie['title'] . '</td>';
                echo '<td><a class="delete-button" href="delete.php?id=' . $movie['id'] . '">Delete</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>

    <div class="section">
        <h2>Series</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($series as $single_series) {
                echo '<tr>';
                echo '<td>' . $single_series['title'] . '</td>';
                echo '<td><a class="delete-button" href="delete.php?id=' . $single_series['id'] . '">Delete</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
