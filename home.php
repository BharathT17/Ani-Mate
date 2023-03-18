<?php 
session_start();

if (!isset($_SESSION['username'])) {
  echo "You Are Logged Out";
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ani-Mate</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="images/logocutout.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Seymour+One&display=swap" rel="stylesheet">
  </head>
  <body>
    

    <?php 
    include 'dbcon.php';


    $sqlm = " select * from hmm where type = 'movie'";
    $sqls = " select * from hmm where type = 'series'";
    $resultm = mysqli_query($con,$sqlm) or die("bad query : $sqlm");
    $results = mysqli_query($con,$sqls) or die("bad query : $sqls");

    ?>
    <!-- nav bar -->
    <div class="nav" id="nav" style="padding-bottom: 0;">
      <img src="images/logocutout.png" class="nav_logo" style="height: 90px;position: relative;bottom: 22px;">
      <a href="logout.php"><button style=" width: 86px;
    height: 36px;
    border-radius: 10px;
    border: none;
    background-color: #C58940;
    font-family: 'Seymour One', sans-serif; cursor: pointer;">Logout</button></a>
    </div>
    <!-- Header -->
    <div class="banner">
      <div class="contents">
        <h1>WELCOME</h1>
        <h1 style="color:#FFDB89;"><?php echo $_SESSION['username']; ?></h1>
      </div>
      <div class="banner-fadeBottom"></div>
    </div>
  <div class="row">
      <h2>Anime Movies</h2>
      <div class="row_posters">
        <?php

        if (mysqli_num_rows($resultm)>0) {
          while ($rowm = mysqli_fetch_array($resultm)) {
              echo "<a href='content.php?ID={$rowm['id']}'><img class='row_poster row_posterLarge' src='data:image/jpeg;base64,".base64_encode($rowm['image'] )."'></a>";
            
            
          }
        }else{
          echo "No Images to Display";
        }

        ?>
    </div>
  </div>
  <div class="row">
      <h2>Anime Series</h2>
      <div class="row_posters">
        <?php

        if (mysqli_num_rows($results)>0) {
          while ($rows = mysqli_fetch_array($results)) {
            echo "<a href='content.php?ID={$rows['id']}'><img class='row_poster row_posterLarge' src='data:image/jpeg;base64,".base64_encode($rows['image'] )."'></a>";
            
          }
        }else{
          echo "No Images to Display";
        }

        ?>
    </div>
  </div>

    <script>
      const nav = document.getElementById('nav');
      window.addEventListener('scroll', () => {
       if(window.scrollY >= 100){
         nav.classList.add('nav_black')
       }else{
         nav.classList.remove('nav_black');
       }
     })
    </script>
  </body>
</html>
