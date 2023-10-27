<!DOCTYPE html>
<html>
<head>
    <title>Admin Reviews Page</title>
    <link rel="icon" href="images/logocutout.png">
</head>
<body>
    <div class="admin-reviews-section" style="background-color: #f7f7f7; padding: 20px; color: #333;">
        <h2 style="text-align: center; color: #333; padding-bottom: 15px;">Admin Review Management</h2>
        <div class="reviews" style="display: flex; flex-wrap: wrap; gap: 20px; flex-direction: row; overflow-y: auto;">
            <?php
            include 'dbcon.php';
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
            }
            
            $sqlr = "SELECT * FROM reviews";
            $resultr = mysqli_query($con, $sqlr) or die("bad query: $sqlr");
            if (mysqli_num_rows($resultr) > 0) {
                while ($rowr = mysqli_fetch_assoc($resultr)) {
                    echo "<div class='review' style='flex-basis: calc(33.33% - 20px);background-color: #fff;  border: 1px solid #ccc;border-radius: 5px;padding: 10px;box-sizing: border-box;color: #333;margin-bottom: 20px;'><h3 style='color:black;'>{$rowr['username']}</h3><p style='color:black;'>{$rowr['review']}</p><a href='delete_review.php?id={$rowr['id']}' style='color:red;'>Delete</a></div>";
                }
            } else {
                echo "<h3 style='color:black;'>No reviews yet.</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
