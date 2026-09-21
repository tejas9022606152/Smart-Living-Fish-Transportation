<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='farmer'){ echo 'Access denied'; exit; }
include '../inc/header.php'; ?>
<h3>Farmer Dashboard</h3>
<a class="btn btn-primary" href="create_booking.php">Create Booking</a>
<a class="btn btn-secondary" href="my_bookings.php">My Bookings</a>
<?php include '../inc/footer.php'; ?>