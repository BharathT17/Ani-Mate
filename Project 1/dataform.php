<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ani-Mate | Admin Data Form </title>
    <link rel="stylesheet" href="css/dataform.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    </style>
  </head>
  <body>
    <?php

    include 'dbcon.php';

    if (isset($_POST['submit'])) {
      $title_name = $_POST['title_name'];
      $abstract = $_POST['abstract'];
      $c1 = $_POST['c1'];
      $c2 = $_POST['c2'];
      $c3 = $_POST['c3'];
      $c4 = $_POST['c4'];
      $type = $_POST['type'];
      $file = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
      $file1 = addslashes(file_get_contents($_FILES['gallery1']['tmp_name']));
      $file2 = addslashes(file_get_contents($_FILES['gallery2']['tmp_name']));
      $file3 = addslashes(file_get_contents($_FILES['gallery3']['tmp_name']));
      $file4 = addslashes(file_get_contents($_FILES['gallery4']['tmp_name']));



      $query = "INSERT INTO data(title, abstract, c1, c2, c3, c4, type, image, image1, image2, image3, image4) VALUES ('$title_name','$abstract','$c1','$c2','$c3','$c4','$type','$file','$file1','$file2','$file3','$file4')";

      if (mysqli_query($con,$query)) {
        echo '<script>alert("Inserted")</script>';
      }

    }

    ?>



    <div class="container">
      <div class="header">
        <h1>Data Form</h1>
      </div>
        <div class="main">
          <form action="" method="POST" encrypt="multipart/form-data">
            <span>
              <h2>Title Name </h2>
              <input type="text" placeholder="Title Name" class="inputs" name="title_name" >
            </span><br>

            <span>
              <h2>Title Picture</h2>
              <input type="file" class="pic" name="img1" id="img1">
            </span><br>
            <span>
              <h2>Abstract</h2>
              <textarea name="abstract" class="inputs" placeholder="Write The Abstract Here.." rows="8" cols="20"></textarea>
            </span><br>
            <span>
              <h2>Genre</h2>
              <div class="check">
                <input type="checkbox" id="c1" name="c1" value="Action">
                <label for="c1">Action</label><br>
                <input type="checkbox" id="c2" name="c2" value="Drama">
                <label for="c2">Drama</label><br>
                <input type="checkbox" id="c3" name="c3" value="Romance">
                <label for="c3">Romance</label><br>
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
            <span>
              <h2>Gallery</h2>
              <input type="file" name="gallery1"  class="pic" id="img2">
              <input type="file" name="gallery2"  class="pic" id="img3">
              <input type="file" name="gallery3"  class="pic" id="img4">
              <input type="file" name="gallery4"  class="pic" id="img5">
            </span><br>
            <button class="end-btn" type="submit" name="submit" id="insert">Submit</button>
            <button class="end-btn" type="reset" name="reset">Reset</button>
          </form>
        </div>

    </div>

  </body>
</html>
<script>
  $(documnet).ready(function(){
    $('#insert').click(function(){
      var timg_name = $('#img1').val();
      var g1_name = $('#img2').val();
      var g2_name = $('#img3').val();
      var g3_name = $('#img4').val();
      var g4_name = $('#img5').val();

      if (timg_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#img1').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#img1').val('');
          return  false;
        }
      }

      if (g1_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#img2').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#img2').val('');
          return  false;
        }
      }

      if (g2_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#img3').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#img3').val('');
          return  false;
        }
      }

      if (g3_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#img4').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#img4').val('');
          return  false;
        }
      }

      if (g4_name == '')
      {
        alert("Please Select The image");
        return false;
      }
      else
      {
        var extension = $('#img5').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid image file");
          $('#img5').val('');
          return  false;
        }
      }
    });

  });
</script>
