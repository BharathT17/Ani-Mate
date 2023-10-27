<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ani-MATE | Login Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="icon" href="images/logocutout.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  </head>
  <body>
   

<?php

include 'dbcon.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = " select * from userr where email='$email'";
  $query = mysqli_query($con,$email_search);

  $email_count = mysqli_num_rows($query);

  if ($email_count) {
    $email_pass = mysqli_fetch_assoc($query);
    

    $db_pass = $email_pass['password'];
    $_SESSION['username'] = $email_pass['username'];

    $pass_decode = password_verify($password, $db_pass);

    if ($pass_decode) {
      ?>
      <script>
        location.replace("home.php")
      </script>
    <?php
    }else{
      ?>
      <script>
        alert("Password Incorrect")
      </script>
    <?php
    }


  }else{
    ?>
      <script>
        alert("Invalid Email")
      </script>
    <?php
  }


}

?>

<div id="page">
    <div class="back">
        <button type="button" class="bttn" onclick="window.history.back()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256S114.6 512 256 512s256-114.6 256-256zM116.7 244.7l112-112c4.6-4.6 11.5-5.9 17.4-3.5s9.9 8.3 9.9 14.8l0 64 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 64c0 6.5-3.9 12.3-9.9 14.8s-12.9 1.1-17.4-3.5l-112-112c-6.2-6.2-6.2-16.4 0-22.6z"/>
        </svg></button>
    </div>
    <div class="container">
      <div class="header">
          <h1>Login</h1>
      </div>
      <div class="main">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
          <span>
            <i>
              <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="" style=" width:25px; height:25px; ">
            </i>
            <input type="email" placeholder="Email" name="email" required>
          </span><br>
          <span>
            <i>
              <img src="	https://cdn-icons-png.flaticon.com/512/25/25239.png" alt="" style=" width:25px; height:25px; ">
            </i>
            <input type="password" placeholder="Password" name="password" required>
          </span><br>
          <button type="submit" name="submit">Login</button>
        </form>
      </div>
      <div class="logiin">
        <a href="register.php"><h3>Create an account</h3></a>
      </div>
    </div>
    </div>
  </body>
</html>
