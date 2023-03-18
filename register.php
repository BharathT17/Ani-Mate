
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ani-MATE | Register Now</title>
    <link rel="stylesheet" href="css/regstyle.css">
    <link rel="icon" href="images/logocutout.png">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/edd5576d46.js" crossorigin="anonymous"></script>
  </head>
  <body>
<?php

include 'dbcon.php';

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($password, PASSWORD_BCRYPT);

  $emailquery = " select * from userr where email='$email' ";
  $query = mysqli_query($con,$emailquery);

  $emailcount = mysqli_num_rows($query);

  if ($emailcount>0) {
    ?>
      <script>
        alert("Email Already Exists")
      </script>
    <?php
  }else {
    if ($password === $cpassword) {

      $insertquery = "insert into userr (username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";

      $iquery = mysqli_query($con, $insertquery);

      if ($con) {
        ?>
          <script>
            alert("Inserted")
          </script>
        <?php
      }else {
        ?>
          <script>
            alert("Not Inserted")
          </script>
        <?php
      }
    }else {
      ?>
        <script>
          alert("Password Is Not Matching")
        </script>
      <?php
    }
  }
}
 ?>

    <div class="back">
        <button type="button" class="bttn" onclick="window.history.back()" style="margin-top: 15px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256S114.6 512 256 512s256-114.6 256-256zM116.7 244.7l112-112c4.6-4.6 11.5-5.9 17.4-3.5s9.9 8.3 9.9 14.8l0 64 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 64c0 6.5-3.9 12.3-9.9 14.8s-12.9 1.1-17.4-3.5l-112-112c-6.2-6.2-6.2-16.4 0-22.6z"/>
        </svg></button>
    </div>
    <div class="banner">
      <video autoplay muted loop>
        <source src="images/bgv.mp4" type="video/mp4">
      </video>
      <div class="container" style="position:relative;">
        <div class="header">
          <h1>Sign Up</h1>
        </div>
        <div class="main">
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <span>
              <i>
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="" style=" width:25px; height:25px; ">
              </i>
              <input type="text" placeholder="Username" name="username" required>
            </span><br>
            <span>
              <i>
                <img src="https://cdn-icons-png.flaticon.com/512/181/181535.png" alt="" style=" width:25px; height:25px; ">
              </i>
              <input type="email" placeholder="Email" name="email" required>
            </span><br>
            <span>
              <i>
                <img src="	https://cdn-icons-png.flaticon.com/512/455/455705.png" alt="" style=" width:25px; height:25px; ">
              </i>
              <input type="number" placeholder="Phone Number" name="mobile"  required>
            </span><br>
            <span>
              <i>
                <img src="https://cdn-icons-png.flaticon.com/512/159/159478.png" alt="" style=" width:30px; height:30px; ">
              </i>
              <input type="password" placeholder="Password" name="password" required>
            </span><br>
            <span>
              <i>
                <img src="https://cdn-icons-png.flaticon.com/512/159/159478.png" alt="" style=" width:30px; height:30px; ">
              </i>
              <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </span><br>
            <button type="submit" name="submit">Sign Up</button>
          </form>
        </div>
        <div class="logiin">
          <a href="login.php"><h3>  Already have an account? login</h3></a>
        </div>
      </div>
    </body>
  </html>
    </div>
