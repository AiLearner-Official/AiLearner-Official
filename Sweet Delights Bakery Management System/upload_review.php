<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Review</title>
  <link rel="stylesheet" href="upload_review.css">
</head>
<body>

<div class="review-wrapper">

<form action="" method="post" enctype="multipart/form-data" class="review-form">

<input type="text" name="name" placeholder="Your Name" required>

<textarea name="message" placeholder="Your Review"></textarea>

<select name="rating">
  <option value="5">⭐⭐⭐⭐⭐</option>
  <option value="4">⭐⭐⭐⭐</option>
  <option value="3">⭐⭐⭐</option>
</select>

<input type="file" name="media" required>

<button name="submit">Submit Review</button>
</form>

<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $msg  = $_POST['message'];
  $rate = $_POST['rating'];

  $file = $_FILES['media']['name'];
  move_uploaded_file($_FILES['media']['tmp_name'],"uploads/".$file);

  mysqli_query($conn,"INSERT INTO reviews(name,message,rating,media)
  VALUES('$name','$msg','$rate','$file')");
}
?>

</div>
</body>
</html>