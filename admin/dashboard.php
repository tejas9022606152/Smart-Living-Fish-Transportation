<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u = current_user(); if($u['role']!='admin'){ echo 'Access denied'; exit; }
include '../inc/header.php';
// basic counts
$counts = [];
foreach(['users','vehicles','bookings','species'] as $t){ $c = $pdo->query("SELECT COUNT(*) as c FROM {$t}")->fetch(); $counts[$t]=$c['c']; }
?>
<h3>Admin Dashboard</h3>
<div class="row">
  <div class="col-md-3"><div class="card p-3">Users<br><h4><?php echo $counts['users']; ?></h4></div></div>
  <div class="col-md-3"><div class="card p-3">Vehicles<br><h4><?php echo $counts['vehicles']; ?></h4></div></div>
  <div class="col-md-3"><div class="card p-3">Bookings<br><h4><?php echo $counts['bookings']; ?></h4></div></div>
  <div class="col-md-3"><div class="card p-3">Species<br><h4><?php echo $counts['species']; ?></h4></div></div>
</div>
<hr>
<a class="btn btn-sm btn-primary" href="users.php">Manage Users</a>
<a class="btn btn-sm btn-secondary" href="vehicles.php">Vehicles</a>
<a class="btn btn-sm btn-success" href="species.php">Species</a>
<a class="btn btn-sm btn-info" href="bookings.php">Bookings</a>
<?php include '../inc/footer.php'; ?>