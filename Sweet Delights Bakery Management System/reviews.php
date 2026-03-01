<?php include 'connect.php'; ?>
<link rel="stylesheet" href="style.css">

<h2 class="page-title">Buyer Reviews</h2>

<div class="reviews-grid">
<?php
$q = mysqli_query($conn,"SELECT * FROM reviews ORDER BY id DESC");
while($r = mysqli_fetch_assoc($q)){
?>
  <div class="review-card">
    <?php if(strpos($r['media'],'mp4')){ ?>
      <video controls>
        <source src="uploads/<?php echo $r['media']; ?>">
      </video>
    <?php } else { ?>
      <img src="uploads/<?php echo $r['media']; ?>">
    <?php } ?>

    <p><?php echo $r['message']; ?></p>
    <strong><?php echo $r['name']; ?></strong><br>
    ⭐ <?php echo $r['rating']; ?>/5
  </div>
<?php } ?>
</div>