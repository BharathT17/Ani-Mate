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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Seymour+One&display=swap" rel="stylesheet">
  </head>
  <body>
    <!-- nav bar -->
    <div class="nav" id="nav">
      <img src="images/ani.png" class="nav_logo">
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
    <!-- Best Of All Time -->
    <div class="row">
      <h2>TRENDING NOW</h2>
      <div class="row_posters">
        <a href="content1.html">
         <img src="images/poster1.jpg" class="row_poster row_posterLarge">
        </a>
        <a href="content1.html">
         <img src="images/poster10.jpg" class="row_poster row_posterLarge">
         </a>
        <a href="content1.html">
         <img src="images/1.jpg" class="row_poster row_posterLarge">
         </a>
        <a href="content1.html">
         <img src="images/poster13.jpg" class="row_poster row_posterLarge">
         </a>
        <a href="content1.html">
         <img src="images/poster15.jpg" class="row_poster row_posterLarge">
         </a>
        <a href="content1.html">
         <img src="images/2.jpg" class="row_poster row_posterLarge">
         </a>
        <a href="content1.html">
         <img src="images/poster12.jpg" class="row_poster row_posterLarge">
         </a>
        <a href="content1.html">
         <img src="images/poster9.jpg" class="row_poster row_posterLarge">
        </a>
      </div>
    </div>
    <!-- Anime Series  -->
    <div class="row">
      <h2>ANIME SERIES</h2>
      <div class="row_posters">
        <img src="images/poster2.jpg" class="row_poster row_posterLarge" onclick="location.replace('content1.html')">
        <img src="images/poster3.jpg" class="row_poster row_posterLarge">
        <img src="images/poster4.jpg" class="row_poster row_posterLarge">
        <img src="images/poster1.jpg" class="row_poster row_posterLarge">
        <img src="images/poster5.jpg" class="row_poster row_posterLarge">
        <img src="images/poster6.jpg" class="row_poster row_posterLarge">
        <img src="images/poster7.jpg" class="row_poster row_posterLarge">
        <img src="images/poster8.jpg" class="row_poster row_posterLarge">
        <img src="images/poster9.jpg" class="row_poster row_posterLarge">
        <img src="images/poster10.jpg" class="row_poster row_posterLarge">
        <img src="images/poster11.jpg" class="row_poster row_posterLarge">
        <img src="images/poster12.jpg" class="row_poster row_posterLarge">
        <img src="images/poster13.jpg" class="row_poster row_posterLarge">
        <img src="images/poster14.jpg" class="row_poster row_posterLarge">
        <img src="images/poster15.jpg" class="row_poster row_posterLarge">
      </div>
    </div>
    <!-- Anime Movies -->
    <div class="row">
      <h2>ANIME MOVIES</h2>
      <div class="row_posters">
        <img src="images/2.jpg" class="row_poster row_posterLarge">
        <img src="images/3.jpg" class="row_poster row_posterLarge">
        <img src="images/1.jpg" class="row_poster row_posterLarge">
        <img src="images/4.jpg" class="row_poster row_posterLarge">
        <img src="images/5.jpg" class="row_poster row_posterLarge">
        <img src="images/6.jpg" class="row_poster row_posterLarge">
        <img src="images/7.jpg" class="row_poster row_posterLarge">
        <img src="images/8.jpg" class="row_poster row_posterLarge">
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
