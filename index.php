<?php require 'config.php'; include 'inc/header.php'; ?>
<div class="jumbotron">
  <h1>Smart Living Fish Transportation</h1>
  <p>Manage bookings, vehicles and simulate tracking for live fish transport.</p>
  <?php if(!is_logged()): ?>
    <a class="btn btn-primary" href="register.php">Get Started</a>
  <?php endif; ?>
</div>
<?php include 'inc/footer.php'; ?>