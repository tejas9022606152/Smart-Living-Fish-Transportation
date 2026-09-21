<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='transporter'){ echo 'Access denied'; exit; }
include '../inc/header.php'; ?>
<h3>Transporter Dashboard</h3>
<a class="btn btn-primary" href="active_trips.php">Active Trips</a>
<?php include '../inc/footer.php'; ?>