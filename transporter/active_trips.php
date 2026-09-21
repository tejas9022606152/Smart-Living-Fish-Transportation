<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='transporter'){ echo 'Access denied'; exit; }
// show bookings assigned to vehicles (for simplicity show pending/assigned)
$rows = $pdo->query("SELECT b.*, s.name as species_name FROM bookings b LEFT JOIN species s ON b.species_id=s.id WHERE b.status IN ('assigned','in_transit') ORDER BY b.created_at DESC")->fetchAll(); include '../inc/header.php'; ?>
<h3>Active Trips</h3>
<table class="table"><tr><th>ID</th><th>Species</th><th>Qty</th><th>Status</th><th>Action</th></tr>
<?php foreach($rows as $r): ?><tr><td><?php echo $r['id'];?></td><td><?php echo esc($r['species_name']);?></td><td><?php echo $r['quantity_kg'];?></td><td><?php echo $r['status'];?></td><td><?php if($r['status']=='assigned') echo "<a class='btn btn-sm btn-success' href='start_trip.php?id={$r['id']}'>Start Trip</a>"; else echo "<a class='btn btn-sm btn-info' href='view_trip.php?id={$r['id']}'>View</a>";?></td></tr><?php endforeach; ?></table>
<?php include '../inc/footer.php'; ?>