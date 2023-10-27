<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    ?>
      <script>
        alert("The file <?php echo basename( $_FILES['fileToUpload']['name']); ?> has been uploaded successfully.")
         location.replace("upload.html")
      </script>
    <?php
  } else {
    ?>
      <script>
        alert("Sorry, there was an error uploading your file.")
        location.replace("upload.html")
      </script>
    <?php
  }
}

