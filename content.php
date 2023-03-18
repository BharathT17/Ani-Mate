<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ani-MATE</title>
    <link rel="stylesheet" href="css/content.css">
    <link rel="icon" href="images/logocutout.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Faster+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3184ea29a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/3184ea29a0.css" crossorigin="anonymous">
  </head>
  <body>
    <?php  
    include 'dbcon.php';

    if (isset($_GET['ID'])) {
      $ID = mysqli_real_escape_string($con,$_GET['ID']);

      $sql = "select * from hmm where id='$ID'";
      $result = mysqli_query($con,$sql) or die();
      $row = mysqli_fetch_array($result);
    }

    ?>
    
    <div class="top">
      <img src="images/logo container.png" id="title">
    </div>
    <div class="container">
      <h2 style="text-align: center;left: 0;"><?php echo $row['title'] ?></h2>
      <div class="timage">
        <?php 
        echo '<img class="ntitle" style="position:sticky;left: 520px;margin: 50px 0;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'">';

         ?>
        
      </div>
      
      <p style="position: sticky;margin-bottom: 50px;margin-left: 20px;">
        <b>
            <?php echo $row['abstract'] ?>
        </b>
      </p>
      <ul style="position: sticky;justify-content: center;left: 0;">
        <li><?php echo $row['c1'] ?></li>
        <li><?php echo $row['c2'] ?></li>
        <li><?php echo $row['c3'] ?></li>
        <li><?php echo $row['c4'] ?></li>
      </ul>
    </div>
    <div class="slider" style="position: sticky;margin: 50px 0;">
      <div class="images">
        <input type="radio" name="slide" id="img1" checked>
        <input type="radio" name="slide" id="img2">
        <input type="radio" name="slide" id="img3">
        <input type="radio" name="slide" id="img4">

        <?php 
        echo '<img class="m1" alt="img1" src="data:image/jpeg;base64,'.base64_encode($row['image1']).'">';
        echo '<img class="m2" alt="img2" src="data:image/jpeg;base64,'.base64_encode($row['image2']).'">';
        echo '<img class="m3" alt="img3" src="data:image/jpeg;base64,'.base64_encode($row['image3']).'">';
        echo '<img class="m4" alt="img4" src="data:image/jpeg;base64,'.base64_encode($row['image4']).'">';

         ?>
      </div>
      <div class="dots">
        <label for="img1"></label>
        <label for="img2"></label>
        <label for="img3"></label>
        <label for="img4"></label>
      </div>
    </div>
      
    </div>
  </body>
</html>
