<?php
$files = scandir('uploads/');
$images = array_filter($files, function($file) {
  return in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']);
});
echo json_encode(array_map(function($image) { return 'uploads/' . $image; }, $images));
?>
