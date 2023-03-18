<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ani-Mate | Admin Data Form </title>
    <link rel="stylesheet" href="css/demo.css">
    <link rel="icon" href="images/logocutout.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php

    include 'dbcon.php';

    if (isset($_POST['submit'])) {
      $title = mysqli_real_escape_string($con,$_POST['title']);
      $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
      $file1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
      $file2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
      $file3 = addslashes(file_get_contents($_FILES['image3']['tmp_name']));
      $file4 = addslashes(file_get_contents($_FILES['image4']['tmp_name']));
      $abstract = mysqli_real_escape_string($con,$_POST['abstract']);
      $c1 = mysqli_real_escape_string($con, $_POST['c1']);
      $c2 = mysqli_real_escape_string($con, $_POST['c2']);
      $c3 = mysqli_real_escape_string($con, $_POST['c3']);
      $c4 = mysqli_real_escape_string($con, $_POST['c4']);
      $type = mysqli_real_escape_string($con, $_POST['type']);
      $query = "INSERT INTO hmm(title,image,image1,image2,image3,image4,abstract,c1,c2,c3,c4,type) VALUES('$title','$file','$file1','$file2','$file3','$file4','$abstract','$c1','$c2','$c3','$c4','$type')";
      if (mysqli_query($con,$query))
      {
        echo '<script>alert("Inserted")</script>';
      }


    }

    ?>
    <a href="logout.php">
    <button style="position:relative;left: 1200px;">Log Out</button></a>
    <div class="container">

      <h1>DATA  FORM</h1>
      <div class="main">
        <form action=" " method="POST" enctype="multipart/form-data">
        <span>
              <h2>Title Name </h2>
              <input type="text" placeholder="Title Name" class="inputs" name="title">
            </span><br>
            <span>
              <h2>Title Picture</h2>
              <input type="file" name="image" id="image">
            </span>
            <span>
              <h2>Gallery</h2>
              <input type="file" name="image1" id="image1"><br><br>
              <input type="file" name="image2" id="image2"><br><br>
              <input type="file" name="image3" id="image3"><br><br>
              <input type="file" name="image4" id="image4"><br><br>
            </span>
            <span>
              <h2>Abstract</h2>
              <textarea name="abstract" id="" cols="30" rows="10"></textarea>
            </span>
            <span class="check">
              <h2>Genre</h2>
              <div >
                <input type="hidden" name="c1" value=" ">
                <input type="checkbox" id="c1" name="c1" value="Action">
                <label for="c1">Action</label><br>
                <input type="hidden" name="c2" value=" ">
                <input type="checkbox" id="c2" name="c2" value="Drama">
                <label for="c2">Drama</label><br>
                <input type="hidden" name="c3" value=" ">
                <input type="checkbox" id="c3" name="c3" value="Romance">
                <label for="c3">Romance</label><br>
                <input type="hidden" name="c4" value=" ">
                <input type="checkbox" id="c4" name="c4" value="Sci-Fi">
                <label for="c4">Sci-Fi</label><br>
              </div>
            </span><br>
            <span>
              <h2>Type</h2>
              <div class="radio-check"> 
                <input type="radio" id="movie" name="type" value="movie" >
                <label for="movie">Movie</label>
                <input type="radio" id="series" name="type" value="series">
                <label for="series">Series</label>
              </div>
            </span><br>
            <div class="footer">
            <button class="end-btn" type="submit" name="submit" id="insert" style="margin-right: 40px;">Submit</button>
            <button class="end-btn" type="reset" name="reset">Reset</button>
            </div>  
          </form>
      </div>
      

    </div>
    
  </body>
</html>
<script>
  $(documnet).ready(function(){
    $('#insert').click(function(){
      var image_name = $('#image').val();
      var image1_name = $('#image1').val();
      var image2_name = $('#image2').val();
      var image3_name = $('#image3').val();

      if (image_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#image').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#image').val('');
          return  false;
        }
      }

      if (image1_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#image1').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#image1').val('');
          return  false;
        }
      }

      if (image2_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#image2').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#image2').val('');
          return  false;
        }
      }

      if (image3_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#image3').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#image3').val('');
          return  false;
        }
      }

      if (image4_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#image4').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#image4').val('');
          return  false;
        }
      }
    })
  });
</script>